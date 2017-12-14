<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Dorm;
class WebController extends Controller
{
    public function expense($id)
    {
        // $dorms = Dorm::findOrFail($id);
        // $dorms_expenses = $dorms->expense;
        // $bills = $dorms->collect;

        $dorm = DB::table('dorms')
                ->join('bills', 'dorms.id', '=', 'bills.dorm_id')
                ->join('dorm_expenses', 'dorms.id', '=', 'dorm_expenses.dorm_id')
                ->select('dorms.*','dorm_expenses.*','bills.*',DB::RAW('MONTHNAME(dorm_expenses.date) AS month'),DB::RAW('YEAR(dorm_expenses.date) AS year'))
                ->where(DB::RAW('MONTH(dorm_expenses.date)'), '=', DB::RAW('MONTH(bills.date)'))
                ->where(DB::RAW('YEAR(dorm_expenses.date)'), '=', DB::RAW('YEAR(bills.date)'))
                // ->whereMonth('bdate', '=' ,'ddate')
                // ->whereYear('bdate', '=' ,'ddate')
                ->get();
        dd($dorm);
        return view('webs.expense',compact('dorm'));   //should export 2 
    }

    public function expensepmonth($id,$monthid)
    {
        // $dorms = Dorm::findOrFail($id);
        // $dorms_expenses = $dorms->expense;
        // $bills = $dorms->collect;

        $dorm = DB::table('dorms')
                ->join('bills', 'dorms.id', '=', 'bills.dorm_id')
                ->join('dorm_expenses', 'dorms.id', '=', 'dorm_expenses.dorm_id')
                ->select('dorms.*','dorm_expenses.*','bills.*',DB::RAW('MONTHNAME(dorm_expenses.date) AS month'),DB::RAW('YEAR(dorm_expenses.date) AS year'))
                ->where(DB::RAW('MONTH(dorm_expenses.date)'), '=', $monthid)
                ->where('dorms.id', '=', $id)
                ->where(DB::RAW('MONTH(dorm_expenses.date)'), '=', DB::RAW('MONTH(bills.date)'))
                ->where(DB::RAW('YEAR(dorm_expenses.date)'), '=', DB::RAW('YEAR(bills.date)'))
                // ->whereMonth('bdate', '=' ,'ddate')
                // ->whereYear('bdate', '=' ,'ddate')
                ->get();
        // dd($dorm)
        return view('webs.expense',compact('dorm'));   //should export 2 
    }
    
}

// select (elec_unit_cost * elec_unit)as elec_income, (water_unit_cost * water_unit)as water_income, (elec_income+water_income-water_cost-elec_cost)
// from dorms, bills, dorm_expenses
// where dorm.id = bill.dorm_id, dorm.id = dorm_expenses, MONTH(bills.date)=MONTH(dorm_expenses.datetime), YEAR(bills.date)=YEAR(dorm_expenses.datetime);