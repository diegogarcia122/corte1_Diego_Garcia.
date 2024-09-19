<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::select(
            'codigo', 
            'nombre', 
            'descripcion',
            'categoria', 
            'precio', 
            'stock'
        )
            ->orderBy('categoria')
            ->orderBy('nombre')->get();
        return response()->json([
            'status' => 'success',
            'data' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $products = Product::create($request->all());
            return response()->json(['status' => 'success', 
            'message' => 'Productos creada exitosamente', 
            'data' => $products]);
        }catch(\Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $products = Product::where('id', $value)
                ->orWhere('nombre', $value)
                ->orWhere('codigo', $value)
                ->firstOrFail();
            return response()->json([
                'status' => 'success',
                'data' => $products
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $products = Product::findOrFail($id);
            $products = update($request->all());
            return response()-> json(['status' => 'success', 'message' => 'Producto actualizado exitosamente',
            'data' => $products]);
        }catch(\Exception $e) {
            return response() -> json(['status' => 'error', 'message' => $e -> getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $products = Product::findOrFail($id);
            $products->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Producto eliminado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
