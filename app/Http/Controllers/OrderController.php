<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Contract;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::latest()->paginate('5');
        $order_id = DB::select("select id from rental_orders");
        $tenants = DB::select("select  r.id , CONCAT(t.lastname, ' ', t.firstname, ' ', t.middlename) AS tenantname from rental_orders r left join tenants t on t.id=r.tenant_id");
        $houses = DB::select("select name as housename from rental_orders r left join houses h on h.id=r.house_id");
        $contracts = DB::select("select name as contractname from rental_orders r left join contracts c on c.id=r.contract_id");
        $users = DB::select("select name as username from users u left join rental_orders r on u.email=r.user_id");
        return view('orders.index',compact('orders','tenants','houses','contracts','users'))
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
        $users = User::all();
        $contracts = Contract::all();
        $houses = House::all();
        return view('orders.create',compact('tenants','users','contracts','houses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tenant_id' => 'required',
            'contract_id' => 'required',
            'house_id' => 'required',
            'user_id' => 'required'
        ]);
  
        Order::create($request->all());
   
        return redirect()->route('order.index')
                        ->with('success','Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
        return view('contracts.show',compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
        return view('contracts.edit',compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
        $request->validate([
            'length' => 'required',
            'mode_of_payment' => 'required',
            'monthly_payment' => 'required',
            'penalities' => 'required',
            'status' => 'required',
            'signature' => 'required'
        ]);
  
        $contract->update($request->all());
  
        return redirect()->route('contract.index')
                        ->with('success','Contract updated successfully');
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
