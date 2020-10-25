<?php

namespace App\Http\Controllers;

use App\AgentView;
use App\Vehicle;
use App\User;
use App\UserAssigned;
use Illuminate\Http\Request;
use Auth;
use DB;
use DataTables;

class AgentViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getagentdata = AgentView::where('id','1')->first();
        return view('agent-permission.agent_permission',compact('getagentdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hidden_id == 0)
        {
            $add = AgentView::create($request->all());
            
        }
        else
        {   
            $add = AgentView::find($request->hidden_id);
            $add->agreement_no = $request->agreement_no;
            $add->make = $request->make;
            $add->engine_num = $request->engine_num;
            $add->prod_n = $request->prod_n;
            $add->region_area = $request->region_area;
            $add->Office = $request->Office;
            $add->branch = $request->branch;
            $add->customer_name = $request->customer_name;
            $add->cycle = $request->cycle;
            $add->paymode = $request->paymode;
            $add->emi = $request->emi;
            $add->tet = $request->tet;
            $add->noi = $request->noi;
            $add->allocation_month_grp = $request->allocation_month_grp;
            $add->tenor_over = $request->tenor_over;
            $add->charges = $request->charges;
            $add->gv = $request->gv;
            $add->model = $request->model;
            $add->regd_num = $request->regd_num;
            $add->chasis_num = $request->chasis_num;
            $add->rrm_name_no = $request->rrm_name_no;
            $add->rrm_mail_id = $request->rrm_mail_id;
            $add->coordinator_mail_id = $request->coordinator_mail_id;
            $add->letter_refernce = $request->letter_refernce;
            $add->dispatch_date = $request->dispatch_date;
            $add->letter_date = $request->letter_date;
            $add->valid_date = $request->valid_date;
            $add->save();
        }
        if($add)
        {
            return redirect()->route('agent-view-permission.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\agent_view  $agent_view
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicledata = Vehicle::find($id);
        $agentviewdata = AgentView::where('id',1)->first();
        return view('agent-permission.display',compact('vehicledata','agentviewdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\agent_view  $agent_view
     * @return \Illuminate\Http\Response
     */
    public function edit(agent_view $agent_view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\agent_view  $agent_view
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agent_view $agent_view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\agent_view  $agent_view
     * @return \Illuminate\Http\Response
     */
    public function destroy(agent_view $agent_view)
    {
        //
    }


    public function agent_index()
    {
        
        $assigneddata = UserAssigned::where('user_id',Auth::user()->id)->get();

        $vehicledata = DB::table('vehicles')
        ->join('user_assigneds', 'vehicles.id', '=', 'user_assigneds.vehicle_id')
        ->where('user_assigneds.user_id',Auth::user()->id )->paginate(10);

        $agentviewdata = AgentView::where('id',1)->first();

        return view('agent-permission.table',compact('vehicledata','agentviewdata'));
    }
   
   public function AgentVehicleSearch(Request $request)
    {


            if($request->has('s') && $request->s != ''){

            $vehicledata = DB::table('vehicles')
        ->join('user_assigneds', 'vehicles.id', '=', 'user_assigneds.vehicle_id')
        ->where('user_assigneds.user_id',Auth::user()->id )->
            where(function($query) use($request){
                $query->orwhere('customer_name','like','%'.$request->s.'%');
                $query->orwhere('agreement_no','like','%'.$request->s.'%');
                $query->orwhere('prod_n','like','%'.$request->s.'%');
                $query->orwhere('region_area','like','%'.$request->s.'%');
                $query->orwhere('office','like','%'.$request->s.'%');
                $query->orwhere('branch','like','%'.$request->s.'%');
                $query->orwhere('customer_name','like','%'.$request->s.'%');
                $query->orwhere('cycle','like','%'.$request->s.'%');
                $query->orwhere('paymode','like','%'.$request->s.'%');
                $query->orwhere('emi','like','%'.$request->s.'%');
                $query->orwhere('tet','like','%'.$request->s.'%');
                $query->orwhere('noi','like','%'.$request->s.'%');
                $query->orwhere('allocation_month_grp','like','%'.$request->s.'%');
                $query->orwhere('tenor_over','like','%'.$request->s.'%');
                $query->orwhere('charges','like','%'.$request->s.'%');
                $query->orwhere('gv','like','%'.$request->s.'%');
                $query->orwhere('model','like','%'.$request->s.'%');
                $query->orwhere('regd_num','like','%'.$request->s.'%');
                $query->orwhere('chasis_num','like','%'.$request->s.'%');
                $query->orwhere('engine_num','like','%'.$request->s.'%');
                $query->orwhere('make','like','%'.$request->s.'%');
                $query->orwhere('rrm_name_no','like','%'.$request->s.'%');
                $query->orwhere('rrm_mail_id','like','%'.$request->s.'%');
                $query->orwhere('coordinator_mail_id','like','%'.$request->s.'%');
                $query->orwhere('letter_refernce','like','%'.$request->s.'%');
                $query->orwhere('dispatch_date','like','%'.$request->s.'%');
                $query->orwhere('letter_date','like','%'.$request->s.'%');
                $query->orwhere('valid_date','like','%'.$request->s.'%');
            })->get();
            $agentviewdata = AgentView::where('id',1)->first();

        }
        else
        {
            $vehicledata =  DB::table('vehicles')
                ->join('user_assigneds', 'vehicles.id', '=', 'user_assigneds.vehicle_id')
                ->where('user_assigneds.user_id',Auth::user()->id )
                ->get();
            $agentviewdata = AgentView::where('id',1)->first();

        }
        
        $allowancehtml = view('agent-permission.dynamic_vehicle_table', compact('vehicledata','agentviewdata'))->render();
        $data=['data' => $allowancehtml];
        return Response()->json($data);
    }
}
