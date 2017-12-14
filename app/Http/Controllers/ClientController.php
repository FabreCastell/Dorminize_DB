<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Client;
class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('clients.index',compact('clients'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'ssn' => 'required',
            'name' => 'required',
            'job' => 'required',
            'previous_address' => 'required',
        ]);
        Client::create($request->all());
        return redirect()->route('clients.index')
                        ->with('success','Client created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $ssn
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show',compact('client'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $ssn
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit',compact('client'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $ssn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Client $client)
    {
        request()->validate([
            'ssn' => 'required',
            'name' => 'required',
            'job' => 'required',
            'previous_address' => 'required',
        ]);
        $client->update($request->all());
        return redirect()->route('clients.index')
                        ->with('success','Client updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $ssn
     * @return \Illuminate\Http\Response
     */
    public function destroy($ssn)
    {
        Client::destroy($ssn);
        return redirect()->route('clients.index')
                        ->with('success','Client deleted successfully');
    }
}