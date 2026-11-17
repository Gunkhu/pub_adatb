<?php

namespace App\Services;
use App\Models\Type;

class TypeService{
    public function __construct(){}

    public function getId(string $name):int{
        $type= Type::where("type",$name)->first();

        return $type->id;
    }
}