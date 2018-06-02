<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Controllers\Controller;

use App\Product;

use App\ProductImage;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(){

        $products= Product::paginate(20);
       return view('admin.products.index')->with(compact('products'));
    }

    public function create(){

        $categories = Category::orderby('name')->get();


        return view('admin.products.create')->with(compact('categories'));
    }

    public function store(Request $request){
//dd($request->all());
        //validacion de campos mediante rules y metodo validate

        $messages=[

            'name.required'=> 'Hace falta un nombre',
            'name.min'=>'El nombre debe tener minimo 3 caracteres',
            'description.required'=>'Hace falta una descripcion',
            'description.max'=>'Maximo 230 caracteres en la descripcion',
            'price.required'=>'Hace falta un precio',
            'price.numeric'=>'el precio debe estar en digitos',
            'price.min'=>'El precio no puede ser menor que 0'


        ];

        $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:230',
             'price'=>'required|numeric| min:0'
        ];
        $this->validate($request, $rules, $messages);




        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->input('category_id');
        $product->save();

        return redirect('/admin/products');
    }


    public function edit($id){
        $categories = Category::orderby('name')->get();
            $product= Product::find($id);
        return view('admin.products.edit')->with(compact('product','categories'));
    }

    public function update(Request $request, $id){
//dd($request->all());

        $messages=[

            'name.required'=> 'Hace falta un nombre',
            'name.min'=>'El nombre debe tener minimo 3 caracteres',
            'description.required'=>'Hace falta una descripcion',
            'description.max'=>'Maximo 230 caracteres en la descripcion',
            'price.required'=>'Hace falta un precio',
            'price.numeric'=>'el precio debe estar en digitos',
            'price.min'=>'El precio no puede ser menor que 0'


        ];

        $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:230',
            'price'=>'required|numeric| min:0'
        ];
        $this->validate($request, $rules, $messages);



        $product =  Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->input('category_id');
        $product->save();

        return redirect('/admin/products');
    }

        public function destroy($id)
        {
            //CartDetail::where('product_id', $id)->delete();
            ProductImage::where('product_id', $id)->delete();

            $product = Product::find($id);
            $product->delete(); // DELETE

            return back();
        }
}
