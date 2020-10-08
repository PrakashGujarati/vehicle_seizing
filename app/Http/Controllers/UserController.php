<?php

namespace App\Http\Controllers;
use App\User;
use App\UserSubscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdata= User::all();
        return view('user.table',compact('userdata')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.form');
        
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
/*         $request->validate([
            'name' => 'required',
            'email' => 'required|unique:email',
            'password' => 'required|string|min:8',
            'contact' => 'required|digits:10',
            'role' => 'required',
            'status' => 'required',
       ]);*/
           

                

        $add = new User;
        $add->name = $request->name;
        $add->email = $request->email;
        $add->password =  Hash::make($request->password);
        $add->contact = $request->contact;
        $add->role = $request->role;
        $add->status = $request->status;
        $add->save();
        if($add)
        {
            $start_date = Carbon::today()->format('Y-m-d');
            $end_date = Carbon::now()->addMonth()->format('Y-m-d');

            $data = new UserSubscription;
            $data->user_id = $add->id;
            $data->start_date = $start_date;
            $data->end_date = $end_date;
            $data->save();    
        }

        
 
        if($data)
        {
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $UserEdit = User::find($id);
        return view('user.edit',compact('UserEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       /* $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'string|min:8',
            'contact' => 'required|digits:10',
            'role' => 'required',
            'status' => 'required',
       ]);*/

        $add = User::find($request->hidden_id);
        $add->name = $request->name;
        $add->email = $request->email;
        $add->password =  Hash::make($request->password);
        $add->contact = $request->contact;
        $add->role = $request->role;
        $add->status = $request->status;
        $add->save();
        if($add)
        {
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     public function search_user(Request $request)
    {
            if($request->has('s') && $request->s != ''){
            $userdata = User::where(function($query) use($request){
                $query->orwhere('name','like','%'.$request->s.'%');
                $query->orwhere('email','like','%'.$request->s.'%');
                $query->orwhere('contact','like','%'.$request->s.'%');
                $query->orwhere('role','like','%'.$request->s.'%');
                $query->orwhere('status','like','%'.$request->s.'%');
            })->get();
        }
        else
        {
            $userdata = User::all();
        }
        
        $allowancehtml = view('user.dynamic_user_table', compact('userdata'))->render();
        $data=['data' => $allowancehtml];
        return Response()->json($data);

     }
}
