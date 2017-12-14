<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Owner;
class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::latest()->paginate(10);
        return view('owners.index',compact('owners'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.create');
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
            'ssn' => 'required',
            
        ]);
        
        Owner::create($request->all());
        
        return redirect()->route('owners.index')
                        ->with('success','Owner created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $ssn
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view('owners.show',compact('owner'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $ssn
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owners.edit',compact('owner'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $ssn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Owner $owner)
    {
        request()->validate([
            'name' => 'required',
            'ssn' => 'required',
            
        ]);
        $owner->update($request->all());
        return redirect()->route('owners.index')
                        ->with('success','Owner updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $ssn
     * @return \Illuminate\Http\Response
     */
    public function destroy($ssn)
    {
        Owner::destroy($ssn);
        return redirect()->route('owners.index')
                        ->with('success','Owner deleted successfully');
    }
}