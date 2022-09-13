<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $profile = Auth::user();
        return view('product.product',compact('profile'));
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
    public function store(ProductFormRequest $request)
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
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $maker = Product::with('makers')->find($id);
        return view('product.detail', compact('product','maker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $makers = Brand::all();
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product','makers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->has('productImage')) {
            $image = $request->file('productImage')->storeAs(
                'uploads/products',
                uniqid() . $request->productImage->getClientOriginalName()
            );
            $image = str_replace('uploads/products/','',$image);
        }else {
            $image = $product->productImage;
        }

        $params = $request->all();
        $params['productImage'] = $image;
        $update = $product->fill($params)->save();
        return redirect()->route('show',['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product');
    }
}
