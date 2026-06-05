<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function produk(Request $request)
    {
        $query = \App\Models\Product::with('category');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->sort == 'termurah') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'termahal') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        $products = $query->paginate(6)->withQueryString();
        $categories = \App\Models\ProductCategory::all();

        return view('produk', compact('products', 'categories'));
    }
}
