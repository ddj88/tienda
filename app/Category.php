<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

public static $messages=[

'name.required'=> 'Hace falta un nombre',
'name.min'=>'El nombre debe tener minimo 3 caracteres',
'description.required'=>'Hace falta una descripcion',
'description.max'=>'Maximo 230 caracteres en la descripcion',



];

public static $rules=[
'name'=>'required|min:3',
'description'=>'required|max:230',

];


    protected $fillable = ['name','description'];


    public function products(){



        return $this->hasMany(Product::class);
    }


    public function getFeaturedImageUrlAttribute(){

        if ($this->image)
                return '/images/categories/'.$this->image;

        $FirstProduct = $this->products()->first();
        if ($FirstProduct)

        return $FirstProduct->featured_image_url;


        return '/images/default.jpg';
    }
}
