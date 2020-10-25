<?php

namespace App\Http\Controllers;

use App\Office;
use App\HeadOffices;
use DataTables;
use Illuminate\Http\Request;
use Validator;
use Session;
class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Officedata= Office::all();
        return view('office.table',compact('Officedata')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headOfficesname = HeadOffices::all();
        return view('office.form',compact('headOfficesname'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([ 
            'head_office_id' => 'required', 
            'branch_code' => 'required',
            'branch_address' => 'required',
            'city' => 'required',
            'branch_contact' => 'required|numeric',
            'manager_contact' => 'required|numeric',
            'gst' => 'required',
            'assigned_manager' => 'required',
            'manage_email' => 'required|email',
            'branch_email' => 'required|email',
       ],
       [    
            'head_office_id.required'=>"The head office name field is required."
       ]
       );
       
        $add = new Office;
        $add->head_office_id = $request->head_office_id;
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
            return redirect()->route('office.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $OfficeEdit = Office::find($id);
         $headOfficesname = HeadOffices::all();
        return view('office.edit',compact('OfficeEdit','headOfficesname'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, office $office)
    {
          $request->validate([ 
            'head_office_id' => 'required', 
            'branch_code' => 'required',
            'branch_address' => 'required',
            'city' => 'required',
            'branch_contact' => 'required|numeric',
            'manager_contact' => 'required|numeric',
            'gst' => 'required',
            'assigned_manager' => 'required',
            'manage_email' => 'required|email',
            'branch_email' => 'required|email',
       ],
       [    
            'head_office_id.required'=>"The head office name field is required."
       ]
       );
        
        $add = Office::find($request->hidden_id);
        $add->head_office_id = $request->head_office_id;
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
            return redirect()->route('office.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Office::find($request->id)->delete();
       if($data)
       {
            $success = "Branch Office Deleted successfully";
            $data=['success'=>$success];
            return Response()->json($data);
       }
    }
    public function datatables_office(Request $request)
    {
        

             $Office = Office::all();

            return DataTables::of($Office)
            ->addColumn('action',function($Office)
            {
                return ' <a title="Edit"  href="'. route('office.edit',$Office->id) .'"> 
                      <i class="fas fa-edit"></i>
            </a> 
             <a title="Delete"  class="OfficeDelete text-danger" href="javascript:;" 
                data-OfficeId="'.$Office->id.'" >
                      <i class="fas fa-trash"></i>
            </a>';
            })
            ->editColumn('head_office_id', function ($Office) {
               return ''.$Office->headOfficesname->finance_company_name.'';
            })
            ->rawColumns(['action'])
            ->make(true);

     }
}
