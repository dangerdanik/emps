<?php

class Model
{
    const HOST = "localhost";
    const DBUSER = "root";
    const DBPASS = "root";
    const DB = "tasker_db";

    protected $db;

    public function __construct(PDO $db = null)
    {

        $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DB;
        $this->db = $db;

        try {
            if ($this->db === null) {
                $this->db = new PDO($dsn, self::DBUSER, self::DBPASS);
            }
        } catch (PDOException $e) {
            debug($e->getMessage());
        }
    }

    // метод выборки данных
    public function get_data()
    {
        // todo
    }

    /*public function __destruct()
    {
        if ($this->db) {

            $this->db->close();
        }
    }*/

}
