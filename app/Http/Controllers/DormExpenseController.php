<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DormExpense;
use App\Dorm;
class DormExpenseController extends Controller
{
    public function index()
    {
        $dormExpenses = DormExpense::latest()->paginate(10);
        return view('dormExpenses.index',compact('dormExpenses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dorm = Dorm::pluck('id')->toArray();

        $dorms = array_combine($dorm, $dorm);
        return view('dormExpenses.create' ,  ['dorms' => $dorms]);
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
            'date' => 'required',
            'water_cost' => 'required',
            'elec_cost' => 'required',
            
        ]);
        $dorm = Dorm::findOrFail($request->input('dorm_id'));
            
        $newDormExpense = DormExpense::create($request->all());
        $newDormExpense->dorm()->associate($dorm);

        $newDormExpense->save();
        
        return redirect()->route('dormExpenses.index')
                        ->with('success','DormExpense created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DormExpense $dormExpense)
    {
        return view('dormExpenses.show',compact('dormExpense'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DormExpense $dormExpense)
    {
        $dorm = Dorm::pluck('id')->toArray();
        $dorms = array_combine($dorm, $dorm);

        return view('dormExpenses.edit',compact('dormExpense'), ['dorms' => $dorms]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DormExpense $dormExpense)
    {
        request()->validate([
            'date' => 'required',
            'water_cost' => 'required',
            'elec_cost' => 'required',
        ]);

        $dormExpense->update($request->all());
        
        return redirect()->route('dormExpenses.index')
                        ->with('success','DormExpense updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DormExpense::destroy($id);
        return redirect()->route('dormExpenses.index')
                        ->with('success','DormExpense deleted successfully');
    }
}