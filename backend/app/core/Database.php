<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    protected $db;
    protected string $table;
    protected array $conditions;
    protected array $values;

    public function __construct()
    {
        $config = [
            'host' => DB['host'],
            'name' => DB['name'],
            'user' => DB['user'],
            'password' => DB['password'],
        ];

        try {
            $this->db = new \PDO(
                "mysql:host={$config['host']};dbname={$config['name']}",
                $config['user'],
                $config['password']
            );
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function table(string $table)
    {
        $self = new self;
        $self->table = $table;
        return $self;
    }

    public function where(string $column, string $value)
    {
        $this->conditions[] = "{$column}=?";

        $this->values[] = $value;

        return $this;
    }

    public function all()
    {
        $sql = "SELECT * FROM $this->table";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function get()
    {
        $conditions = implode(' and ', $this->conditions);

        $sql = "SELECT * FROM $this->table WHERE $conditions";

        $stmt = $this->db->prepare($sql);

        $stmt->execute($this->values);

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

        $stmt->execute(array_values($data));

        return (int)$this->db->lastInsertId();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id]);
    }
}
