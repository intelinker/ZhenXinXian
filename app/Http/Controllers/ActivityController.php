<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Commodity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('activity.index', ['activities' => Activity::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activity.create', ['commodities' => Commodity::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request['check_1']);
        $avatar = $request['avatar'];
        $path = $this->uploadFile($avatar, "activity");
        $commodityIDs = "";
        $commodities = Commodity::all();
        $lastID = $commodities[count($commodities)-1]->id;
        echo $lastID;
        for($i=1; $i <=$lastID; $i++) {
            $check = $request['check_'.$i];
            if ($check != null) {
                echo $check;
                if (strlen($commodityIDs) == 0)
                    $commodityIDs = $check;
                else
                    $commodityIDs = $commodityIDs.",".$check;
            }
        }

//        dd($commodityIDs);
        Activity::create(array_merge($request->except('avatar', '_token'), ['avatar'=>$path, 'commodity_ids'=>$commodityIDs]));

        return view('activity.index', ['activities' => Activity::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $commodity_ids = explode(",", $activity->commodity_ids);
        return view('activity.edit', ['activity' => $activity, 'commodities'=>Commodity::all(), 'commodity_ids'=>$commodity_ids]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return view('activity.index', ['activities' => Activity::all()]);
    }

    public function setStatus($activityid, $status) {
        $activity = Activity::findorFail($activityid);
        $activity->update(['status'=>$status]);
    }
}
