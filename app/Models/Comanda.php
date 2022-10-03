<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','table_id'];
    protected $with = ['table', 'waiter'];

    public function table(){
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Table::class, 'table_id');
    }

    public function waiter(){
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }
}
