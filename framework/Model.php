<?php
namespace Framework;

use \Yaf;
/**
 * 模型基类，应用模型继承于此类
 * Class Model
 * @package Core
 */
class Model
{

    protected $tableName;

    protected $connection;

    protected function getTablePrefix()
    {

        return $this->getConnect()->getPrefix();
    }

    protected function getTable()
    {

        return $this->tableName;
    }

    protected function getConnect()
    {
        $this->connection = Yaf\Registry::get('db');

        return $this->connection;
    }

    protected function get($join = null, $column = null, $where = null)
    {

        return $this->getConnect()->get($this->getTable(), $join, $column, $where);
    }

    protected function select($join, $columns = null, $where = null)
    {

        return $this->getConnect()->select($this->getTable(), $join, $columns, $where);
    }

    protected function insert($datas)
    {

        return $this->getConnect()->insert($this->getTable(), $datas);
    }

    protected function update($data, $where = null)
    {

        return $this->getConnect()->update($this->getTable(), $data, $where);
    }

    protected function count($join = null, $column = null, $where = null)
    {

        return $this->getConnect()->count($this->getTable(), $join, $column, $where);
    }

    protected function delete($where)
    {

        return $this->getConnect()->delete($this->getTable(), $where);
    }

    protected function action($actions)
    {

        return $this->getConnect()->action($actions);
    }
}