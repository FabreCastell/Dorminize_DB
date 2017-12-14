<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Dorm;
use App\Furniture;
use App\RoomType;
class DormController extends Controller
{
    public function index()
    {
        $dorms = Dorm::latest()->paginate(10);
        $furnitures = Furniture::latest()->paginate(10);
        $roomtypes = RoomType::latest()->paginate(10);
        return view('dorms.app', ['roomtypes' => $roomtypes, 'dorms' => $dorms, 'furnitures' => $furnitures])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dorms.create');
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
            'location' => 'required',
            'building_amt' => 'required',
            'room_amt' => 'required',
            'elec_unit_cost' => 'required',
            'water_unit_cost' => 'required',
            'description' => 'required',
            'rule' => 'required',
            'pic_dest' => 'required',
        ]);
        dorm::create($request->all());
        return redirect()->route('dorms.index')
                        ->with('success','Dorm created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(dorm $dorm)
    {
        return view('dorms.show',compact('dorm'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(dorm $dorm)
    {
        return view('dorms.edit',compact('dorm'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Dorm $dorm)
    {
        request()->validate([
            'name' => 'required',
            'location' => 'required',
            'building_amt' => 'required',
            'room_amt' => 'required',
            'elec_unit_cost' => 'required',
            'water_unit_cost' => 'required',
            'description' => 'required',
            'rule' => 'required',
            'pic_dest' => 'required',
        ]);
        $dorm->update($request->all());
        return redirect()->route('dorms.index')
                        ->with('success','Dorm updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dorm::destroy($id);
        return redirect()->route('dorms.index')
                        ->with('success','Dorm deleted successfully');
    }

}