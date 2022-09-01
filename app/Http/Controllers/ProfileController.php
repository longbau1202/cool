<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user();
        return view('profiles.index',compact(('profile')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = Auth::user();
        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $profile = User::findOrFail(Auth::user()->id);

        if ($request->has('avatar')) {
            $image = $request->file('avatar')->storeAs(
                'uploads/profiles',
                uniqid() . $request->avatar->getClientOriginalName()
            );
            $image = str_replace('uploads/profiles/','',$image);
        }else {
            $image = $profile->avatar;
        }

        $params = $request->all();
        $params['avatar'] = $image;
        $update = $profile->fill($params)->save();
        return redirect()->route('profile');
    }
}
