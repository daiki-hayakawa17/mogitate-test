<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    

    public function index()
    {
        $season = Season::find(1);

        $season->products()->attach([2,7,10]);

        $season = Season::find(2);

        $season->products()->attach([4,5,6,7,8,9,10]);

        $season = Season::find(3);

        $season->products()->attach([1,6,8]);

        $season = Season::find(4);

        $season->products()->attach([1,3]);


        $products = Product::with('seasons')->paginate(6);
        $seasons = Season::all();

        return view('index', compact('products', 'seasons'));
    }

    public function search(Request $request)
    {
        $products = Product::with('seasons')->KeywordSearch($request->keyword)->paginate(6);
        $seasons = Season::all();

        
        // dd($products);

        return view('index',compact('products', 'seasons'));
    }

    public function detail($id)
    {
        $product = Product::find($id);
        $seasons = Season::all();

        return view('detail', compact('product','seasons'));

    }

    public function update(ProductRequest $request)
    {
            $product = $request->only('name', 'price', 'image', 'season_name', 'description');
            Product::find($request->id)->update($product);

            // dd($product);

            return redirect('/products');   
    }

    public function register()
    {
        $seasons = Season::all();


        return view('register', compact('seasons'));
    }

    public function store(ProductRequest $request, Product $product)
    {
        $product ->fill($request->all());

        $product_image = $request->file('image');

        if($product_image) {
            $path = Storage::disk('public')->putFile('fruits-img', $product_image);

            $productFileName = basename($path);

            $product->image = $productFileName;
        }else {
            $path = null;
        }

        
        $product->save();

        //dd($product_image);
       
        return redirect('/products');
    }

    public function delete(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect('/products');
    }
}
