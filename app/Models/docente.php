<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class docente extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
'name',
'surname_p',
'surname_m',
'matricula',

    ];
    public function maestro()
    {
        return $this->hasMany(optativa::class);
    }
}
