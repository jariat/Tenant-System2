<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $total_houses = DB::select('SELECT count(name) no_houses  FROM houses');
        $total_tenants = DB::select('SELECT count(national_id) no_tenants  FROM tenants');
        $total_payments = DB::select("SELECT sum(paid_amount) as paid FROM payments where date(payment_date) = '".date('Y-m-d')."' ");
        return view('dashboard.index',compact('total_tenants','total_houses','total_payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Payment $tenants)
    {
        //
        $payments = Payment::latest()->paginate('5');
        $tenants = ['online_payment','drop-off-location','property_management_company','collection_in_person'];
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Payment $tenants)
    {
        //
        $payments = Payment::latest()->paginate('5');
        $tenants = ['online_payment','drop-off-location','property_management_company','collection_in_person'];
        $request->validate([
            'tenant_id' => 'required',
            'invoice' => 'required',
            'payment_date' => 'required',
            'mode_of_payment' => 'required',
            'paid_amount' => 'required',
            'received_by' => 'required'
        ]);
  
        Payment::create($request->all());
   
        return redirect()->route('payment.index')
                        ->with('success','Payment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show( )
    {
        //
        $payment = DB::select('select p.*, t.firstname from payments p left join tenants t on t.id=p.tenant_id');
        return view('payments.show',compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
        return view('payments.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
        $request->validate([
            'tenant_id' => 'required',
            'invoice' => 'required',
            'payment_date' => 'required',
            'mode_of_payment' => 'required',
            'paid_amount' => 'required',
            'received_by' => 'required'
        ]);
  
        $payment->update($request->all());
  
        return redirect()->route('payment.index')
                        ->with('success','Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
  
        return redirect()->route('tasks.index')
                        ->with('success','Task deleted successfully');
    }
}









