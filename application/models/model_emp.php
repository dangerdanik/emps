<?php

class Model_emp extends Model
{

    public function clear_input($value)
    {

        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    public function save_emp($data)
    {
        $name = $data['name'];
        $surname = $data['surname'];
        $middle_name = $data['middle_name'];
        $date = $data['date'];
        $gender = ($data['gender'] == 'Мужчина') ? 1 : 0;

        $query = "INSERT INTO emps(surname, name, middle_name, date, gender) VALUES ('$surname','$name', '$middle_name', '$date', '$gender');";
        $res = $this->db->prepare($query);
        $res->execute() or die(print_r($res->errorInfo(), true));
        return $res;
    }

    public function update_emp($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $surname = $data['surname'];
        $middle_name = $data['middle_name'];
        $date = $data['date'];
        $gender = ($data['gender'] == 'Мужчина') ? 1 : 0;

        $query = "UPDATE emps SET surname='$surname', name='$name',  middle_name='$middle_name', date='$date', gender='$gender' WHERE id=$id;";
        $res = $this->db->prepare($query);
        $res->execute() or die(print_r($res->errorInfo(), true));
        return $res;

    }

    public function get_emp($id)
    {
        $data = null;
        if ($id == 0) {
            return false;
        }

        $result = $this->db->query('SELECT * FROM emps WHERE id = ' . $id);
        if ($result) {

            $data = $result->fetch();

        } else {
            debug("Проблема с выборкой данных ");
            $error = $this->db->errorInfo();
            debug($error);
        }

        return $data;
    }

    public function del_emp($id)
    {
        $query = "DELETE FROM emps WHERE id = $id;";
        $res = $this->db->prepare($query);
        $res->execute() or die(print_r($res->errorInfo(), true));
        return $res;
    }

    public function validate($data)
    {
        $result = false;
        $name = $this->clear_input($data['name']);
        $surname = $this->clear_input($data['surname']);
        $middle_name = $this->clear_input($data['middle_name']);
        $date = $data['date'];

        if (!empty($name) && !empty($surname) && !empty($middle_name) && !empty($date)) {
            $result = true;
        }

        return $result;
    }

}
