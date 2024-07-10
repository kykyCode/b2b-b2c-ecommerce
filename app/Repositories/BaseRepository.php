<?php

namespace App\Repositories;

use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{

    /**
     * @var QueryBuilder
     */
    protected $query = null;

    abstract function model(): Model;

    public function query()
    {
        if (!$this->query) {
            $this->query = $this->model()->query();
        }
        return $this->query;
    }

    public function orderQuery(string $orderBy, string $orderType)
    {
        return $this->query = $this->query()->orderBy($orderBy, $orderType);
    }

    public function freshQuery(): self
    {
        $this->query = $this->model()->query();
        return $this;
    }

    public function __call($name, $arguments)
    {
        return $this->model()->$name(...$arguments);
    }
}
