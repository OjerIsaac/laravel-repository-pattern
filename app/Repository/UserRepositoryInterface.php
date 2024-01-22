<?php

namespace App\Repository;

interface UserRepositoryInterface
{
    public function store($data);

    public function exists($data);
}
