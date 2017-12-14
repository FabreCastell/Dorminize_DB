<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\RoomType;
class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::latest()->paginate(10);
        return view('roomTypes.index',compact('roomTypes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomTypes.create');
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
            'size' => 'required',
            'deposit' => 'required',
            'rental_price' => 'required',
            'pic_dest' => 'required',
        ]);
        
        RoomType::create($request->all());
        
        return redirect()->route('roomTypes.index')
                        ->with('success','RoomType created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        return view('roomTypes.show',compact('roomType'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomType)
    {
        return view('roomTypes.edit',compact('roomType'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RoomType $roomType)
    {
        request()->validate([
            'name' => 'required',
            'size' => 'required',
            'deposit' => 'required',
            'rental_price' => 'required',
            'pic_dest' => 'required',
        ]);
        $roomType->update($request->all());
        return redirect()->route('roomTypes.index')
                        ->with('success','RoomType updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomType::destroy($id);
        return redirect()->route('roomTypes.index')
                        ->with('success','RoomType deleted successfully');
    }
}