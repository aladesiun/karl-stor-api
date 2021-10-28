<?php

namespace App\Http\Controllers;
use app\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public  function createproduct(Request  $req){
        $this->validate($req,([
            'name'=>['required'],
            'category'=>['required'],
            'price'=>['required'],
            'size'=>['required'],
            'description'=>['required'],
            'image'=>['required'],

        ]));
        $product = new product();
        $product->name = $req->name;
        $product->category = $req->category;
        $product->price = $req->price;
        $product->size = $req->size;
        $product->description = $req->description;
        $product->image = $req->image;
        if ($product->save()){
            return response()->json([
                status=>true,
                message =>'Product created successfully'
            ]);
        }
        return response()->json([
            status=>false,
            message =>'An error Ocurred'
        ]);

    }
}
