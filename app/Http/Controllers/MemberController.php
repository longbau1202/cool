<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index() {
        $products = Product::orderBy('updated_at', 'desc')->paginate(8);
        $slides = Slide::orderBy('created_at', 'desc')->paginate(2);
        $makers = Brand::get();
        $auth = Auth::user();
        return view('member.layout.index',compact('products', 'slides', 'makers', 'auth'));
    }

    public function product() {
        $makers = Brand::get();
        $auth = Auth::user();
        $products = Product::orderBy('updated_at', 'desc')->simplePaginate(12);
        return view('member.product.product', compact('products', 'makers', 'auth'));
    }

    public function detail($id) {
        $products = Product::findOrFail($id);
        $maker = Product::with('makers')->find($id);
        $makers = Brand::get();
        $auth = Auth::user();
        return view('member.product.detail', compact('products', 'makers', 'maker', 'auth'));
    }

    public function find(Request $request) {
        $products = Product::where('productBrand', $request->find)->simplePaginate(12);
        $makers = Brand::get();
        $auth = Auth::user();
        return view('member.product.product', compact('products', 'makers', 'auth'));
    }

    public function search(Request $request) {


        $search = $request->search;
        if (empty($search))
        {
            return;
        } else {
            $products = Product::where('id', 'LIKE', "%{$search}%")
                ->orWhere('productName', 'LIKE', "%{$search}%")
                ->orWhere('productDetail', 'LIKE', "%{$search}%")
                ->simplePaginate(12);
        }
        $makers = Brand::get();
        $auth = Auth::user();
        return view('member.product.product', compact('products', 'makers', 'auth'));
    }
}
