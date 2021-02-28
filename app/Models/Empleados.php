<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleados extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'empleados';
    protected $fillable = ['primer_nombre','last_name','compañia_id','email','telefono','genero'];
    protected $guarded = ['id'];
}
