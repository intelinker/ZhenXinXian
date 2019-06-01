<?php

namespace App\Http\Controllers;

use App\Commodity;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('commodity.index', ['commodities' => Commodity::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commodity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $avatar = $request['avatar'];
        $path = $this->uploadFile($avatar, "commodity");
        $commodity = Commodity::create(array_merge($request->except('avatar', '_token'), ['avatar'=>$path]));

        return view('commodity.index', ['commodities' => Commodity::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function show(Commodity $commodity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function edit(Commodity $commodity)
    {
        return view('commodity.edit', ['commodity' => $commodity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commodity $commodity)
    {
        $avatar = $request['avatar'];
        if ($avatar != null) {
            $path = $this->uploadFile($avatar, "commodity");
            $update = $commodity->update(array_merge($request->except('avatar'), ['avatar'=>$path]));
        } else {
            $update = $commodity->update($request->except('avatar'));
        }
        return view('commodity.index', ['commodities' => Commodity::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commodity $commodity)
    {
        $commodity->delete();
        return view('commodity.index', ['commodities' => Commodity::all()]);
    }
}
