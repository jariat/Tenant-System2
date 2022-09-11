<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contracts = Contract::latest()->paginate('5');
  
        return view('contracts.index',compact('contracts'))
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
        return view('contracts.create');
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
            'length' => 'required',
            'mode_of_payment' => 'required',
            'monthly_payment' => 'required',
            'penalities' => 'required',
            'status' => 'required',
            'signature' => 'required',
            'name' => 'required',
        ]);
  
        Contract::create($request->all());
   
        return redirect()->route('contract.index')
                        ->with('success','Contract created successfully.');
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
