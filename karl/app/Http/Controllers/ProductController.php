<?php

namespace App\Http\Controllers;
use App\Mail\productmail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $product = new Product();
        $product->name = $req->name;
        $product->category = $req->category;
        $product->price = $req->price;
        $product->size = $req->size;
        $product->description = $req->description;
        $product->image = $req->image;
        Mail::to(env("MAIL_FROM_ADDRESS"))->send(new productmail([
            'subject'=>'your products',
            'title'=>'product post successful',
            'name' => $req->name,
            'content' => $req->description
        ]));
        if ($product->save()){
            return response()->json([
                'status'=>true,
                'message' =>'Product created successfully'
            ]);
        }
        Mail::to(env("MAIL_FROM_ADDRESS"))->send(new productmail([
            'subject'=>'your products',
            'title'=>'product post successful',
            'name' => $req->name,
            'content' => $req->description
        ]));

        return response()->json([
            'status'=>false,
            'message' =>'An error Ocurred'
        ]);

    }

    public  function getproductfordashboard(){
        $products = product::all();
        $users = User::all();
        return view('admin.admins.index', ['products'=>$products, 'users'=>$users]);
    }

    public  function getproducttable(){
        $products = product::all();
        $users = User::all();
        return view('admin.admins.tables', ['products'=>$products, 'users'=>$users]);
    }
    public  function getproduct(){
        $products = product::paginate(3);
        return response()->json([
            'status'=>true,
            'data'=>$products
        ]);
    }
    public function randomNumber(){
        $Randnumber = rand(2,50);
        $randpi = rad2deg(pi()/4);
        return response()->json([
            'status'=>True,
            'data'=>$Randnumber,
            'randpi'=>$randpi
        ]);
    }
}
