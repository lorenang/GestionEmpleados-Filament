<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'Empleados';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'fecha_de_nacimiento',
        'fecha_de_ingreso',
        'sucursal_id'
    ];

    public function sucursal() {
        return $this->belongsTo(Sucursal::class);
    }
}
