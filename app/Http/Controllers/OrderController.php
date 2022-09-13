<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $maker = Product::with('makers')->find($id);
        $quantity = $request->qty;
        $data['id'] = $product->id;
        $data['qty'] = $quantity;
        $data['name'] = $product->productName;
        $data['price'] = $product->productPrice;
        $data['weight'] = $product->productPrice;
        $data['options']['image'] = $product->productImage;
        $data['options']['maker'] = $maker['makers']->makerName;

        Cart::add($data);

        return redirect()->route('member.cart.show');

    }

    public function show()
    {
        $makers = Brand::get();
        $auth = Auth::user();
        return view('member.cart.index', compact('makers', 'auth'));
    }
    public function delete($id)
    {
        Cart::update($id,0);
        return redirect()->route('member.cart.show');
    }
    public function update(Request $request, $id)
    {
        $qty = $request->quantity;
        Cart::update($id,$qty);
        return redirect()->route('member.cart.show');
    }

    public function pay() {
        $makers = Brand::get();
        $auth = Auth::user();
        $content = Cart::content()->count();
        //dd($content);
        if ($content > 0) {
            return view('member.cart.detail', compact('makers', 'auth'));
        } else {
            return redirect()->back();
        }
    }

    public function saveCheckout(Request $request)
    {
        $model = new Order();

        if (isset(Auth::user()->id)) {
            $model->user_id = Auth::user()->id;
        }
        $model->shipping_address = $request->address;
        $model->phone_number = $request->phone_number;
        $model->email = $request->email;
        $model->order_name = $request->order_name;
        $model->grand_total = $request->grand_total;
        $model->code = date('dmY-His');
        $model->save();

        $id_order = $model->id;
        $content = Cart::content();
        // dd($content, $request);

        foreach ($content as $key => $value) {
            $orderDetail = new Orderdetail();

            $orderDetail->orderId = $id_order;
            $orderDetail->note = $request->note;
            $orderDetail->productId = $value->id;
            $orderDetail->priceTotal = $value->priceTotal;
            $orderDetail->quantity = $value->qty;
            $orderDetail->save();
        }


        foreach ($content as $key => $value) {
            Cart::update($value->rowId, 0);
        }
        return redirect()->route('member.cart.show')->with('success', "Đặt hàng thành công!");
    }

}
