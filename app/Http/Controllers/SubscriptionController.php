<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\UserSubscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subscriptions = Subscription::all();
        return view('subscription.table',compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::where('role','agent')->where('status','Active')->get();
        return view('subscription.form',compact('users'));
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

        $get_user_subscription = UserSubscription::where('user_id',$request->user_id)->first();

        $days = $request->days;


        $amount = 10 * $days;
        
       /* $dateadd=strtotime($get_user_subscription->end_date);
        $days=$request->days;
        $end_date = date('Y-m-d',strtotime('+'.$days.' days',$dateadd));

     
        dd($end_date);*/

         //$date = Carbon::parse($get_user_subscription->end_date)->format('Y-m-d');

        
         $today = Carbon::today()->format('Y-m-d');


        if($today < $get_user_subscription->end_date)
        {
               $dateadd=strtotime($get_user_subscription->end_date);
               $days=$request->days;
               $end_date = date('Y-m-d',strtotime('+'.$days.' days',$dateadd));
               
               if($today < $get_user_subscription->end_date)
               {
                
                    $start_date = $get_user_subscription->start_date;
               }
               else
               {    
                    $start_date = $today;
               }


                $update = UserSubscription::find($get_user_subscription->id);
                $update->start_date = $start_date;
                $update->end_date = $end_date;
                $update->save();
        }
        else
        {
         
               $dateadd=strtotime($today);
               $days=$request->days;
               $end_date = date('Y-m-d',strtotime('+'.$days.' days',$dateadd));
               $start_date = $today;

                $update = UserSubscription::find($get_user_subscription->id);
                $update->start_date = $start_date;
                $update->end_date = $end_date;
                $update->save();
        }

        
        $add= new Subscription;
        $add->user_id = $request->user_id;
        $add->user_subscription_id = $get_user_subscription->id ;
        $add->days = $request->days;
        $add->amount = $amount;
        $add->payment_status = $request->payment_status;
        $add->payment_mode = $request->payment_mode;
        $add->notes = $request->notes;
        $add->save();


        if($add)
        {
            return redirect()->route('subscribers.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $Subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $subscriptionEdit = Subscription::find($id);
        $users = User::where('role','agent')->where('status','Active')->get();
        return view('subscription.edit',compact('subscriptionEdit','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $Subscription)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $Subscription)
    {
        //
    }

     public function datatables_subscribers(Request $request)
    {
           
             $Subscription = Subscription::all();

            return DataTables::of($Subscription)
            ->editColumn('user_id', function ($Subscription) {
               return ''.$Subscription->Username->name.'';
            })
            ->rawColumns(['user_id'])
            ->make(true);

     }
}
