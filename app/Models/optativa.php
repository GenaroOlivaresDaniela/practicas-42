<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class optativa extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
'materia',
'maestro_id',
'alumno_id'

    ];
    public function optativa()
    {
        return $this->belongsTo(alumno::class);
    }
    public function type()
    {
        return $this->belongsTo(docente::class);
    }
}
