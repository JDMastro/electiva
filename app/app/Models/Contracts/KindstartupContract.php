<?php

namespace App\Models\Contracts;

interface KindstartupContract
{
    public function getId() : int;
    public function getName() : string;
}