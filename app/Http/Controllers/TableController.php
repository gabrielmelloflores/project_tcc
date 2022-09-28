<?php

namespace App\Http\Controllers;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        return view('mesas',[
            'tables' => Table::all()
        ]);
    }

    public function store()
    {
        Table::create($this->validateTable());

        return redirect('/mesas');
    }

    public function update(Table $table)
    {
        $attributes = $this->validateTable($table);

        $table->update($attributes);
        return redirect('/mesas');
    }

    public function destroy(Table $table)
    {
        $table->delete();

        return back()->with('success', 'Mesa Deletada!');
    }

    public function validateTable(?Table $table = null): array
    {
        $table ??= new Table();
     
        $request = request()->validate([
            'number' => 'required',
            'seats' => 'required',
            'active' => 'max:255'
        ]);
        if(isset($request['active'])){
            $request['active'] = 1;
        }else{
            $request['active'] = 0;
        }

        return $request;
    }
}
