<?php

namespace Models;

class Customer extends Model
{
    public $name;
    public $email;
    private $password;
    public $country;
    public $city;
    public $phone;
    public $address;
    public $image;
    const TABLE_NAME = "customers";

    // entity function
    function __construct($row)
    {
        $this->id = $row["customer_id"];
        $this->name = $row["customer_name"];
        $this->email = $row["customer_email"];
        $this->password = $row["customer_password"];
        $this->country = $row["customer_country"];
        $this->city = $row["customer_city"];
        $this->phone = $row["customer_phone"];
        $this->address = $row["customer_address"];
        $this->image = $row["customer_image"];
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
        $query = "update " . self::TABLE_NAME . " set customer_name='$name', customer_email='$email', 
      customer_password='$password', customer_country='$country', customer_city='$city', 
      customer_phone='$phone', customer_address='$address', customer_image='$image' where customer_id = $id";

        mysqli_query($con, $query);
    }

    function delete($con)
    {
        $id = $this->id;
        $query = "delete from " . self::TABLE_NAME . " where customer_id = $id";
        mysqli_query($con, $query);

        return null;
    }

    // static func
    public static function find_by_pk($con, $id)
    {
        $query = "select * from " . self::TABLE_NAME . " where customer_id = $id";
        $result = mysqli_query($con, $query);

        if ($result->num_rows == 0) {
            return null;
        }

        $row = mysqli_fetch_array($result);
        $customer = new Customer($row);

        return $customer;
    }

    public static function create($con, $form)
    {
        [
            "customer_name" => $name,
            "customer_email" => $email,
            "customer_password" => $password,
            "customer_country" => $country,
            "customer_city" => $city,
            "customer_phone" => $phone,
            "customer_address" => $address,
            "customer_image" => $image,
        ] = $form;
        $query = "insert into " . self::TABLE_NAME . "(customer_name, customer_email, customer_password, customer_country, 
              customer_city, customer_phone, customer_address, customer_image)
              values ('$name', '$email', '$password', '$country', '$city', '$phone', '$address', '$image')";

        if (mysqli_query($con, $query)) {
            $id = mysqli_insert_id($con);
            $customer = self::find_by_pk($con, $id);

            return $customer;
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

        $customers = array();

        if (!$result || $result->num_rows == 0) {
            return $customers;
        }

        while ($row = mysqli_fetch_array($result)) {
            $customer = new Customer($row);
            array_push($customers, $customer);
        }

        return $customers;
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
        $customer = new Customer($row);

        return $customer;
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

        $customers = array();

        $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
        $result_count = mysqli_query($con, $query_count);
        $count = mysqli_fetch_array($result_count)[0];

        if (!$count) {
            return array("count" => 0, "rows" => $customers);
        }

        $query = $select . " from " . self::TABLE_NAME . " " . $where . " " . $order . " " . $limit . " " . $offset;
        $result = mysqli_query($con, $query);

        if (!$result || $result->num_rows == 0) {
            return array("count" => 0, "rows" => $customers);
        }

        while ($row = mysqli_fetch_array($result)) {
            $customer = new Customer($row);
            array_push($customers, $customer);
        }

        return array("count" => $count, "rows" => $customers);
    }

    public static function count($con, $conditions = array())
    {
        $queryArr = self::conditions_to_query($conditions);
        [
            "where" => $where,
        ] = $queryArr;

        $query_count = "select count(*) from " . self::TABLE_NAME . " " . $where;
        $result_count = mysqli_query($con, $query_count);
        $count = mysqli_fetch_array($result_count)[0];

        return $count;
    }

    public static function delete_by_pk($con, $id)
    {
        $query = "delete from " . self::TABLE_NAME . " where customer_id = $id";
        return mysqli_query($con, $query);
    }

    public static function update_by_pk($con, $id, $form)
    {
        $fields_update = [
            "customer_name",
            "customer_email",
            "customer_password",
            "customer_country",
            "customer_city",
            "customer_phone",
            "customer_address",
            "customer_image"
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
            $query = "update " . self::TABLE_NAME . " set " . $set . " where customer_id = $id";

            mysqli_query($con, $query);
        }

        $customer = self::find_by_pk($con, $id);

        return $customer;
    }

    public static function redister($con, $form)
    {
        [
            $email,
            $name,
            $password,
        ] = $form;
        $query = "insert into " . self::TABLE_NAME . "(customer_name, customer_email, customer_password)
              values ('$name', '$email', '$password')";

        if (mysqli_query($con, $query)) {
            $id = mysqli_insert_id($con);
            $customer = self::find_by_pk($con, $id);

            return $customer;
        }

        return null;
    }
}
