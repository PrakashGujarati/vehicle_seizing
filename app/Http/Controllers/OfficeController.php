<?php

namespace App\Http\Controllers;

use App\Office;
use App\HeadOffices;
use Illuminate\Http\Request;
use Validator;
use DataTables;
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
            'name' => 'required',
            'contact_person' => 'required',
            'contact' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'branch_code' => 'required',
            'branch' => 'required',
       ],
       [
            'address1.required'=>"The address field is required.",
            'head_office_id.required'=>"The head office name field is required."
       ]
       );
       
        $add = new Office;
        $add->head_office_id = $request->head_office_id;
        $add->name = $request->name;
        $add->contact_person = $request->contact_person;
        $add->contact = $request->contact;
        $add->address1 = $request->address1;
        $add->city = $request->city;
        $add->branch_code = $request->branch_code;
        $add->branch = $request->branch;
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
            'name' => 'required',
            'contact_person' => 'required',
            'contact' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'branch_code' => 'required',
            'branch' => 'required',
       ],
       [
            'address1.required'=>"The address field is required.",
            'head_office_id.required'=>"The head office name field is required."
       ]
       );
        
        $add = Office::find($request->hidden_id);
        $add->head_office_id = $request->head_office_id;
        $add->name = $request->name;
        $add->contact_person = $request->contact_person;
        $add->contact = $request->contact;
        $add->address1 = $request->address1;
        $add->city = $request->city;
        $add->branch_code = $request->branch_code;
        $add->branch = $request->branch;
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
            $success = "Office Deleted successfully";
            $data=['success'=>$success];
            return Response()->json($data);
       }
    }
    public function datatables_office(Request $request)
    {
        dd("Adf");

           /*  $Office = Office::all();
        

            return DataTables::of($Office)
            ->addColumn('action',function($Office)
            {
                return ' <a title="Edit"  href="'. route('office.edit',$Office->id) .'"> 
                      <i class="fas fa-edit"></i>
            </a> 
             <a title="Delete"  class="vehicleDelete text-danger" href="javascript:;" 
                data-OfficeId="'.$Office->id.'" >
                      <i class="fas fa-trash"></i>
            </a>';
            })
            ->rawColumns(['action'])
            ->make(true);*/

     }
}
