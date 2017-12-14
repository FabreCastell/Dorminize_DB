<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Room;
class ClientRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->paginate(10);
        return view('clientRooms.index',compact('rooms'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('clientRooms.show',compact('room'));
    }

}