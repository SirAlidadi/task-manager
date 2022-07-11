<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    protected $db;
    protected string $table;

    public function __construct($config)
    {
        try {
            $this->db = new \PDO("mysql:host={$config['host']};dbname={$config['name']}", $config['user'], $config['password']);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function table(string $table)
    {
        $this->table = $table;
        return $this;
    }

    public function all()
    {
        $sql = "SELECT * FROM $this->table";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function select(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$id]);

        $record = $stmt->fetch(PDO::FETCH_OBJ);

        return $record;
    }

    public function insert(array $data)
    {
        $placeholder = [];

        foreach ($data as $column => $value) {
            $placeholder[] = '?';
        }

        $fields = implode(',', array_keys($data));

        $placeholder = implode(',', $placeholder);

        $sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholder})";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute(array_values($data));
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id]);
    }
}
