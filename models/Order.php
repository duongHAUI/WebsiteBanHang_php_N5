<?php

namespace Models;

class Order extends Model
{
  public $receiver;
  public $address;
  public $status;
  public $amount;
  public $phone;
  public $note;
  public $cus_id;
  public $customer;
  const TABLE_NAME = "orders";

  // entity function
  function __construct($row)
  {
    $this->id = $row["order_id"];
    $this->receiver = $row["order_receiver"];
    $this->address = $row["order_address"];
    $this->status = $row["order_status"];
    $this->amount = $row["order_amount"];
    $this->phone = $row["order_phone"];
    $this->note = $row["order_note"];
    $this->cus_id = $row["cus_id"];
    $this->createdAt = $row["createdAt"];
    $this->updatedAt = $row["updatedAt"];
  }

  function save($con)
  {
    extract(get_object_vars($this));
    $query = "update " . self::TABLE_NAME . " set order_receiver='$receiver', order_address='$address', 
      order_status='$status', order_amount='$amount', 
      cus_id='$cus_id', order_phone='$phone', order_note='$note' where order_id = $id";

    mysqli_query($con, $query);
  }

  function delete($con)
  {
    $id = $this->id;
    $query = "delete from " . self::TABLE_NAME . " where order_id = $id";
    mysqli_query($con, $query);

    return null;
  }

  function populated($con, $model)
  {
    if (gettype($model) == "string") {
      if ($model == "Customer" || $model == "customer") {
        $this->customer = Customer::find_by_pk($con, $this->cus_id);
      }
    }

    if (gettype($model) == "array") {
      for ($i = 0; $i < count($model); $i++) {
        $this->populated($con, $model[$i]);
      }
    }
  }

  function get_details($con)
  {
    $images = Detail::find_all($con, array("where" => "order_id = $this->id"));

    return $images;
  }

  // static func
  public static function find_by_pk($con, $id)
  {
    $query = "select * from " . self::TABLE_NAME . " where order_id = $id";
    $result = mysqli_query($con, $query);

    if ($result->num_rows == 0) {
      return null;
    }

    $row = mysqli_fetch_array($result);
    $order = new Order($row);

    return $order;
  }

  public static function create($con, $form)
  {
    [
      "order_receiver" => $receiver,
      "order_address" => $address,
      "order_status" => $status,
      "order_amount" => $amount,
      "order_phone" => $phone,
      "order_note" => $note,
      "cus_id" => $cus_id,
    ] = $form;
    $query = "insert into " . self::TABLE_NAME . "(order_receiver, order_address, order_status, 
              order_amount, order_phone, order_note, cus_id)
              values ('$receiver', '$address', '$status', '$amount', '$phone', '$note', '$cus_id')";
    if (mysqli_query($con, $query)) {
      $id = mysqli_insert_id($con);
      $order = self::find_by_pk($con, $id);

      return $order;
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

    $orders = array();

    if (!$result) {
      return $orders;
    }

    while ($row = mysqli_fetch_array($result)) {
      $order = new Order($row);
      array_push($orders, $order);
    }

    return $orders;
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
    $order = new Order($row);

    return $order;
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

    $orders = array();

    $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
    $result_count = mysqli_query($con, $query_count);
    $count =  mysqli_fetch_array($result_count)[0];

    if (!$count) {
      return array("count" => 0, "rows" => $orders);
    }

    $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " " . $limit . " " . $offset;
    $result = mysqli_query($con, $query);

    if (!$result) {
      return array("count" => 0, "rows" => $orders);
    }

    while ($row = mysqli_fetch_array($result)) {
      $order = new Order($row);
      array_push($orders, $order);
    }

    return array("count" => $count, "rows" => $orders);
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
    $query = "delete from " . self::TABLE_NAME . " where order_id = $id";
    return mysqli_query($con, $query);
  }

  public static function update_by_pk($con, $id, $form)
  {
    $fields_update = [
      "order_receiver",
      "order_address",
      "order_status",
      "order_amount",
      "cus_id",
      "order_phone",
      "order_note"
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
      $query = "update " . self::TABLE_NAME . " set " . $set . " where order_id = $id";
      echo $query . "<br>";

      mysqli_query($con, $query);
    }
    $order = self::find_by_pk($con, $id);
    return $order;
  }
}
