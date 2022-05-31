<?php

namespace Models;

class Slider extends Model
{
  public $name;
  public $image;
  public $good;
  public $desc;
  const TABLE_NAME = "slider";

  // entity function
  function __construct($row)
  {
    $this->id = $row["slide_id"];
    $this->name = $row["slide_name"];
    $this->image = $row["slide_image"];
    $this->good = $row["slide_good"];
    $this->desc = $row["slide_desc"];
  }

  function save($con)
  {
    extract(get_object_vars($this));
    $query = "update " . self::TABLE_NAME . " set slide_name='$name', slide_image='$image' where slide_id = $id";

    mysqli_query($con, $query);
  }

  function delete($con)
  {
    $id = $this->id;
    $query = "delete from " . self::TABLE_NAME . " where slide_id = $id";
    mysqli_query($con, $query);

    return null;
  }

  // static func
  public static function find_by_pk($con, $id)
  {
    $query = "select * from " . self::TABLE_NAME . " where slide_id = $id";
    $result = mysqli_query($con, $query);

    if ($result->num_rows == 0) {
      return null;
    }

    $row = mysqli_fetch_array($result);
    $slide = new Slider($row);

    return $slide;
  }

  public static function create($con, $form)
  {
    [
      "slide_name" => $name,
      "slide_image" => $image,
      "slide_good" => $good,
      "slide_desc" => $desc
    ] = $form;
    $query = "insert into " . self::TABLE_NAME . "(slide_name,slide_good, slide_image,slide_desc) values ('$name','$good' ,'$image','$desc')";
    if (mysqli_query($con, $query)) {
      $id = mysqli_insert_id($con);
      $slide = self::find_by_pk($con, $id);

      return $slide;
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

    $sliders = array();

    if (!$result || $result->num_rows == 0) {
      return $sliders;
    }

    while ($row = mysqli_fetch_array($result)) {
      $slide = new Slider($row);
      array_push($sliders, $slide);
    }

    return $sliders;
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
    $slide = new Slider($row);

    return $slide;
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

    $sliders = array();

    $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
    $result_count = mysqli_query($con, $query_count);
    $count =  mysqli_fetch_array($result_count)[0];

    if (!$count) {
      return array("count" => 0, "rows" => $sliders);
    }

    $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " " . $limit . " " . $offset;
    $result = mysqli_query($con, $query);

    if (!$result || $result->num_rows == 0) {
      return array("count" => 0, "rows" => $sliders);
    }

    while ($row = mysqli_fetch_array($result)) {
      $slide = new Slider($row);
      array_push($sliders, $slide);
    }

    return array("count" => $count, "rows" => $sliders);
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
    $query = "delete from " . self::TABLE_NAME . " where slide_id = $id";
    return mysqli_query($con, $query);
  }

  public static function update_by_pk($con, $id, $form)
  {
    $fields_update = [
      "slide_name",
      "slide_image"
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
      $query = "update " . self::TABLE_NAME . " set " . $set . " where slide_id = $id";
      echo $query . "<br>";

      mysqli_query($con, $query);
    }

    $slide = self::find_by_pk($con, $id);

    return $slide;
  }
}
