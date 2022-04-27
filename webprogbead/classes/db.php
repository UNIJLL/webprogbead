<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');

class db
{
    private $connection;

    public function __construct()
    {
        $config = getConfig("db");

        // nem használok try-catch szerkezetet a központi hibakezelés miatt
        $this->connection = new PDO(
            $config['driver'] . ':host=' . $config['server'] . ';dbname=' . $config['dbname'],
            $config['username'],
            $config['password'],
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        $this->connection->query('set names utf8 collate utf8_hungarian_ci');
    }

    public function query(string $query, array $parameters = array())
    {
        $sth = $this->connection->prepare($query);
        $sth->execute($parameters);
        return $sth;
    }

    public function insert(string $tablename, array $rec)
    {
        $fields = array();
        $values = array();
        $parameters = array();

        foreach ($rec as $key => $value) {
            $fields[] = $key;
            $values[] = ':' . $key;
            $parameters[':' . $key] = $value;
        }

        $this->query("insert into $tablename(" . implode(',', $fields) . ") values(" . implode(',', $values) . ")", $parameters);
        return $this->connection->lastInsertId();
    }

    public function selectFirstRecord(string $query, array $parameters = array())
    {
        $sth = $this->query($query, $parameters);
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function selectFirstValue(string $query, array $parameters = array())
    {
        $sth = $this->query($query, $parameters);
        $row = $sth->fetch(PDO::FETCH_NUM);
        if ($row === false) return false;
        return $row[0];
    }

    public function selectIndex(string $query, array $parameters = array(), $key = 'id', $value = 'value')
    {
        $result = array();
        $sth = $this->query($query, $parameters);
        while ($rec = $sth->fetch(PDO::FETCH_ASSOC)) {
            $result[$rec[$key]] = $rec[$value];
        }
        return $result;
    }
}
