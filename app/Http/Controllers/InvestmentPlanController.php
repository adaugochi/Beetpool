<?php

namespace App\Http\Controllers;

use App\InvestmentPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvestmentPlanController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $plans = InvestmentPlan::all();
        return view('admin.investment-plan.index', compact('plans'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'name' => 'required',
            'roi' => 'required'
        ]);

        $plan = InvestmentPlan::find($request->id);
        $plan = !$plan ? new InvestmentPlan() : $plan;

        $plan->name = ucwords($request->name);
        $plan->key = Str::slug($request->name, '-');
        $plan->amount = $request->amount;
        $plan->roi = $request->roi;

        if (!$plan->save()) {
            return redirect()->back()->with(['error' => 'Could not save this investment plan']);
        }
        return redirect()->back()->with(['success' => 'Investment Plan saved successfully']);
    }
}
