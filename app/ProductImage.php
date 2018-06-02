<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductImage extends Model
{
   public function product(){

       return $this->belongsTo(Product::class);
   }




   public function getUrlAttribute(){   //controla que la imagen se cargue desde una web o sea un archivo local


       if (substr($this->image,0,4)==='http'){


           return $this->image;
       }

            return '/images/products/' . $this->image;
   }
}
