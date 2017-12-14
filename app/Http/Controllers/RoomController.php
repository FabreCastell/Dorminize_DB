<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Room;
use App\RoomType;
use App\Dorm;
class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->paginate(10);
        return view('rooms.index',compact('rooms'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomType = RoomType::pluck('id')->toArray();
        $dorm = Dorm::pluck('id')->toArray();

        $roomTypes = array_combine($roomType, $roomType);
        $dorms = array_combine($dorm, $dorm);

        return view('rooms.create',  ['roomTypes' => $roomTypes, 'dorms' => $dorms]);
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
            'number' => 'required',
            'status' => 'required',
            'checkin_date' => 'required',
            
        ]);
        
        $dorm = Dorm::findOrFail($request->input('dorm_id'));
        $roomType = RoomType::findOrFail($request->input('type_id'));

        $newRoom = Room::create($request->all());
        $newRoom->dorm()->associate($dorm);
        $newRoom->type()->associate($roomType);
        
        $newRoom->save();

        return redirect()->route('rooms.index')
                        ->with('success','Room created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show',compact('room'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $roomtype = RoomType::all();
        return view('rooms.edit',compact('room'),compact('roomtype'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Room $room)
    {
        request()->validate([
            'number' => 'required',
            'status' => 'required',
            'checkin_date' => 'required',
            
        ]);
        $room->update($request->all());
        return redirect()->route('rooms.index')
                        ->with('success','Room updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ssn)
    {
        Room::destroy($ssn);
        return redirect()->route('rooms.index')
                        ->with('success','Room deleted successfully');
    }
}