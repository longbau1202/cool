<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlideFormRequest;
use App\Models\Slide;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('slideshow.index');
    }

    public function getMakers()
    {
        return DataTables::of(Slide::orderBy('slideTitle','desc')->get())
            ->setRowId(function ($row) {
                return $row->id;
            })

            //format số lượng chữ hiển thị
            ->editColumn('slideTitle', function ($row) {
                return strlen(($row->slideTitle)) > 30 ? substr($row->slideTitle, 0, 20) . "..." : $row->slideTitle;
            })
            ->editColumn('slideImage', function ($row) {
                return "<img src=\" " . asset("storage/uploads/slides/$row->slideImage") . "\"  alt=\"contact-img\" title=\"contact-img\" class=\"rounded mr-3\" height=\"48\" />";
            })
            ->editColumn('slideTitle', function ($row) {
                $link = route('slide.show', ['id' => $row->id]);
                return "<a href='$link'>$row->slideTitle</a>";
            })
            ->rawColumns(['slideImage','slideTitle'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slideshow.create');
    }

    public function store(SlideFormRequest $request)
    {
        if ($request->has('slideImage')) {
            $image = $request->file('slideImage')->storeAs(
                'uploads/slides',
                uniqid() . $request->slideImage->getClientOriginalName()
            );
            $image = str_replace('uploads/slides/','',$image);
        }else {
            $image = null;
        }

        $params = $request->all();
        $params['slideImage'] = $image;
        $slide = new Slide();
        $create = $slide->create($params);
        return redirect()->route('slide');
    }

    public function show($id)
    {
        $maker = Slide::findOrFail($id);
        return view('makers.show', compact('maker'));
    }

    public function edit($id)
    {
        $maker = Slide::findOrFail($id);
        return view('makers.edit', compact('maker'));
    }

    public function update(SlideFormRequest $request, $id)
    {
        $maker = Slide::findOrFail($id);

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
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        //
    }
}
