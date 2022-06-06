<?php

namespace Models;

class Cart extends Model
{
  public $qty;
  public $cus_id;
  public $pro_id;
  public $customer;
  public $product;
  const TABLE_NAME = "cart";

  // entity function
  function __construct($row)
  {
    $this->id = $row["cart_id"];
    $this->qty = $row["cart_qty"];
    $this->cus_id = $row["cus_id"];
    $this->pro_id = $row["pro_id"];
    $this->createdAt = $row["createdAt"];
    $this->updatedAt = $row["updatedAt"];
  }

  function save($con)
  {
    extract(get_object_vars($this));
    $query = "update " . self::TABLE_NAME . " set cart_qty='$qty', 
      cus_id='$cus_id', pro_id='$pro_id' where cart_id = $id";

    mysqli_query($con, $query);
  }

  function delete($con)
  {
    $id = $this->id;
    $query = "delete from " . self::TABLE_NAME . " where cart_id = $id";
    mysqli_query($con, $query);

    return null;
  }

  function populated($con, $model)
  {
    if (gettype($model) == "string") {
      if ($model == "Customer" || $model == "customer") {
        $this->customer = Customer::find_by_pk($con, $this->cus_id);
      }

      if ($model == "Product" || $model == "product") {
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
    $query = "select * from " . self::TABLE_NAME . " where cart_id = $id";
    $result = mysqli_query($con, $query);

    if ($result->num_rows == 0) {
      return null;
    }

    $row = mysqli_fetch_array($result);
    $cart = new Cart($row);

    return $cart;
  }

  public static function create($con, $form)
  {
    [
      "cart_qty" => $qty,
      "cus_id" => $cus_id,
      "pro_id" => $pro_id,
    ] = $form;
    $query = "insert into " . self::TABLE_NAME . "(cart_qty, cus_id, pro_id)
              values ('$qty', '$cus_id', '$pro_id')";

    if (mysqli_query($con, $query)) {
      $id = mysqli_insert_id($con);
      $cart = self::find_by_pk($con, $id);

      return $cart;
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

    $carts = array();

    if (!$result || $result->num_rows == 0) {
      return $carts;
    }

    while ($row = mysqli_fetch_array($result)) {
      $cart = new Cart($row);
      array_push($carts, $cart);
    }

    return $carts;
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

    if (!$result || $result->num_rows == 0) {
      return null;
    }

    $row = mysqli_fetch_array($result);
    $cart = new Cart($row);

    return $cart;
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

    $carts = array();

    $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
    $result_count = mysqli_query($con, $query_count);
    $count =  mysqli_fetch_array($result_count)[0];

    if (!$count) {
      return array("count" => 0, "rows" => $carts);
    }

    $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " " . $limit . " " . $offset;
    $result = mysqli_query($con, $query);

    if (!$result || $result->num_rows == 0) {
      return array("count" => 0, "rows" => $carts);
    }

    while ($row = mysqli_fetch_array($result)) {
      $cart = new Cart($row);
      array_push($carts, $cart);
    }

    return array("count" => $count, "rows" => $carts);
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
    $query = "delete from " . self::TABLE_NAME . " where cart_id = $id";
    return mysqli_query($con, $query);
  }

  public static function update_by_pk($con, $id, $form)
  {
    $fields_update = [
      "cart_qty",
      "cus_id",
      "pro_id",
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

    if ($set != "") {
      $query = "update " . self::TABLE_NAME . " set " . $set . " where cart_id = $id";

      mysqli_query($con, $query);
    }

    $cart = self::find_by_pk($con, $id);

    return $cart;
  }

  // public static function delete_cart_by_customerId($con, $cart_id, $cus_id)
  // {
  //   $query = "delete from " . self::TABLE_NAME . " where cart_id = $cart_id, cus_id = $cus_id";
  //   return mysqli_query($con, $query);
  // }
}
