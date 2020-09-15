<?php

namespace App\Http\Controllers;

use App\HeadOffices;
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
         $request->validate([
            'name' => 'required', 
            'vendor_code' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'contact_person' => 'required|numeric',
            'contact' => 'required|numeric',
            'gst' => 'required',
       ]
       );

        $add = new HeadOffices;
        $add->name = $request->name;
        $add->vendor_code = $request->vendor_code;
        $add->address1 = $request->address1;
        $add->address2 = $request->address2;
        $add->city = $request->city;
        $add->contact_person = $request->contact_person;
        $add->contact = $request->contact;
        $add->gst = $request->gst;
        $add->save();
        if($add)
        {
            return redirect()->route('headoffice.index');
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
            'name' => 'required', 
            'vendor_code' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'contact_person' => 'required|numeric',
            'contact' => 'required|numeric',
            'gst' => 'required',
       ]
       );
        
        $add = HeadOffices::find($request->hidden_id);
        $add->name = $request->name;
        $add->vendor_code = $request->vendor_code;
        $add->address1 = $request->address1;
        $add->address2 = $request->address2;
        $add->city = $request->city;
        $add->contact_person = $request->contact_person;
        $add->contact = $request->contact;
        $add->gst = $request->gst;
        $add->save();
        if($add)
        {
            return redirect()->route('headoffice.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\head_offices  $head_offices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = HeadOffices::find($id)->delete();
        if($data)
        {
            return redirect()->route('headoffice.index');
        }
    }

    public function search_headoffice(Request $request)
    {
            if($request->has('s') && $request->s != ''){
            $headofficesdata = HeadOffices::where(function($query) use($request){
                $query->orwhere('name','like','%'.$request->s.'%');
                $query->orwhere('vendor_code','like','%'.$request->s.'%');
                $query->orwhere('city','like','%'.$request->s.'%');
                $query->orwhere('contact_person','like','%'.$request->s.'%');
                $query->orwhere('address1','like','%'.$request->s.'%');
                $query->orwhere('address2','like','%'.$request->s.'%');
                $query->orwhere('contact','like','%'.$request->s.'%');
                $query->orwhere('gst','like','%'.$request->s.'%');
            })->get();
        }
        else
        {
            $headofficesdata = HeadOffices::all();
        }
        
        $allowancehtml = view('headoffices.dynamic_headoffice_table', compact('headofficesdata'))->render();
        $data=['data' => $allowancehtml];
        return Response()->json($data);

     }
}
