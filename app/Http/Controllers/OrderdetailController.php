<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class OrderdetailController extends Controller
{
    public function index()
    {
        $profile = Auth::user();
        return view('order.index',compact('profile'));
    }

    public function getOrders()
    {
        return DataTables::of(Order::orderBy('code','desc')->get())
            ->setRowId(function ($row) {
                return $row->id;
            })

            //format số lượng chữ hiển thị
            ->editColumn('order_name', function ($row) {
                return strlen(($row->order_name)) > 30 ? substr($row->order_name, 0, 20) . "..." : $row->order_name;
            })
            ->editColumn('order_name', function ($row) {
                $link = route('order.show', ['id' => $row->id]);
                return "<a href='$link'>$row->order_name</a>";
            })
            ->editColumn('grand_total', function ($row) {
                return "".number_format(($row->grand_total),2)."$";
            })
            ->rawColumns(['grand_total','order_name'])
            ->make(true);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        if (!$order) {
            return redirect()->back();
        }
        $orderDetail = OrderDetail::where('orderId', $id)->get();
        return view('order.detail', compact('order', 'orderDetail'));
    }

}
