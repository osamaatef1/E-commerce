<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
public function index(){
        $category = Category::all();
        return view('welcome',['category'=> $category]);
}

public function FilterProducts(){
    $product= Product::all();
    $categories = Category::all();
    return view('category',['products'=>$product , 'categories' => $categories]);
}
}
