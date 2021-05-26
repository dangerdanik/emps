<?php


class Model_emp_card extends Model
{
    public function clear_input($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    public function get_emp($id)
    {
        $data = null;

        $result = $this->db->query('SELECT * FROM emps
                                            LEFT OUTER JOIN prev_work pw on emps.id = pw.emp_id WHERE emps.id =' . $id);
        if ($result) {

            while ($row = $result->fetch()) {
                $data[] = $row;
            }

        } else {
            debug("Проблема с выборкой данных ");
            $error = $this->db->errorInfo();
            debug($error, true);
        }

        return $data;
    }

    public function get_work_place($id)
    {
        $data = null;

        $result = $this->db->query('SELECT * FROM prev_work WHERE id =' . $id);
        if ($result) {

            $data = $result->fetch();

        } else {
            debug("Проблема с выборкой данных ");
            $error = $this->db->errorInfo();
            debug($error);
        }

        return $data;
    }

    public function update_work_place($data)
    {
        $id = $data['id'];
        $place = $data['place'];
        $date_start = $data['date_start'];
        $date_end = $data['date_end'];

        $query = "UPDATE prev_work SET place='$place', date_start='$date_start',  date_end='$date_end' WHERE id=$id;";
        $res = $this->db->prepare($query);
        $res->execute() or die(debug($res->errorInfo(), true));
        // debug($query);
        return $res;
    }

    public function save_work_place($data)
    {
        $emp_id = $data['id'];
        $place = $data['place'];
        $date_start = $data['date_start'];
        $date_end = $data['date_end'];

        $query = "INSERT INTO prev_work(place, date_start, date_end, emp_id) VALUES ('$place','$date_start', '$date_end', $emp_id);";
        $res = $this->db->prepare($query);
        $res->execute() or die(debug($res->errorInfo(), true));
        return $res;
    }

    public function del_work_place($id)
    {
        if ($id == 0) {
            return false;
        }
        $query = "DELETE FROM prev_work WHERE id = $id;";
        $res = $this->db->prepare($query);
        $res->execute() or die(print_r($res->errorInfo(), true));
        return $res;
    }

    public function validate($data)
    {
        $result = false;
        $place = $this->clear_input($data['place']);
        $date_start = $data['date_start'];
        $date_end = $data['date_end'];
        if (!empty($place) && !empty($date_start) && !empty($date_end)) {
            $result = true;
        }
        return $result;
    }
}