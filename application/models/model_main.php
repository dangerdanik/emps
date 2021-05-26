<?php

class Model_Main extends Model
{

    public function get_data()
    {

        $data = array();

        $result = $this->db->query('SELECT * FROM emps');

        if ($result) {

            /* Выбираем результаты запроса: */
            while ($row = $result->fetch()) {
                $data[] = $row;
            }

            /* Освобождаем память */
            //$result->close();
        } else {
            debug("Проблема с выборкой данных - " . $this->db->error);
        }

        /* Закрываем соединение */
        // $this->db->close();

        return $data;
    }

}
