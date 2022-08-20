<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.product');
    }

    public function getProducts()
    {
        return DataTables::of($this->repo->getCode())
            ->setRowId(function ($row) {
                return $row->id;
            })

            //format số lượng chữ hiển thị
            ->editColumn('product_name', function ($row) {
                return strlen(($row->product_name)) > 30 ? substr($row->product_name, 0, 20) . "..." : $row->product_name;
            })
            ->editColumn('product_img', function ($row) {
                return "<img src=\" " . asset("images/$row->product_img") . "\"  alt=\"contact-img\" title=\"contact-img\" class=\"rounded mr-3\" height=\"48\" />";
            })
            ->editColumn('product_name', function ($row) {
                $link = route('products.show', ['id' => $row->id]);
                return "<a href='$link'>$row->product_name</a>";
            })
            ->editColumn('price', function ($row) {
                return "".number_format(($row->price),2)."$";
            })
            ->editColumn('quantity', function ($row) {
                return number_format(($row->quantity));
            })
            ->rawColumns(['product_img','product_name','price'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
