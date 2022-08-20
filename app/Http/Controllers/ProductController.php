<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
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
        return DataTables::of(Product::orderBy('productCode','desc')->get())
            ->setRowId(function ($row) {
                return $row->id;
            })

            //format số lượng chữ hiển thị
            ->editColumn('productName', function ($row) {
                return strlen(($row->productName)) > 30 ? substr($row->productName, 0, 20) . "..." : $row->productName;
            })
            ->editColumn('productImage', function ($row) {
                return "<img src=\" " . asset("storage/uploads/products/$row->productImage") . "\"  alt=\"contact-img\" title=\"contact-img\" class=\"rounded mr-3\" height=\"48\" />";
            })
            ->editColumn('productName', function ($row) {
                $link = route('show', ['id' => $row->id]);
                return "<a href='$link'>$row->productName</a>";
            })
            ->editColumn('productPrice', function ($row) {
                return "".number_format(($row->productPrice),2)."$";
            })
            ->editColumn('productQuantity', function ($row) {
                return number_format(($row->productQuantity));
            })
            ->rawColumns(['productImage','productName','productPrice'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makers = Brand::all();
        return view('product.add', compact('makers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('productImage')) {
            $image = $request->file('productImage')->storeAs(
                'uploads/products',
                uniqid() . $request->productImage->getClientOriginalName()
            );
            $image = str_replace('uploads/products/','',$image);
        }else {
            $image = null;
        }

        $params = $request->all();
        $params['productImage'] = $image;
        $product = new Product();
        $create = $product->create($params);
        return redirect()->route('product');
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
