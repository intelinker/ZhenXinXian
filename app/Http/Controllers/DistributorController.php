<?php

namespace App\Http\Controllers;

use App\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('distributor.index', ['distributors' => Distributor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distributor.create');
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
        $path = $this->uploadFile($avatar, "distributor");
        Distributor::create(array_merge($request->except('avatar', '_token'), ['avatar'=>$path]));

        return view('distributor.index', ['distributors' => Distributor::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor)
    {
        return view('distributor.edit', ['distributor' => $distributor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor)
    {
        $avatar = $request['avatar'];
        if ($avatar != null) {
            $path = $this->uploadFile($avatar, "distributor");
            $update = $distributor->update(array_merge($request->except('avatar'), ['avatar'=>$path]));
        } else {
            $update = $distributor->update($request->except('avatar'));
        }
        return view('distributor.index', ['distributors' => Distributor::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return view('distributor.index', ['distributors' => Distributor::all()]);
    }

    public function setVisible($distributorid, $visible) {
        $distributor = Distributor::findorFail($distributorid);
        $distributor->update(['visible'=>$visible]);
    }
}
