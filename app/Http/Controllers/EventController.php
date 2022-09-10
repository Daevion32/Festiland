<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModel;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventsPast = EventModel::whereDate('date', '<=', now())->Paginate(4);
        $eventsFut = EventModel::whereDate('date', '>=', now())->Paginate(4);
        return view('home', compact('eventsPast', 'eventsFut'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createEvent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = request()->except('_token');
/*         $event = EventModel::create([
            'name' => $request -> name,
            'description' => $request -> description,
            'image' => $request -> image,
            'spaces'=>$request -> spaces,
            'location' => $request -> location, 
            'date' => $request -> date,
        ]) */
        EventModel::create($event);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = EventModel::find($id); 
        return view('showEvent', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = EventModel::find($id); 
        return view('editEvent', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = request()->except(['_token', '_method']);
        EventModel::where('id', '=', $id)->update($event);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
