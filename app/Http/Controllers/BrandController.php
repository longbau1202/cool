<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakerFormRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user();
        return view('makers.index',  compact('profile'));
    }

    public function getMakers()
    {
        return DataTables::of(Brand::orderBy('makerCode','desc')->get())
            ->setRowId(function ($row) {
                return $row->id;
            })

            //format số lượng chữ hiển thị
            ->editColumn('makerName', function ($row) {
                return strlen(($row->makerName)) > 30 ? substr($row->makerName, 0, 20) . "..." : $row->makerName;
            })
            ->editColumn('makerImage', function ($row) {
                return "<img src=\" " . asset("storage/uploads/makers/$row->makerImage") . "\"  alt=\"contact-img\" title=\"contact-img\" class=\"rounded mr-3\" height=\"48\" />";
            })
            ->editColumn('makerName', function ($row) {
                $link = route('maker.show', ['id' => $row->id]);
                return "<a href='$link'>$row->makerName</a>";
            })
            ->rawColumns(['makerImage','makerName'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakerFormRequest $request)
    {
        if ($request->has('makerImage')) {
            $image = $request->file('makerImage')->storeAs(
                'uploads/makers',
                uniqid() . $request->makerImage->getClientOriginalName()
            );
            $image = str_replace('uploads/makers/','',$image);
        }else {
            $image = null;
        }

        $params = $request->all();
        $params['makerImage'] = $image;
        $maker = new Brand();
        $create = $maker->create($params);
        return redirect()->route('maker');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maker = Brand::findOrFail($id);
        return view('makers.show', compact('maker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maker = Brand::findOrFail($id);
        return view('makers.edit', compact('maker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(MakerFormRequest $request, $id)
    {
        $maker = Brand::findOrFail($id);

        if ($request->has('makerImage')) {
            $image = $request->file('makerImage')->storeAs(
                'uploads/makers',
                uniqid() . $request->makerImage->getClientOriginalName()
            );
            $image = str_replace('uploads/makers/','',$image);
        }else {
            $image = $maker->makerImage;
        }

        $params = $request->all();
        $params['makerImage'] = $image;
        $update = $maker->fill($params)->save();
        return redirect()->route('maker.show',['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Brand::findOrFail($id);
        $item->delete();
        return redirect()->route('maker');
    }
}
