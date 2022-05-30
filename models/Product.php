<?php

namespace Models;

class Product extends Model
{
  public $title;
  public $price;
  public $discount;
  public $desc;
  public $cat_id;
  public $brand_id;
  public $category;
  public $brand;
  const TABLE_NAME = "products";

  // entity function
  function __construct($row)
  {
    $this->id = $row["product_id"];
    $this->title = $row["product_title"];
    $this->price = $row["product_price"];
    $this->discount = $row["product_discount"];
    $this->desc = $row["product_desc"];
    $this->cat_id = $row["cat_id"];
    $this->brand_id = $row["brand_id"];
    $this->createdAt = $row["createdAt"];
    $this->updatedAt = $row["updatedAt"];
  }

  function save($con)
  {
    extract(get_object_vars($this));
    $query = "update " . self::TABLE_NAME . " set product_title='$title', product_price='$price', 
      product_discount='$discount', product_desc='$desc', 
      cat_id='$cat_id', brand_id='$brand_id' where product_id = $id";

    mysqli_query($con, $query);
  }

  function delete($con)
  {
    $id = $this->id;
    $query = "delete from " . self::TABLE_NAME . " where product_id = $id";
    mysqli_query($con, $query);

    return null;
  }

  function populated($con, $model)
  {
    if (gettype($model) == "string") {
      if ($model == "Category" || $model = "category") {
        $this->category = Category::find_by_pk($con, $this->cat_id);
      }

      if ($model == "Brand" || $model == "brand") {
        $this->brand = Brand::find_by_pk($con, $this->brand_id);
      }
    }

    if (gettype($model) == "array") {
      for ($i = 0; $i < count($model); $i++) {
        $this->populated($con, $model[$i]);
      }
    }
  }

  function get_images($con)
  {
    $images = Image::find_all($con, array("where" => "pro_id = $this->id"));
    return $images;
  }

  // static func
  public static function find_by_pk($con, $id)
  {
    $query = "select * from " . self::TABLE_NAME . " where product_id = $id";
    $result = mysqli_query($con, $query);

    if ($result->num_rows == 0) {
      return null;
    }

    $row = mysqli_fetch_array($result);
    $product = new Product($row);

    return $product;
  }

  public static function create($con, $form)
  {
    [
      "product_title" => $title,
      "product_price" => $price,
      "product_discount" => $discount,
      "product_desc" => $desc,
      "cat_id" => $cat_id,
      "brand_id" => $brand_id,
    ] = $form;
    $query = "insert into " . self::TABLE_NAME . "(product_title, product_price, product_discount, 
              product_desc, cat_id, brand_id)
              values ('$title', '$price', '$discount', '$desc', '$cat_id', '$brand_id')";

    if (mysqli_query($con, $query)) {
      $id = mysqli_insert_id($con);
      $product = self::find_by_pk($con, $id);

      return $product;
    }

    return null;
  }

  public static function find_all($con, $conditions = array())
  {
    $queryArr = self::conditions_to_query($conditions);
    [
      "select" => $select,
      "where" => $where,
      "order" => $order,
      "limit" => $limit,
      "offset" => $offset,
    ] = $queryArr;
    $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " " . $limit . " " . $offset;
    $result = mysqli_query($con, $query);

    $products = array();

    if (!$result) {
      return $products;
    }

    while ($row = mysqli_fetch_array($result)) {
      $product = new Product($row);
      array_push($products, $product);
    }

    return $products;
  }

  public static function find_one($con, $conditions = array())
  {
    $queryArr = self::conditions_to_query($conditions);
    [
      "select" => $select,
      "where" => $where,
      "order" => $order,
    ] = $queryArr;
    $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " limit 1";
    $result = mysqli_query($con, $query);

    if (!$result) {
      return null;
    }

    $row = mysqli_fetch_array($result);
    $product = new Product($row);

    return $product;
  }

  public static function find_all_and_count($con, $conditions = array())
  {
    $queryArr = self::conditions_to_query($conditions);
    [
      "select" => $select,
      "where" => $where,
      "order" => $order,
      "limit" => $limit,
      "offset" => $offset,
    ] = $queryArr;

    $products = array();

    $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
    $result_count = mysqli_query($con, $query_count);
    $count =  mysqli_fetch_array($result_count)[0];

    if (!$count) {
      return array("count" => 0, "rows" => $products);
    }

    $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " " . $limit . " " . $offset;
    $result = mysqli_query($con, $query);

    if (!$result) {
      return array("count" => 0, "rows" => $products);
    }

    while ($row = mysqli_fetch_array($result)) {
      $product = new Product($row);
      array_push($products, $product);
    }

    return array("count" => $count, "rows" => $products);
  }

  public static function count($con, $conditions = array())
  {
    $queryArr = self::conditions_to_query($conditions);
    [
      "where" => $where,
    ] = $queryArr;

    $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
    $result_count = mysqli_query($con, $query_count);
    $count =  mysqli_fetch_array($result_count)[0];

    return $count;
  }

  public static function delete_by_pk($con, $id)
  {
    $query = "delete from " . self::TABLE_NAME . " where product_id = $id";
    return mysqli_query($con, $query);
  }

  public static function update_by_pk($con, $id, $form)
  {
    $fields_update = [
      "product_title",
      "product_price",
      "product_discount",
      "product_desc",
      "cat_id",
      "brand_id",
    ];

    $set = "";

    for ($i = 0; $i < count($fields_update); $i++) {
      if (isset($form[$fields_update[$i]])) {
        if ($set != "") {
          $set .= ", ";
        }

        $set .= $fields_update[$i] . " ='" . $form[$fields_update[$i]] . "'";
      }
    }

    echo $set . "<br>";

    if ($set != "") {
      $query = "update " . self::TABLE_NAME . " set " . $set . " where product_id = $id";
      echo $query . "<br>";

      mysqli_query($con, $query);
    }

    $product = self::find_by_pk($con, $id);

    return $product;
  }
  public function priceDiscount(){
    return $this->price*(1-$this->discount/100);
  }
}
