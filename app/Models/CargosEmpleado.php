<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;
use App\Models\Cargo;
use App\Models\Area;
use App\Models\Role;

class CargosEmpleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'cargo_id',
        'area_id',
        'role_id',
        'empleado_jefe_id',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function empleado_jefe()
    {
        return $this->belongsTo(Empleado::class);
    }
    
    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
