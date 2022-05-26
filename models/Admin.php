<?php

namespace Models;

class Admin extends Model
{
  public $name;
  public $email;
  private $password;
  public $country;
  public $about;
  public $phone;
  public $image;
  const TABLE_NAME = "admins";

  // entity function
  function __construct($row)
  {
    $this->id = $row["admin_id"];
    $this->name = $row["admin_name"];
    $this->email = $row["admin_email"];
    $this->password = $row["admin_password"];
    $this->country = $row["admin_country"];
    $this->about = $row["admin_about"];
    $this->phone = $row["admin_phone"];
    $this->image = $row["admin_image"];
    $this->createdAt = $row["createdAt"];
    $this->updatedAt = $row["updatedAt"];
  }


  public function set_password($password)
  {
    $this->password = $password;
  }

  function compare_password($password)
  {
    return !strcmp($this->password, $password);
  }

  function save($con)
  {
    extract(get_object_vars($this));
    $query = "update " . self::TABLE_NAME . " set admin_name='$name', admin_email='$email', 
      admin_password='$password', admin_country='$country', admin_about='$about', 
      admin_phone='$phone', admin_image='$image' where admin_id = $id";

    mysqli_query($con, $query);
  }

  function delete($con)
  {
    $id = $this->id;
    $query = "delete from " . self::TABLE_NAME . " where admin_id = $id";
    mysqli_query($con, $query);

    return null;
  }

  // static func
  public static function find_by_pk($con, $id)
  {
    $query = "select * from " . self::TABLE_NAME . " where admin_id = $id";
    $result = mysqli_query($con, $query);

    if ($result->num_rows == 0) {
      return null;
    }

    $row = mysqli_fetch_array($result);
    $admin = new Admin($row);

    return $admin;
  }

  public static function create($con, $form)
  {
    [
      "admin_name" => $name,
      "admin_email" => $email,
      "admin_password" => $password,
      "admin_country" => $country,
      "admin_about" => $about,
      "admin_phone" => $phone,
      "admin_image" => $image,
    ] = $form;
    $query = "insert into " . self::TABLE_NAME . "(admin_name, admin_email, admin_password, admin_country, 
              admin_about, admin_phone, admin_image)
              values ('$name', '$email', '$password', '$country', '$about', '$phone', '$image')";

    if (mysqli_query($con, $query)) {
      $id = mysqli_insert_id($con);
      $admin = self::find_by_pk($con, $id);

      return $admin;
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

    $admins = array();

    if (!$result) {
      return $admins;
    }

    while ($row = mysqli_fetch_array($result)) {
      $admin = new Admin($row);
      array_push($admins, $admin);
    }

    return $admins;
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
    $admin = new Admin($row);

    return $admin;
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

    $admins = array();

    $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
    $result_count = mysqli_query($con, $query_count);
    $count =  mysqli_fetch_array($result_count)[0];

    if (!$count) {
      return array("count" => 0, "rows" => $admins);
    }

    $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " " . $limit . " " . $offset;
    $result = mysqli_query($con, $query);

    if (!$result) {
      return array("count" => 0, "rows" => $admins);
    }

    while ($row = mysqli_fetch_array($result)) {
      $admin = new Admin($row);
      array_push($admins, $admin);
    }

    return array("count" => $count, "rows" => $admins);
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
    $query = "delete from " . self::TABLE_NAME . " where admin_id = $id";
    return mysqli_query($con, $query);
  }

  public static function update_by_pk($con, $id, $form)
  {
    $fields_update = [
      "admin_name",
      "admin_email",
      "admin_password",
      "admin_country",
      "admin_about",
      "admin_phone",
      "admin_image"
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
      $query = "update " . self::TABLE_NAME . " set " . $set . " where admin_id = $id";
      echo $query . "<br>";

      mysqli_query($con, $query);
    }

    $admin = self::find_by_pk($con, $id);

    return $admin;
  }
}
