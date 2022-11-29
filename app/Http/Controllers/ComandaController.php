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
        ]);
    }

    public function create(Comanda $comanda)
    {
        return view('new',[
            'comandas' => Comanda::all(),
            'tables' => Table::all(),
            'products' => Product::all(),
            'comandaItens' => ComandaItem::all(),
        ]);
    }
    //'tables' => Table::select('select t.* from project_tcc.tables t inner join project_tcc.comandas c on c.table_id = t.id where c.table_id is NULL and t.anexo is NULL'),

    public function edit(Comanda $comanda)
    {
        return view('comandaEdit', [
            'comandas' => Comanda::all(),
            'comanda' => $comanda,
            'anexos' => Comanda::select('select t.id from project_tcc.comandas c inner join project_tcc.tables t on t.anexo = c.table_id where c.id = '.$comanda),
            'tables' => Table::all(),
            'products' => Product::all(),
            'comandaItens' => ComandaItem::all()
        ]);
    }

    public function update(Comanda $comanda)
    {
        $attributes = $this->validateComanda($comanda);
        $comanda->update($attributes);

        $arr = request()->all();
        
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
                    'delivered'.substr($key,10) => 'max:255',
                ]);
                $request['product_id'] = $request['product_id'.substr($key,10)];
                unset($request['product_id'.substr($key,10)]);
                $request['quantity'] = $request['quantity'.substr($key,10)];
                unset($request['quantity'.substr($key,10)]);
                $request['delivered'] = $request['delivered'.substr($key,10)];
                unset($request['delivered'.substr($key,10)]);
                $file = ComandaItem::where([
                    ['product_id', '=', $request["product_id"]],
                    ['comanda_id', '=', $comanda->id],
                ])->first();
                if($file) {
                    $file->delete();
                }
                ComandaItem::create(array_merge($request, ['comanda_id' => $comanda->id]));
            
            }
        
        }

        return redirect('/comanda');
    }

    public function destroy(Comanda $comanda)
    {
        $produtos = ComandaItem::where([
            ['comanda_id', '=', $comanda->id],
        ]);

        $tables = Table::select('select t.* from tables t left join comandas c on t.anexo = c.table_id where c.id = '.$comanda->id);
        
        $tables->update(['anexo' => NULL]);

        $produtos->delete();

        $comanda->delete();
        return redirect('/comanda');

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
                    'delivered'.substr($key,10) => 'max:255',
                ]);
               
                $request['product_id'] = $request['product_id'.substr($key,10)];
                unset($request['product_id'.substr($key,10)]);
                $request['quantity'] = $request['quantity'.substr($key,10)];
                unset($request['quantity'.substr($key,10)]);
                $request['delivered'] = $request['delivered'.substr($key,10)];
                unset($request['delivered'.substr($key,10)]);
                ComandaItem::create(array_merge($request, ['comanda_id' => $idComanda]));
            
            }
        
        }

        return redirect('/comanda/'.$idComanda);

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
