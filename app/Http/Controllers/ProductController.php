<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('kategori');

        $products = Product::when($category, fn ($q) => $q->where('category', $category))
            ->orderBy('id')
            ->get();

        return view('products.index', compact('products', 'category'));
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $related = Product::where('id', '!=', $product->id)->take(3)->get();

        return view('products.show', compact('product', 'related'));
    }
}