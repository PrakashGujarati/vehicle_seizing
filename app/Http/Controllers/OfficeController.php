<?php

namespace App\Http\Controllers;

use App\Office;
use App\HeadOffices;
use Illuminate\Http\Request;
use Validator;
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
    public function destroy($id)
    {
        $data = Office::find($id)->delete();
        if($data)
        {
            return redirect()->route('office.index');
        }
    }
    public function search_Office(Request $request)
    {
            if($request->has('s') && $request->s != ''){
            $Officedata = Office::where(function($query) use($request){
                $query->orwhere('head_office_id','like','%'.$request->s.'%');
                $query->orwhere('name','like','%'.$request->s.'%');
                $query->orwhere('contact_person','like','%'.$request->s.'%');
                $query->orwhere('contact','like','%'.$request->s.'%');
                $query->orwhere('address1','like','%'.$request->s.'%');
                $query->orwhere('city','like','%'.$request->s.'%');
                $query->orwhere('branch_code','like','%'.$request->s.'%');
                $query->orwhere('branch','like','%'.$request->s.'%');
            })->get();
        }
        else
        {
            $Officedata = Office::all();
        }
        
        $allowancehtml = view('office.dynamic_office_table', compact('Officedata'))->render();
        $data=['data' => $allowancehtml];
        return Response()->json($data);

     }
}
