<?php

namespace Models;

class Category extends Model
{
  public $title;
  public $desc;
  const TABLE_NAME = "categories";

  // entity function
  function __construct($row)
  {
    $this->id = $row["cat_id"];
    $this->title = $row["cat_title"];
    $this->desc = $row["cat_desc"];
    $this->createdAt = $row["createdAt"];
    $this->updatedAt = $row["updatedAt"];
  }

  function save($con)
  {
    extract(get_object_vars($this));
    $query = "update " . self::TABLE_NAME . " set cat_title='$title', cat_desc='$desc' where cat_id = $id";

    mysqli_query($con, $query);
  }

  function delete($con)
  {
    $id = $this->id;
    $query = "delete from " . self::TABLE_NAME . " where cat_id = $id";
    mysqli_query($con, $query);

    return null;
  }

  // static func
  public static function find_by_pk($con, $id)
  {
    $query = "select * from " . self::TABLE_NAME . " where cat_id = $id";
    $result = mysqli_query($con, $query);

    if ($result->num_rows == 0) {
      return null;
    }

    $row = mysqli_fetch_array($result);
    $category = new Category($row);

    return $category;
  }

  public static function create($con, $form)
  {
    [
      "cat_title" => $title,
      "cat_desc" => $desc,
    ] = $form;
    $query = "insert into " . self::TABLE_NAME . "(cat_title, cat_desc) values ('$title', '$desc')";

    if (mysqli_query($con, $query)) {
      $id = mysqli_insert_id($con);
      $category = self::find_by_pk($con, $id);

      return $category;
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

    $categories = array();

    if (!$result || $result->num_rows == 0) {
      return $categories;
    }

    while ($row = mysqli_fetch_array($result)) {
      $category = new Category($row);
      array_push($categories, $category);
    }

    return $categories;
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
    $category = new Category($row);

    return $category;
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

    $categories = array();

    $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
    $result_count = mysqli_query($con, $query_count);
    $count =  mysqli_fetch_array($result_count)[0];

    if (!$count) {
      return array("count" => 0, "rows" => $categories);
    }

    $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " " . $limit . " " . $offset;
    $result = mysqli_query($con, $query);

    if (!$result || $result->num_rows == 0) {
      return array("count" => 0, "rows" => $categories);
    }

    while ($row = mysqli_fetch_array($result)) {
      $category = new Category($row);
      array_push($categories, $category);
    }

    return array("count" => $count, "rows" => $categories);
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
    $query = "delete from " . self::TABLE_NAME . " where cat_id = $id";
    return mysqli_query($con, $query);
  }

  public static function update_by_pk($con, $id, $form)
  {
    $fields_update = [
      "cat_title",
      "cat_desc"
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
      $query = "update " . self::TABLE_NAME . " set " . $set . " where cat_id = $id";
      echo $query . "<br>";

      mysqli_query($con, $query);
    }

    $category = self::find_by_pk($con, $id);

    return $category;
  }
}
