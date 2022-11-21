<?php

namespace App\Repositories;

use App\Models\Cargo;
use App\Models\Area;
use App\Models\Role;
use Illuminate\Http\Request;

class AppRepository
{
    public function getAllCargos() 
    {
        return Cargo::all();
    }
    public function getAllAreas() 
    {
        return Area::all();
    }
    public function getAllRoles() 
    {
        return Role::all();
    }
}