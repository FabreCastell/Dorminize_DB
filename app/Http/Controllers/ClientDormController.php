<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Dorm;
class ClientDormController extends Controller
{
    public function index()
    {
        $dorms = Dorm::latest()->paginate(10);
        return view('clientDorms.app',compact('dorms'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
}