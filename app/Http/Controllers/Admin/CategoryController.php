<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class CategoryController extends Controller
{
    public function index(){

        $categories= Category::Orderby('name')->paginate(10);
        return view('admin.categories.index')->with(compact('categories'));
    }

    public function create(){


        return view('admin.categories.create');
    }

    public function store(Request $request){
//dd($request->all());
        //validacion de campos mediante rules y metodo validate


        $this->validate($request, Category::$rules, Category::$messages);

        $category = Category::create($request->only('name','description'));

        if ($request->hasFile('image'))

        $file = $request->file('image');
        $path = public_path() . '/images/categories';
        $fileName = uniqid() . $file->getClientOriginalName();
        $moved = $file->move($path, $fileName);

        if ($moved) {

            $category->image = $fileName;

            //$productImage->featured = false;

            $category->save();
        }

        return redirect('/admin/categories');
    }


    public function edit(Category $category){
//otra manera de editar a la burro

        return view('admin.categories.edit')->with(compact('category'));
    }

    public function update(Request $request,Category $category){
    {
//dd($request->all());

        $this->validate($request, Category::$rules, Category::$messages);


        $category->update($request->only('name', 'description'));   //cambio masivo en update
        if ($request->hasFile('image'))

            $file = $request->file('image');
        $path = public_path() . '/images/categories';

        $fileName = uniqid() . $file->getClientOriginalName();
        $moved = $file->move($path, $fileName);

        if ($moved) {
            $previousPath = $path . '/'. $category->image;
            $category->image = $fileName;

            $saved= $category->save();

            if ($saved)
            File::delete($previousPath);
        }

    }

        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {


      //CartDetail::where('product_id', $id)->delete();
        Product::where('category_id', $category->id)->update(['category_id'=>null]);

        $category->delete();


        return back();
    }
}
