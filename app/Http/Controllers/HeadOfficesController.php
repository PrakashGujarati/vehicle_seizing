<?php

namespace App\Http\Controllers;

use App\HeadOffices;
use DataTables;
use Session;
use Illuminate\Http\Request;

class HeadOfficesController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headofficesdata= HeadOffices::all();
        return view('headoffices.table',compact('headofficesdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('headoffices.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
         $request->validate([
            'finance_company_name' => 'required', 
            'branch_code' => 'required',
            'branch_address' => 'required',
            'city' => 'required',
            'branch_contact' => 'required|numeric',
            'manager_contact' => 'required|numeric',
            'gst' => 'required',
            'assigned_manager' => 'required',
            'manage_email' => 'required|email',
            'branch_email' => 'required|email',

       ]
       );

        $add = new HeadOffices;
        $add->finance_company_name = $request->finance_company_name;
        $add->branch_code = $request->branch_code;
        $add->branch_address = $request->branch_address;
        $add->assigned_manager = $request->assigned_manager;
        $add->city = $request->city;
        $add->branch_contact = $request->branch_contact;
        $add->gst = $request->gst;
        $add->manage_email = $request->manage_email;
        $add->manager_contact = $request->manager_contact;
        $add->branch_email = $request->branch_email;

        $add->save();
        if($add)
        {
            return redirect()->route('finance-office.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\head_offices  $head_offices
     * @return \Illuminate\Http\Response
     */
    public function show(head_offices $head_offices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\head_offices  $head_offices
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $headofficeEdit = HeadOffices::find($id);
        return view('headoffices.edit',compact('headofficeEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\head_offices  $head_offices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'finance_company_name' => 'required', 
            'branch_code' => 'required',
            'branch_address' => 'required',
            'city' => 'required',
            'branch_contact' => 'required|numeric',
            'manager_contact' => 'required|numeric',
            'gst' => 'required',
            'assigned_manager' => 'required',
            'manage_email' => 'required|email',
            'branch_email' => 'required|email',

       ]
       );
        
        $add = HeadOffices::find($request->hidden_id);
         $add->finance_company_name = $request->finance_company_name;
        $add->branch_code = $request->branch_code;
        $add->branch_address = $request->branch_address;
        $add->assigned_manager = $request->assigned_manager;
        $add->city = $request->city;
        $add->branch_contact = $request->branch_contact;
        $add->gst = $request->gst;
        $add->manage_email = $request->manage_email;
        $add->manager_contact = $request->manager_contact;
        $add->branch_email = $request->branch_email;
        $add->save();
        if($add)
        {
            return redirect()->route('finance-office.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\head_offices  $head_offices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

       
        $data = HeadOffices::find($request->id)->delete();
       if($data)
       {
            $success = "Finance Office Deleted successfully";
            $data=['success'=>$success];
            return Response()->json($data);
       }
            
    }

    public function datatables_finance_office(Request $request)
    {
       
         $HeadOffices = HeadOffices::all();
        

            return DataTables::of($HeadOffices)
            ->addColumn('action',function($HeadOffices)
            {
                return ' <a title="Edit"  href="'. route('finance-office.edit',$HeadOffices->id) .'"> 
                      <i class="fas fa-edit"></i>
            </a> 
             <a title="Delete"  class="vehicleDelete text-danger" href="javascript:;" 
                data-HeadOfficesId="'.$HeadOffices->id.'" >
                      <i class="fas fa-trash"></i>
            </a>';
            })
            ->rawColumns(['action'])
            ->make(true);



            

     }
}
