<?php

namespace Models;

class Image extends Model
{
  public $pro_id;
  public $link;
  const TABLE_NAME = "images";

  // entity function
  function __construct($row)
  {
    $this->id = $row["image_id"];
    $this->pro_id = $row["pro_id"];
    $this->link = $row["image_link"];
  }
  function save($con)
  {
    extract(get_object_vars($this));
    $query = "update " . self::TABLE_NAME . " set pro_id='$pro_id', image_link='$link' where image_id = $id";

    mysqli_query($con, $query);
  }

  function delete($con)
  {
    $id = $this->id;
    $query = "delete from " . self::TABLE_NAME . " where image_id = $id";
    mysqli_query($con, $query);

    return null;
  }

  // static func
  public static function find_by_pk($con, $id)
  {
    $query = "select * from " . self::TABLE_NAME . " where image_id = $id";
    $result = mysqli_query($con, $query);

    if ($result->num_rows == 0) {
      return null;
    }

    $row = mysqli_fetch_array($result);
    $image = new Image($row);

    return $image;
  }

  public static function create($con, $form)
  {
    [
      "pro_id" => $pro_id,
      "image_link" => $link,
    ] = $form;
    $query = "insert into " . self::TABLE_NAME . "(pro_id, image_link) values ('$pro_id', '$link')";

    if (mysqli_query($con, $query)) {
      $id = mysqli_insert_id($con);
      $image = self::find_by_pk($con, $id);

      return $image;
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
    $images = array();

    if (!$result) {
      return $images;
    }

    while ($row = mysqli_fetch_array($result)) {
      $image = new Image($row);
      array_push($images, $image);
    }

    return $images;
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
    $image = new Image($row);

    return $image;
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

    $images = array();

    $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
    $result_count = mysqli_query($con, $query_count);
    $count =  mysqli_fetch_array($result_count)[0];

    if (!$count) {
      return array("count" => 0, "rows" => $images);
    }

    $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " " . $limit . " " . $offset;
    $result = mysqli_query($con, $query);

    if (!$result) {
      return array("count" => 0, "rows" => $images);
    }

    while ($row = mysqli_fetch_array($result)) {
      $image = new Image($row);
      array_push($images, $image);
    }

    return array("count" => $count, "rows" => $images);
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
    $query = "delete from " . self::TABLE_NAME . " where image_id = $id";
    return mysqli_query($con, $query);
  }

  public static function update_by_pk($con, $id, $form)
  {
    $fields_update = [
      "pro_id",
      "image_link"
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
      $query = "update " . self::TABLE_NAME . " set " . $set . " where image_id = $id";
      echo $query . "<br>";

      mysqli_query($con, $query);
    }

    $image = self::find_by_pk($con, $id);

    return $image;
  }
}
