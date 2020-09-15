<?php

namespace App\Http\Controllers;

use App\subscription;
use App\UserSubscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subscriptions = subscription::all();
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

        
        $add= new subscription;
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
            return redirect()->route('subscription.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(subscription $subscription)
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
         $subscriptionEdit = subscription::find($id);
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
    public function update(Request $request, subscription $subscription)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(subscription $subscription)
    {
        //
    }

     public function search_subscription(Request $request)
    {
            if($request->has('s') && $request->s != ''){
            $subscriptions = subscription::where(function($query) use($request){
                $query->orwhere('user_id','like','%'.$request->s.'%');
                $query->orwhere('days','like','%'.$request->s.'%');
                $query->orwhere('amount','like','%'.$request->s.'%');
                $query->orwhere('payment_status','like','%'.$request->s.'%');
                $query->orwhere('payment_mode','like','%'.$request->s.'%');
                $query->orwhere('notes','like','%'.$request->s.'%');
            })->get();
        }
        else
        {
            $subscriptions = subscription::all();
        }
        
        $allowancehtml = view('subscription.dynamic_subscription_table', compact('subscriptions'))->render();
        $data=['data' => $allowancehtml];
        return Response()->json($data);

     }
}
