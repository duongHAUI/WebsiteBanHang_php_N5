<?php

namespace Models;

class Detail extends Model
{
  public $quantity;
  public $price;
  public $pro_id;
  public $order_id;
  public $product;
  const TABLE_NAME = "order_details";

  // entity function
  function __construct($row)
  {
    $this->id = $row["detail_id"];
    $this->quantity = $row["quantity"];
    $this->price = $row["price"];
    $this->pro_id = $row["pro_id"];
    $this->order_id = $row["order_id"];
    $this->createdAt = $row["createdAt"];
    $this->updatedAt = $row["updatedAt"];
  }

  function save($con)
  {
    extract(get_object_vars($this));
    $query = "update " . self::TABLE_NAME . " set quantity='$quantity', price='$price', 
       pro_id='$pro_id', order_id='$order_id' where detail_id = $id";

    mysqli_query($con, $query);
  }

  function delete($con)
  {
    $id = $this->id;
    $query = "delete from " . self::TABLE_NAME . " where detail_id = $id";
    mysqli_query($con, $query);

    return null;
  }

  function populated($con, $model)
  {
    if (gettype($model) == "string") {
      if ($model == "Product" || $model = "product") {
        $this->product = Product::find_by_pk($con, $this->pro_id);
      }
    }

    if (gettype($model) == "array") {
      for ($i = 0; $i < count($model); $i++) {
        $this->populated($con, $model[$i]);
      }
    }
  }

  // static func
  public static function find_by_pk($con, $id)
  {
    $query = "select * from " . self::TABLE_NAME . " where detail_id = $id";
    $result = mysqli_query($con, $query);

    if ($result->num_rows == 0) {
      return null;
    }

    $row = mysqli_fetch_array($result);
    $detail = new Detail($row);

    return $detail;
  }

  public static function create($con, $form)
  {
    [
      "quantity" => $quantity,
      "price" => $price,
      "pro_id" => $pro_id,
      "order_id" => $order_id,
    ] = $form;
    $query = "insert into " . self::TABLE_NAME . "(quantity, price, pro_id, order_id)
              values ('$quantity', '$price', '$pro_id', '$order_id')";

    if (mysqli_query($con, $query)) {
      $id = mysqli_insert_id($con);
      $detail = self::find_by_pk($con, $id);

      return $detail;
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

    $details = array();

    if (!$result) {
      return $details;
    }

    while ($row = mysqli_fetch_array($result)) {
      $detail = new Detail($row);
      array_push($details, $detail);
    }

    return $details;
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
    $detail = new Detail($row);

    return $detail;
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

    $details = array();

    $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
    $result_count = mysqli_query($con, $query_count);
    $count =  mysqli_fetch_array($result_count)[0];

    if (!$count) {
      return array("count" => 0, "rows" => $details);
    }

    $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " " . $limit . " " . $offset;
    $result = mysqli_query($con, $query);

    if (!$result) {
      return array("count" => 0, "rows" => $details);
    }

    while ($row = mysqli_fetch_array($result)) {
      $detail = new Detail($row);
      array_push($details, $detail);
    }

    return array("count" => $count, "rows" => $details);
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
    $query = "delete from " . self::TABLE_NAME . " where detail_id = $id";
    return mysqli_query($con, $query);
  }

  public static function update_by_pk($con, $id, $form)
  {
    $fields_update = [
      "quantity",
      "price",
      "pro_id",
      "order_id",
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
      $query = "update " . self::TABLE_NAME . " set " . $set . " where detail_id = $id";
      echo $query . "<br>";

      mysqli_query($con, $query);
    }

    $detail = self::find_by_pk($con, $id);

    return $detail;
  }
}
