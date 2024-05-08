<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sucursal extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'Sucursales';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'direccion',
        'nombre',
        'telefono'
    ];

    public function empleados() {
        return $this->hasMany(Empleado::class);
    }
}
