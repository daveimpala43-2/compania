<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class compania extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $table = 'compañias';
    protected $fillable = ['nombre','email','logo','website'];
    protected $guarded = ['id'];
}
