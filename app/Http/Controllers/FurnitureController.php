<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Furniture;
use App\Room;
use App\Dorm;
class FurnitureController extends Controller
{
    //
    public function index()
    {
        $furnitures = Furniture::latest()->paginate(10);
        return view('furnitures.index',compact('furnitures'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room = Room::pluck('id')->toArray();
        $dorm = Dorm::pluck('id')->toArray();

        $rooms = array_combine($room, $room);
        $dorms = array_combine($dorm, $dorm);
        return view('furnitures.create', ['rooms' => $rooms, 'dorms' => $dorms]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'cost' => 'required',
            'buy_date' => 'required',
            'change_date' => 'required',
            'dorm_id' => 'required',
            'room_id' => 'required',
        ]);
        
        $dorm = Dorm::findOrFail($request->input('dorm_id'));
        $room = Room::findOrFail($request->input('room_id'));

        $newFurniture = Furniture::create($request->all());
        $newFurniture->dorm()->associate($dorm);
        $newFurniture->room()->associate($room);
        
        $newFurniture->save();

        return redirect()->route('furnitures.index')
                        ->with('success','Furniture created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Furniture $furniture)
    {
        $room = Room::pluck('id')->toArray();
        $dorm = Dorm::pluck('id')->toArray();

        $rooms = array_combine($room, $room);
        $dorms = array_combine($dorm, $dorm);

        return view('furnitures.show',compact('furniture'),  ['rooms' => $rooms, 'dorms' => $dorms]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Furniture $furniture)
    {
        $room = Room::pluck('id')->toArray();
        $dorm = Dorm::pluck('id')->toArray();

        $rooms = array_combine($room, $room);
        $dorms = array_combine($dorm, $dorm);

        return view('furnitures.edit',compact('furniture'),  ['rooms' => $rooms, 'dorms' => $dorms]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Furniture $furniture)
    {
        request()->validate([
            
            'description' => 'required',
            'change_date' => 'required',
            'dorm_id' => 'required',
            'room_id' => 'required',
        ]);
        
        $furniture->update($request->all());
        return redirect()->route('furnitures.index')
                        ->with('success','Furniture updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Furniture::destroy($id);
        return redirect()->route('furnitures.index')
                        ->with('success','Furniture deleted successfully');
    }
}
