<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $payments = DB::select("select p.*, CONCAT(t.lastname, ' ', t.firstname) AS firstname from payments p left join tenants t on t.id=p.tenant_id");
        $paymentsx = Payment::latest()->paginate('5');
        $tenantss = DB::select('select firstname from tenants');
  
        return view('payments.index',compact('paymentsx','payments','tenantss'))
            ->with('k', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tenants = Tenant::all();
        return view('payments.create',compact('tenants'));
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
    public function show(Payment $payment )
    {
        //
        $payments = DB::select("select p.*, CONCAT(t.lastname, ' ', t.firstname) AS firstname from payments p left join tenants t on t.id=p.tenant_id");
        return view('payments.show',compact('payments'));
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
