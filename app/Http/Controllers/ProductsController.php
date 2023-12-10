<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mockery\Exception;
use App\Jobs\SetProductNames;

class ProductsController extends Controller
{

   public function index(){
       $products = Product::all();
       return view('product',['products'=>$products]);
   }

    public function showProduct($id){
        $product = Product::with('category','productPhoto')->find($id);
        $relatedProducts = Product::where('cat_id',$product->cat_id)->where('id','!=',$product->id)->inRandomOrder()->take(3)->get();
        return view('Products.showproduct',['product'=>$product ,'relatedProducts'=>$relatedProducts ]);
    }

   public function GetProducts($cat_id = null){
       if ($cat_id){
           $result = Product::where('cat_id',$cat_id)->paginate(10);
           return view('product',['products'=>$result]);
       }else{

           $all = Product::paginate(12);
           return view('product',['products'=>$all]);
       }
   }

   public function AddProduct(){
       $AllCategories = Category::all();
return view('Products.addproduct' , ['categories'=>$AllCategories]);
   }


   public function setter(){
       Product::query()->update(['description' => 'ProductAfterQueue']);

//       \DB::table('products')->update(['description' => 'ProductAfterQueue']);
//
//       $products = Product::all();
//       foreach ($products as $product){
//           $product->update(['description' => 'ProductAfterQueue']);
//       }
//
//       $products = Product::all();
//       foreach ($products as $product){
//           $product->description = 'ProductAfterQueue';
//           $product->save();
//       }
//       SetProductNames::dispatch('ProductAfterQueue');
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

public function newestProducts(){
       $newest = Product::newest()->get();

    return view ('products.ProductTable' ,['products'=>$newest]);

}

}
