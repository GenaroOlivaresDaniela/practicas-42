<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class alumno extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
'namea',
'surname_p',
'surname_m',
'matricula',

    ];
    public function alumno()
    {
        return $this->hasMany(optativa::class);
    }
}
