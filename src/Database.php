<?php
require_once 'config.php';

class Database
{
    private static $db;
    private $pdo;

    private function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            echo 'Ошибка при подключении к базе данных ' . $e->getMessage();
        }
    }

    public static function getDBO()
    {
        if (!self::$db) self::$db = new Database();
        return self::$db;
    }


    public function getCountRows(string $tableName, string $where = '', array $values = []): int
    {
        $sql = 'SELECT COUNT(`id`) as `count` FROM ' . $this->getTableName($tableName);
        if ($where) $sql .= " WHERE $where";
        $query = $this->pdo->prepare($sql);
        $query->execute($values);
        return $query->fetchColumn();
    }

    private function getTableName(string $tableName): string
    {
        return '`' . DB_PREFIX . $tableName . '`';
    }

    public function getRows(string $tableName, string $where = '', array $values = [], string $orderBy = ''): array
    {
        $sql = 'SELECT * FROM ' . $this->getTableName($tableName);
        if ($where) $sql .= " WHERE $where";
        if ($orderBy) $sql .= " ORDER BY $orderBy";
        $query = $this->pdo->prepare($sql);
        $query->execute($values);
        return $query->fetchAll();
    }

    public function getRowByWhere(string $tableName, string $where = '', array  $values = [], string $orderBy = ''): array
    {
        $sql = 'SELECT * FROM ' . $this->getTableName($tableName) . " WHERE $where";
        $query = $this->pdo->prepare($sql);
        $query->execute($values);
        $result = $query->fetch();
        if ($result) return $result;
        return [];
    }

    public function getRowById(string $tableName, int $id): array
    {
        return $this->getRowByWhere($tableName, ' id = ?', [$id]);
    }

    public function getRowsByIds(string $tableName, array $ids): array
    {
        $in = str_repeat('?,', count($ids) - 1) . '?';
        $sql = 'SELECT * FROM ' . $this->getTableName($tableName) . " WHERE `id` IN ($in)";
        $query = $this->pdo->prepare($sql);
        $query->execute($ids);
        $result = [];
        foreach ($query->fetchAll() as $row) {
            $result[$row['id']] = $row;
        }
        return $result;
    }

    public function update(string $tableName, array $fields, array $values, string $where = '', array $whereValues = [])
    {
        $sql = 'UPDATE ' . $this->getTableName($tableName) . ' SET ';
        foreach ($fields as $field) {
            $sql .= " `$field` = ?,";
        }
        $sql = substr($sql, 0, -1);
        if ($where) $sql .= " WHERE $where";
        $query = $this->pdo->prepare($sql);
        $query->execute(array_merge($values), $whereValues);
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}
