<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Bill;
class ClientBillController extends Controller
{
    public function index()
    {
        $bills = Bill::latest()->paginate(10);
        return view('clientBills.index',compact('bills'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
}