<?php

namespace App\Http\Controllers;
use App\User;
use App\UserSubscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DataTables;
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
     public function UserController(Request $request)
    {
           $Users = User::all();
        

            return DataTables::of($Users)
            ->addColumn('action',function($Users)
            {
                return ' <a title="Edit"  href="'. route('user.edit',$Users->id) .'"> 
                      <i class="fas fa-edit"></i>
            </a> 
            ';
            })
            ->addColumn('status',function($Users)
            {

                  if ($Users->status == "Active") {
                       return '<span style="background:#0CC27E;color: white;padding: 2px;border-radius: 5px;padding: 5px">Active</span>';
                   }
                   else
                   {
                        return '<span style="background:#FF586B;padding: 2px;color: white;border-radius: 5px;padding: 5px">Inactive</span>';
                   }

               
            })
            ->rawColumns(array("action", "status"))
            ->make(true);

     }
}
