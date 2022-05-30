<?php

namespace Models;
abstract class Model
{
  public $id;
  public $createdAt;
  public $updatedAt;

  abstract public static function find_by_pk(\mysqli $con, int $id);
  abstract public static function find_all(\mysqli $con, $conditions = array());
  abstract public static function find_one(\mysqli $con, $conditions = array());
  abstract public static function find_all_and_count(\mysqli $con, $conditions = array());
  abstract public static function count(\mysqli $con, $conditions = array());
  abstract public static function create(\mysqli $con, $form);
  abstract public static function delete_by_pk(\mysqli $con, int $id);
  abstract public static function update_by_pk(\mysqli $con, int $id, $form);

  abstract public function save(\mysqli $con);
  abstract public function delete(\mysqli $con);

  public static function conditions_to_query($conditions)
  {
    $select = "select " . (isset($conditions["select"]) ? $conditions["select"] : "*");
    $where = isset($conditions["where"]) ? "where " . $conditions["where"] : "";
    $order = isset($conditions["order"]) ? "order by " . $conditions["order"] : "";
    $limit = isset($conditions["limit"]) ? "limit " . $conditions["limit"] : "";
    $offset = isset($conditions["offset"]) ? "offset " . $conditions["offset"] : "";

    $queryArr = array("select" => $select, "where" => $where, "order" => $order, "limit" => $limit, "offset" => $offset);
    return $queryArr;
  }
}
  