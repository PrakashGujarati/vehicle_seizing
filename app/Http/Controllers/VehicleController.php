<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\User;
use App\UserAssigned;
use App\HeadOffices;
use DataTables;

use Illuminate\Http\Request;
use Session;
 
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $financeoffices = HeadOffices::all(); 
       // $vehicledata = Vehicle::where('deleted' ,null);
        $userdata = User::where('role','agent')->where('status','Active')->get();
        return view('vehicle.table',compact('userdata','financeoffices'));


    }

    public function manageVehicle()
    {

        $vehicledata = Vehicle::where('deleted' ,null);
        


        return DataTables::of($vehicledata)
            ->addColumn('action',function($vehicledata)
            {
             return '<div  class="d-flex">
             <a title="View" class="view" href="javascript:;"
                data-customer_name="'.$vehicledata->customer_name .'"
                data-agreement_no="'.$vehicledata->agreement_no .'"
                data-prod_n="'.$vehicledata->prod_n .'"
                data-region_area="'.$vehicledata->region_area .'"
                data-office="'.$vehicledata->office .'"
                data-branch="'.$vehicledata->branch .'"
                data-cycle="'.$vehicledata->cycle .'"
                data-paymode="'.$vehicledata->paymode .'"
                data-emi="'.$vehicledata->emi .'"
                data-tet="'.$vehicledata->tet .'"
                data-noi="'.$vehicledata->noi .'"
                data-allocation_month_grp="'.$vehicledata->allocation_month_grp .'"
                data-tenor_over="'.$vehicledata->tenor_over .'"
                data-charges="'.$vehicledata->charges .'"
                data-gv="'.$vehicledata->gv .'"
                data-model="'.$vehicledata->model .'"
                data-regd_num="'.$vehicledata->regd_num .'"
                data-chasis_num="'.$vehicledata->chasis_num .'"
                data-engine_num="'.$vehicledata->engine_num .'"
                data-make="'.$vehicledata->make .'"
                data-rrm_name_no="'.$vehicledata->rrm_name_no .'"
                data-rrm_mail_id="'.$vehicledata->rrm_mail_id .'"
                data-coordinator_mail_id="'.$vehicledata->coordinator_mail_id .'"
                data-letter_refernce="'.$vehicledata->letter_refernce .'"
                data-dispatch_date="'.$vehicledata->dispatch_date .'"
                data-letter_date="'.$vehicledata->letter_date .'"
                data-valid_date="'.$vehicledata->valid_date .'"
                data-finance_company_name="'.$vehicledata->finance_company_name .'"
             >
              <i class="fas fa-eye"> </i>
             </a>
             &nbsp;
            <a title="Edit"  href="'. route('Vehicle.edit',$vehicledata->id) .'"> 
                      <i class="fas fa-edit"></i>
            </a>    
              &nbsp;
            <a title="Delete"  class="vehicleDelete text-danger" href="javascript:;" 
                data-vehicleId="'.$vehicledata->id.'" >
                      <i class="fas fa-trash"></i>
            </a>

             </div>';
                
            })
            ->addColumn('checkbox',function($vehicledata)
            {
                return '<input type="checkbox"  name="vehicle_id" value="'.$vehicledata->id .'">';
            })
            /*->rawColumns(['action'],['checkbox'])*/
             ->rawColumns(array("action", "checkbox"))
            ->make(true);

          

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request = new Request($request->all());

        $request->merge(["create_type"=>"form"]);
        $data = Vehicle::create($request->all());
        
        if($data)
        {
            return redirect()->route('Vehicle.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicledata = Vehicle::find($id);
        return view('vehicle.display',compact('vehicledata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $VehicleEdit = Vehicle::find($id);
        return view('vehicle.edit',compact('VehicleEdit'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //dd($request->all());
        $update = Vehicle::find($request->hidden_id)->update($request->all());
         if($update)
        {
            return redirect()->route('Vehicle.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Vehicle::find($id)->delete();
        if($data)
        {
            return redirect()->route('Vehicle.index');
        }
    }
    public function import()
    {
        //$vehicledata = Vehicle::all();
         $vehicledata = Vehicle::where('deleted' ,null)->get();
         $finance_offices = HeadOffices::all();

        return view('vehicle.import',compact('vehicledata','finance_offices'));
    }
    
    public function VehicleSearch(Request $request)
    {
            if($request->has('s') && $request->s != ''){
            $vehicledata = Vehicle::where(function($query) use($request){
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
                $query->orwhere('finance_company_name','like','%'.$request->s.'%');
            })->get();
        }
        else
        {
             $vehicledata = Vehicle::where('deleted' ,null)->get();
           // $vehicledata = Vehicle::all();
        }
        
        $allowancehtml = view('vehicle.dynamic_vehicle_table', compact('vehicledata'))->render();
        $data=['data' => $allowancehtml];
        return Response()->json($data);
    }
    
     public function VehicleImportSearch(Request $request)
    {
            if($request->has('s') && $request->s != ''){
            $vehicledata = Vehicle::where(function($query) use($request){
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
                $query->orwhere('tenor','like','%'.$request->s.'%');
                $query->orwhere('over','like','%'.$request->s.'%');
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
                $query->orwhere('valid_date','like','%'.$request->s.'%');
                $query->orwhere('finance_company_name','like','%'.$request->s.'%');
            })->get();
        }
        else
        {   
             $vehicledata = Vehicle::where('deleted' ,null)->get();
        }
        
        $allowancehtml = view('vehicle.dynamic_import_vehicle_table', compact('vehicledata'))->render();
        $data=['data' => $allowancehtml];
        return Response()->json($data);
    }

    public function vehicleunassigned(Request $request)
    {

       $SelectedDateRecords =  UserAssigned::whereDate('created_at', '=', $request->date)->get();
       
       $delete=[]; 

       foreach ($SelectedDateRecords as $date) {
            $delete = UserAssigned::find($date->id)->delete();
       }
       if($delete)
       {
            Session::flash('message-success', 'Unassigned successfully..');  
            return redirect()->route('Vehicle.index');
       }
       else
       {
                Session::flash('message-danger', 'record is not available..');  
                return redirect()->route('Vehicle.index');
       }

    }
     public function VehicleSelectedDateDelete(Request $request)
     {
        $msg = "";         
        $errormsg = "";

        $SelectedDateRecords =  Vehicle::whereDate('created_at', '=', $request->date)->where('create_type',null)->where('deleted' ,null)->get();

        //dd($SelectedDateRecords);


        $UserAssignedcheck =  UserAssigned::whereDate('created_at', '=', $request->date)->get();
        if(count($UserAssignedcheck) > 0)
        {
            $delete=[]; 
           foreach ($UserAssignedcheck as $date) {
                $delete = UserAssigned::find($date->id)->delete();
           } 
       }

       
        if(count($SelectedDateRecords) > 0)
        {   
            $update=[]; 
           foreach ($SelectedDateRecords as $date) {
                $update = Vehicle::find($date->id);
                $update->deleted = 'delete';
                $update->save();
           }
           if($update)
           {
                $vehicledata = Vehicle::where('deleted' ,null)->get();
                 $allowancehtml = view('vehicle.dynamic_vehicle_table', compact('vehicledata'))->render();
                 $msg = "Record Deleted Successfully";
                $data=['data' => $allowancehtml ,'msg'=>$msg];
                return Response()->json($data);
           }    
        }
        else
        {


            $errormsg = "Record Is Not Available";
            $data=['msg'=>$msg ,'errormsg' =>$errormsg];
            return Response()->json($data);
        }
       

     }
     public function SelectedVehicle(Request $request)
     {

        //dd($request->all());
         $vehicledata = Vehicle::where('deleted' ,null)->where('finance_company_name',$request->company_name)->paginate(12);;
       
           if(count($vehicledata) > 0)
            {
                 $allowancehtml = view('vehicle.dynamic_vehicle_table', compact('vehicledata'))->render();
                    $data=['data' => $allowancehtml];
                    return Response()->json($data);      
            }
            else
            {
                $vehicledata = Vehicle::where('deleted' ,null)->get();
            }

     }
     public function manageVehicleimports(Request $request)
     {

        $vehicledata = Vehicle::where('deleted' ,null);
        


        return DataTables::of($vehicledata)->make(true);


     }


    

    
    
}
