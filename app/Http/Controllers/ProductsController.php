<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mockery\Exception;

class ProductsController extends Controller
{
   public function index(){
       $products = Product::all()->paginate(3);
       dd($products);
       return view('product',['products'=>$products]);
   }

   public function GetProducts($cat_id = null){
       if ($cat_id){
           $result = Product::where('cat_id',$cat_id)->paginate(10);
           return view('product',['products'=>$result]);
       }else{

           $all = Product::paginate(3);
           return view('product',['products'=>$all]);
       }
   }

   public function AddProduct(){
       $AllCategories = Category::all();
return view('Products.addproduct' , ['categories'=>$AllCategories]);
   }



public function storeproduct(AddProductRequest $request)
{
    try {
       $product =  Product::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'description' => $request['description'],
            'quantity' => $request['quantity'],
            'cat_id' => $request['cat_id'],

        ]);

    if ($request->has('photo')){
        $filename=  Str::uuid()->toString().'-'.$request->photo->getClientOriginalExtension();
       $imagePath =  $request['photo']->move('uploads',$filename);
       $product->update([
           'imagepath' => $imagePath]);
    }


        return redirect('/addproduct');
    } catch (\Exception $exception) {
        return "Error with" . $exception;
    }
}

public function RemoveProduct($id)
{
    try {
        $product = Product::find($id)->delete();
        return redirect('/');
    } catch (\Exception $exception) {
        return "Error with" . $exception;

    }
}
public function edit($id){
    $product = Product::find($id);
    $categories = Category::all();
       return view('Products.Editproduct',['product'=>$product , 'categories'=>$categories]);
}


    public Function EditProduct($id , Request $request){
        try {
            $product= Product::find($id);
            $product->update([
                'name'=>$request['name'],
                'price'=>$request['price'],
                'quantity'=>$request['quantity'],
                'description'=>$request['description'],
                'cat_id'=>$request['cat_id'],
            ]);
            if ($request->has('photo')){
                $fileName = Str::uuid() .'-'.$request->photo->getClientOriginalExtension();
                $imagePath = $request->photo->move('uploads',$fileName);
                $product->update([
                   'imagepath'=>$imagePath
                ]);
            }
            return redirect('/');
        }catch (Exception $exception){
            return response()->json(['error' => [$exception->getMessage()]]);
        }
    }

public function Search(Request $request){
       $products = Product::where('name','like','%' . $request->searchkey .'%')->get();
    return view('product',['products'=>$products]);
}

public function ProductTable(){
       $all = Product::all();
       return view ('products.ProductTable' ,['products'=>$all]);


}

}
