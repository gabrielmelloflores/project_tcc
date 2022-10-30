<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use App\Models\Table;
use App\Models\Product;
use App\Models\ComandaItem;

class KitchenController extends Controller
{
    public function index()
    {
        return view('cozinha',[
            'comandas' => Comanda::all(),
            'tables' => Table::all(),
            'products' => Product::all(),
            'comandaItens' => ComandaItem::all()
        ]);
    }
}
