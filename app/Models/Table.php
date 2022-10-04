<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'seats', 'anexo','active'];

    public function anexos(){
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Table::class, 'anexo');
    }

}
