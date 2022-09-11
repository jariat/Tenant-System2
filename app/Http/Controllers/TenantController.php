<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Post;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        //
        $tenantsx = Tenant::latest('firstname')->simplepaginate(6);
        $tenants = DB::select('select t.*, h.name, h.monthly_amount from tenants t left join houses h on h.id=t.house_id');
  
        return view('tenants.home',compact('tenants','tenantsx'))
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
        $houses = House::all();
        return view('tenants.create',compact('houses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  $users = new Tenant;
        $users = DB::select("select id, name from houses where name= '$request->house_id'");

        $user = 1;
        //
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'gender' => 'required',
            'national_id' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'registration_date' => 'required',
            'exit_date' => 'required',
            'status' => 'required',
            'number_of_household' => 'required'
        ]);
       // Tenant::create($request->all());
        Tenant::create([

            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'gender' => $request->gender,
            'national_id' => $request->national_id,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'registration_date' => $request->registration_date,
            'exit_date' => $request->exit_date,
            'status' => $request->status,
            'number_of_household' => $request->number_of_household,
            'house_id' => $request->house_id

        ]);
        Tenant::create($request->all());
   
        return redirect()->route('tenant.index')
                        ->with('success','Tenant created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
        $tenants = DB::select("select t.*, h.name from tenants t left join houses h on t.house_id=h.id");
        return view('tenants.show',compact('tenant','tenants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
        $houses = House::all();
        return view('tenants.edit',compact('tenant','houses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'gender' => 'required',
            'national_id' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'registration_date' => 'required',
            'exit_date' => 'required',
            'house_id' => 'required',
            'status' => 'required',
            'number_of_household' => 'required'
        ]);
  
        $tenant->update($request->all());
  
        return redirect()->route('tenant.index')
                        ->with('success','Tenant updated successfully');
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
