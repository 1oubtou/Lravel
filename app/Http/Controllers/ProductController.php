<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('index' , compact('data'));
    }

    
    public function create()
    {
        return view('create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name_p' => 'required|max:30',
            'description_p' => 'required|max:255',
            'price_p' => 'required|integer|min:5',
            'quantity_p' => 'required|integer|min:5',
        ]);

        Product::create([
            'Name' => $request->name_p,
            'Description' => $request->description_p,
            'Price' => $request->price_p,
            'Quantity' => $request->quantity_p,
        ]);

        return redirect()->route('Product_index');
    }

    
    public function show($id)
    {
        $Produit = Product::find($id);
        
        return view("show" , compact("Produit"));
    }

    
    public function edit($id)
    {
        $Product_id = Product::find($id);

        return view('update' , compact('Product_id'));
    }

    
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name_p' => 'required|max:30',
            'description_p' => 'required|max:255',
            'price_p' => 'required|integer|min:5',
            'quantity_p' => 'required|integer|min:5',
        ]);
        
        $modify = Product::find($id);
        
        $modify->Name = $request->name_p;
        $modify->Description = $request->description_p;
        $modify->Price = $request->price_p;
        $modify->Quantity = $request->quantity_p;
        
        $modify->save();

        return redirect()->route('Product_index');
    }

    
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('Product_index');
    }
}
