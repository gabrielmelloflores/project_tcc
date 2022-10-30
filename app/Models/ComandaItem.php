<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComandaItem extends Model
{
    use HasFactory;
    protected $fillable = ['comanda_id','product_id','delivered','quantity'];

    public function comanda() {
        return $this->belongsTo(Comanda::class, 'comanda_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
