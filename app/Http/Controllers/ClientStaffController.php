<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Staff;
class ClientStaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::latest()->paginate(10);
        return view('clientStaffs.index',compact('staffs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $ssn
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return view('staffs.show',compact('staff'));
    }
}