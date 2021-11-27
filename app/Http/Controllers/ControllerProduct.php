<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ControllerProduct extends Controller
{ 
    public function getProducts()
   {
    return Product::all(); 
   //busqueda por id return Product::find(2);
  //buscar por where return Product::Where('stock','>', 4) -> get();
  //para usar el where varias veces return Product::Where('stock', '>', 22) -> Where('precio','=',12) -> get();
 //para buscar con select return Product::Select('products.id','products.name') -> get(); 

    }

    public function saveProducts(Request $datos)
    {
       $new=new Product();
       $new->name=$datos->NOMBRE;
       $new->descripcion=$datos->DESCRIPCION;
       $new->stock=$datos->STOCK;
       $new->precio = $datos->PRECIO;
       $new->categories=1;
       $new->providers=1;
       $new->save();
       return $new;
    }

    public function updateProduct(Request $request, $datos) 
      {
        
        $request->validate([
          'name'=>'required',
          'descripcion'=> 'required',
          'stock' => 'required',
          'precio' => 'required',
          'categories' => 'required',
          'providers' => 'required'
        ]);
        $new = Product::find($id);
        $new->name = $request->input('NOMBRE');
        $new->descripcion = $request->input('DESCRIPCION');
        $new->stock = $request->input('STOCK');
        $new->precio = $request->input('PRECIO');
        $new->categories = $request->input('CATEGORIES');
        $new->providers = $request->input('PROVIDERS');


        $new->update();
      }
      

      public function deleteProduct ($id) {
         Product::destroy($id);
      }

   

}
