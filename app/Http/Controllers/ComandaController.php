<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use App\Models\Table;
use App\Models\Product;
use App\Models\ComandaItem;

class ComandaController extends Controller
{
    public function index()
    {
        return view('comanda',[
            'comandas' => Comanda::all(),
            'tables' => Table::all(),
            'products' => Product::all(),
            'comandaItens' => ComandaItem::all(),
            // 'teste' =>  Comanda::select('select c.*, ci.comanda_id, ci.product_id, ci.quantity from project_tcc.comandas c inner join project_tcc.comanda_items ci on ci.comanda_id = c.id inner join project_tcc.tables t on t.anexo = c.table_id')
        ]);
    }

    public function store()
    {

        $arr = request()->all();
        $idComanda = Comanda::create(array_merge($this->validateComanda(), [
            'user_id' => request()->user()->id,
        ]))->id;
        
        $tableId = $arr['table_id'];
        unset($arr['_token']);
        unset($arr['table_id']);

        foreach ($arr as $key=>$value){

            if(substr($key,0, 8) == 'table_id'){
                
                $request = request()->validate([
                    'table_id'.substr($key,8) => 'max:255'
                ]);

                $id = $request['table_id'.substr($key,8)];
                
                $table = Table::find($id); 
                $table->anexo = $tableId;  
                $table->save();
            }

            if(substr($key,0, 10) == 'product_id'){
               
                $request = request()->validate([
                    'product_id'.substr($key,10) => 'max:255',
                    'quantity'.substr($key,10) => 'max:255',
                ]);
               
                $request['product_id'] = $request['product_id'.substr($key,10)];
                unset($request['product_id'.substr($key,10)]);
                $request['quantity'] = $request['quantity'.substr($key,10)];
                unset($request['quantity'.substr($key,10)]);
               
                ComandaItem::create(array_merge($request, ['comanda_id' => $idComanda]));
            
            }
        
        }

        return redirect('/comanda');

    }

    public function validateComanda(?Comanda $comanda = null): array
    {
        $comanda ??= new Comanda();

        $request = request()->validate([
            'table_id' => 'required',
        ]);
       
        return $request;
    }
}
