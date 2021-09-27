<?php

namespace App\Models\Contracts;

interface StartupContract
{
    public function getId() : int;
    public function getName() : string;
    public function getImg() : string;
    public function getKindstartupId() : int;
    public function getUserId() : int;
}