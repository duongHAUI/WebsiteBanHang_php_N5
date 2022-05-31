<?php

namespace Models;

class Brand extends Model
{
  public $title;
  public $desc;
  const TABLE_NAME = "brands";

  // entity function
  function __construct($row)
  {
    $this->id = $row["brand_id"];
    $this->title = $row["brand_title"];
    $this->desc = $row["brand_desc"];
    $this->createdAt = $row["createdAt"];
    $this->updatedAt = $row["updatedAt"];
  }

  function save($con)
  {
    extract(get_object_vars($this));
    $query = "update " . self::TABLE_NAME . " set brand_title='$title', brand_desc='$desc' where brand_id = $id";

    mysqli_query($con, $query);
  }

  function delete($con)
  {
    $id = $this->id;
    $query = "delete from " . self::TABLE_NAME . " where brand_id = $id";
    mysqli_query($con, $query);

    return null;
  }

  // static func
  public static function find_by_pk($con, $id)
  {
    $query = "select * from " . self::TABLE_NAME . " where brand_id = $id";
    $result = mysqli_query($con, $query);

    if ($result->num_rows == 0) {
      return null;
    }

    $row = mysqli_fetch_array($result);
    $brand = new Brand($row);

    return $brand;
  }

  public static function create($con, $form)
  {
    [
      "brand_title" => $title,
      "brand_desc" => $desc,
    ] = $form;
    $query = "insert into " . self::TABLE_NAME . "(brand_title, brand_desc) values ('$title', '$desc')";

    if (mysqli_query($con, $query)) {
      $id = mysqli_insert_id($con);
      $brand = self::find_by_pk($con, $id);

      return $brand;
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

    $brands = array();

    if (!$result || $result->num_rows == 0) {
      return $brands;
    }

    while ($row = mysqli_fetch_array($result)) {
      $brand = new Brand($row);
      array_push($brands, $brand);
    }

    return $brands;
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
    $brand = new Brand($row);

    return $brand;
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

    $brands = array();

    $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
    $result_count = mysqli_query($con, $query_count);
    $count =  mysqli_fetch_array($result_count)[0];

    if (!$count) {
      return array("count" => 0, "rows" => $brands);
    }

    $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " " . $limit . " " . $offset;
    $result = mysqli_query($con, $query);

    if (!$result || $result->num_rows == 0) {
      return array("count" => 0, "rows" => $brands);
    }

    while ($row = mysqli_fetch_array($result)) {
      $brand = new Brand($row);
      array_push($brands, $brand);
    }

    return array("count" => $count, "rows" => $brands);
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
    $query = "delete from " . self::TABLE_NAME . " where brand_id = $id";
    return mysqli_query($con, $query);
  }

  public static function update_by_pk($con, $id, $form)
  {
    $fields_update = [
      "brand_title",
      "brand_desc"
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
      $query = "update " . self::TABLE_NAME . " set " . $set . " where brand_id = $id";
      echo $query . "<br>";

      mysqli_query($con, $query);
    }

    $brand = self::find_by_pk($con, $id);

    return $brand;
  }
}
