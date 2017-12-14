<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Bill;
use App\Room;
use App\Dorm;
use App\Client;
class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::latest()->paginate(10);
        return view('bills.index',compact('bills'))
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
        $client = Client::pluck('ssn')->toArray();

        $rooms = array_combine($room, $room);
        $dorms = array_combine($dorm, $dorm);
        $clients = array_combine($client, $client);

        return view('bills.create',['rooms' => $rooms, 'dorms' => $dorms , 'clients' => $clients]);
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
            'elec_unit' => 'required',
            'water_unit' => 'required',
            'date' => 'required',
            'dorm_id' => 'required',
            'room_id' => 'required',
            'ssn' => 'required',
            'status' => 'required',
        ]);

        $dorm = Dorm::findOrFail($request->input('dorm_id'));
        $room = Room::findOrFail($request->input('room_id'));
        $client = Client::findOrFail($request->input('ssn'));

        $newBill = Bill::create($request->all());

        $newBill->dorm()->associate($dorm);
        $newBill->room()->associate($room);
        $newBill->client()->associate($client);
        
        $newBill->save();

        return redirect()->route('bills.index')
                        ->with('success','Bill created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $invoice_number
     * @return \Illuminate\Http\Response
     */
    public function show(bill $bill)
    {
        return view('bills.show',compact('bill'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $invoice_number
     * @return \Illuminate\Http\Response
     */
    public function edit(bill $bill)
    {
        $room = Room::pluck('id')->toArray();
        $dorm = Dorm::pluck('id')->toArray();
        $client = Client::pluck('ssn')->toArray();

        $rooms = array_combine($room, $room);
        $dorms = array_combine($dorm, $dorm);
        $clients = array_combine($client, $client);

        return view('bills.edit',compact('bill') , ['rooms' => $rooms, 'dorms' => $dorms , 'clients' => $clients]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $invoice_number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Bill $bill)
    {
        request()->validate([
            'elec_unit' => 'required',
            'water_unit' => 'required',
            'date' => 'required',
            'dorm_id' => 'required',
            'room_id' => 'required',
            'ssn' => 'required',
            'status' => 'required',
        ]);
        $bill->update($request->all());
        return redirect()->route('bills.index')
                        ->with('success','Bill updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $invoice_number
     * @return \Illuminate\Http\Response
     */
    public function destroy($invoice_number)
    {
        Bill::destroy($invoice_number);
        return redirect()->route('bills.index')
                        ->with('success','Bill deleted successfully');
    }
}