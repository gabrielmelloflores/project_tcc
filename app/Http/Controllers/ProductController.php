<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        return view('produtos',[
            'products' => Product::latest()->paginate(10)->withQueryString()
        ]);
    }

    public function store()
    {
        Product::create(array_merge($this->validateProduct(), [
            'acitve' => 1,
        ]));

        return redirect('/produtos');
    }

    public function update(Product $product)
    {
        $attributes = $this->validateProduct($product);

        $product->update($attributes);
        return redirect('/produtos');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Produto Deletado!');
    }

    public function validateProduct(?Product $product = null): array
    {
        $product ??= new Product();
     
        $request = request()->validate([
            'name' => 'required',
            'value' => 'required',
            'tag' => 'required',
            'prepare' => 'required',
        ]);
        return $request;
    }
}
