<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Vehicle;
use App\User;
use App\UserAssigned;
use App\AgentView;
use App\VehicleInformation;
use DB;
use Validator;

class VehicleController extends Controller
{
    
	public function assignedVehicleList(Request $request)
    {	
		
		
        $vehicleList = DB::table('vehicles')
        ->join('user_assigneds', 'vehicles.id', '=', 'user_assigneds.vehicle_id')
        ->where('user_assigneds.user_id', Auth::user()->id)
        ->get();
        if($vehicleList)
        {
         	return response()->json(['Code'=>200,'message'=>'success','data'=>$vehicleList]);
        }
        else
        {
             return response()->json(['Code'=>500,'message'=>'record is not available']);

        }
    }
	public function vehicleCount(Request $request)
	{
		 
          $VehicleCount = UserAssigned::where('user_id',Auth::user()->id)->count(); 

         if($VehicleCount)
	     {
	     	return response()->json(['Code'=>200,'message'=>'success','data'=>['count'=>$VehicleCount] ]);
	     }
	     else
	     {
	     	 return response()->json(['Code'=>500,'message'=>'record is not available']);	
	     }
	}
	
	public function vehicleList(Request $request)
	{
          $VehicleList = Vehicle::all(); 
         if($VehicleList)
	     {
	          return response()->json(['Code'=>200,'message'=>'success','data'=>$VehicleList]);
	     }
	     else
	     {
	     	  return response()->json(['Code'=>500,'message'=>'record is not available']);
	     }
	}
	public function searchnumber(Request $request)
	{
		//$AgentViews =  AgentView::where(*,'!=',null)->get();
		//$abc =	AgentView::where_not_null('agreement_no','region_area')->get();
		//return DB::table('agent_views')->whereNotNull('agreement_no')->get();
		//dd($abc);
		//dd($AgentViews);

		//dd($request->all());

		$validator = Validator::make($request->all(), [
            'regd_num' => 'required',
        ]);
        if($validator->fails()){
            return $validator->errors();       
        }

		$AgentViews =  AgentView::where('id','1')->first();


		//dd($AgentViews->agreement_no);
		 //$VehicleNo = Vehicle::where('regd_num',$request->regd_num)->where('deleted' ,null)->first(); 
			
			 $VehicleNo = DB::table('vehicles')
	        ->join('user_assigneds', 'vehicles.id', '=', 'user_assigneds.vehicle_id')
	        ->where('user_assigneds.user_id', Auth::user()->id)
			->where('vehicles.deleted',null)    
			->where('vehicles.regd_num',$request->regd_num)    
	        ->first();


			$arr=[];

			if($VehicleNo)
			{
				$add = new VehicleInformation;
				$add->user_id = Auth::user()->id;
				$add->regd_num = $request->regd_num;
				$add->longitude = $request->longitude;
				$add->latitude = $request->latitude;
				$add->save();

				
			   if($AgentViews->agreement_no)
	           {
					$arr['agreement_no'] = $VehicleNo->agreement_no;           	
	           }
	           if($AgentViews->prod_n)
	           {
					$arr['prod_n'] =  $VehicleNo->prod_n;           	
	           }
	           if($AgentViews->region_area)
	           {
	           		$arr['region_area'] = $VehicleNo->region_area;				           	
	           }
	           if($AgentViews->office)
	           {
	           		$arr['office'] = $VehicleNo->office;				           	
	           }
	           if($AgentViews->branch)
	           {
	           		$arr['branch'] =$VehicleNo->branch;				           	
	           }
	           if($AgentViews->customer_name)
	           {
	           		$arr['customer_name'] = $VehicleNo->customer_name;
	           }
	           if($AgentViews->cycle)
	           {
	           		$arr['cycle'] =$VehicleNo->cycle;
	           }
	           if($AgentViews->paymode)
	           {
	           		$arr['paymode'] =$VehicleNo->paymode;
	           }
	           if($AgentViews->emi)
	           {
	           		$arr['emi'] =$VehicleNo->emi;				           	
	           }
	           if($AgentViews->tet)
	           {
	           		$arr['tet'] =$VehicleNo->tet;				           	
	           }
	           if($AgentViews->noi)
	           {
	           		$arr['noi'] =$VehicleNo->noi;				           	
	           }
	           if($AgentViews->allocation_month_grp)
	           {
	           		$arr['allocation_month_grp'] =$VehicleNo->allocation_month_grp;				           	
	           }
	           if($AgentViews->tenor_over)
	           {
	           		$arr['tenor_over'] =$VehicleNo->tenor_over;				           	
	           }
	           if($AgentViews->charges)
	           {
	           		$arr['charges'] =$VehicleNo->charges;				           	
	           }
	            if($AgentViews->gv)
	           {
	           		$arr['gv'] =$VehicleNo->gv;				           	
	           }
	            if($AgentViews->model)
	           {
	           		$arr['model'] =$VehicleNo->model;				           	
	           }
	            if($AgentViews->regd_num)
	           {
	           		$arr['regd_num'] =$VehicleNo->regd_num;				           	
	           }
	            if($AgentViews->chasis_num)
	           {
	           		$arr['chasis_num'] =$VehicleNo->chasis_num;				           	
	           }
	            if($AgentViews->engine_num)
	           {
	           		$arr['engine_num'] =$VehicleNo->engine_num;				           	
	           }
	            if($AgentViews->make)
	           {
	           		$arr['make'] =$VehicleNo->make;				           	
	           }
	            if($AgentViews->rrm_name_no)
	           {
	           		$arr['rrm_name_no'] =$VehicleNo->rrm_name_no;				           	
	           }
	            if($AgentViews->rrm_mail_id)
	           {
	           		$arr['rrm_mail_id'] =$VehicleNo->rrm_mail_id;				           	
	           }
	            if($AgentViews->coordinator_mail_id)
	           {
	           		$arr['coordinator_mail_id'] =$VehicleNo->coordinator_mail_id;				           	
	           }
	            if($AgentViews->letter_refernce)
	           {
	           		$arr['letter_refernce'] =$VehicleNo->letter_refernce;				           	
	           }
	            if($AgentViews->dispatch_date)
	           {
	           		$arr['dispatch_date'] =$VehicleNo->dispatch_date;				           	
	           }
	            if($AgentViews->letter_date)
	           {
	           		$arr['letter_date'] =$VehicleNo->letter_date;				           	
	           }
	            if($AgentViews->valid_date)
	           {
	           		$arr['valid_date'] =$VehicleNo->valid_date;				           	
	           }
         
         }

         $data=[];
         $wholedata=[];

         foreach($arr as $k => $v)
         {
         	$key = ucwords(str_replace("_"," ",$k));
         	$data["name"]=$key;
         	$data["value"]=$v;
         	$wholedata[] = $data;
         }	

        

         if($VehicleNo)
	     {
	          return response()->json(['Code'=>200,'message'=>'success','data'=>$wholedata]);
	     }
	     else
	     {
	     	  return response()->json(['Code'=>500,'message'=>'record is not available']);
	     }


	}
	public function vehicleSearch(Request $request)
	{
		/*$validator = Validator::make($request->all(), [
            'regd_num' => 'required',
        ]);
        if($validator->fails()){
            return $validator->errors();       
        }*/

        //$VehicleCount = UserAssigned::where('user_id',Auth::user()->id)->first();

        if($request->regd_num)
        {
        	$AgentViews =  AgentView::where('id','1')->first();

			 $VehicleNos = DB::table('vehicles')
	        ->join('user_assigneds', 'vehicles.id', '=', 'user_assigneds.vehicle_id')
	        ->where('user_assigneds.user_id', Auth::user()->id)
			->where('vehicles.regd_num','like', '%' . $request->regd_num . '%')        
			->where('vehicles.deleted',null)     
			->select('vehicles.id','regd_num')
	        ->get();
	        

			/*$VehicleNos = Vehicle::select('id','regd_num')->where('regd_num','like', '%' . $request->regd_num . '%')->where('deleted' ,null)->get(); */


	        $wholedata=[];

	         foreach($VehicleNos as $k => $v)
	         {
	         	$wholedata[] = $v;
	         }	

	         if(count($VehicleNos) > 0)
		     {
		          return response()->json(['Code'=>200,'message'=>'success','data'=>$wholedata]);
		     }
		     else
		     {
		     	  return response()->json(['Code'=>500,'message'=>'record is not available']);
		     }
        }
        else
        {
		   	return response()->json(['Code'=>500,'message'=>'The regd num field is required.']);
        	

        }

	}

	public function vehicleinformation(Request $request)
	{
		//dd("Ad");


		$validator = Validator::make($request->all(), [
            'regd_num' => 'required',
        ]);
        if($validator->fails()){
            return $validator->errors();       
        }

		$AgentViews =  AgentView::where('id','1')->first();
		
			 $VehicleNo = DB::table('vehicles')
	        ->join('user_assigneds', 'vehicles.id', '=', 'user_assigneds.vehicle_id')
	        ->where('user_assigneds.user_id', Auth::user()->id)
			->where('vehicles.deleted',null)    
			->where('vehicles.regd_num',$request->regd_num)    
	        ->first();


			$arr=[];

			if($VehicleNo)
			{
				$request = new Request($request->all());
		        if($request->has('image'))  
		        {
		            $imageName = time().'.'.request()->image->getClientOriginalExtension();
		            request()->image->move(public_path('uploads/vehicle'), $imageName);
		            $request->merge(["image"=>$imageName]);
		        }

				$add = new VehicleInformation;
				$add->user_id = Auth::user()->id;
				$add->regd_num = $request->regd_num;
				$add->longitude = $request->longitude;
				$add->latitude = $request->latitude;
				$add->image = $request->image;
				$add->save();

				
			   if($AgentViews->agreement_no)
	           {
					$arr['agreement_no'] = $VehicleNo->agreement_no;           	
	           }
	           if($AgentViews->prod_n)
	           {
					$arr['prod_n'] =  $VehicleNo->prod_n;           	
	           }
	           if($AgentViews->region_area)
	           {
	           		$arr['region_area'] = $VehicleNo->region_area;				           	
	           }
	           if($AgentViews->office)
	           {
	           		$arr['office'] = $VehicleNo->office;				           	
	           }
	           if($AgentViews->branch)
	           {
	           		$arr['branch'] =$VehicleNo->branch;				           	
	           }
	           if($AgentViews->customer_name)
	           {
	           		$arr['customer_name'] = $VehicleNo->customer_name;
	           }
	           if($AgentViews->cycle)
	           {
	           		$arr['cycle'] =$VehicleNo->cycle;
	           }
	           if($AgentViews->paymode)
	           {
	           		$arr['paymode'] =$VehicleNo->paymode;
	           }
	           if($AgentViews->emi)
	           {
	           		$arr['emi'] =$VehicleNo->emi;				           	
	           }
	           if($AgentViews->tet)
	           {
	           		$arr['tet'] =$VehicleNo->tet;				           	
	           }
	           if($AgentViews->noi)
	           {
	           		$arr['noi'] =$VehicleNo->noi;				           	
	           }
	           if($AgentViews->allocation_month_grp)
	           {
	           		$arr['allocation_month_grp'] =$VehicleNo->allocation_month_grp;				           	
	           }
	           if($AgentViews->tenor_over)
	           {
	           		$arr['tenor_over'] =$VehicleNo->tenor_over;				           	
	           }
	           if($AgentViews->charges)
	           {
	           		$arr['charges'] =$VehicleNo->charges;				           	
	           }
	            if($AgentViews->gv)
	           {
	           		$arr['gv'] =$VehicleNo->gv;				           	
	           }
	            if($AgentViews->model)
	           {
	           		$arr['model'] =$VehicleNo->model;				           	
	           }
	            if($AgentViews->regd_num)
	           {
	           		$arr['regd_num'] =$VehicleNo->regd_num;				           	
	           }
	            if($AgentViews->chasis_num)
	           {
	           		$arr['chasis_num'] =$VehicleNo->chasis_num;				           	
	           }
	            if($AgentViews->engine_num)
	           {
	           		$arr['engine_num'] =$VehicleNo->engine_num;				           	
	           }
	            if($AgentViews->make)
	           {
	           		$arr['make'] =$VehicleNo->make;				           	
	           }
	            if($AgentViews->rrm_name_no)
	           {
	           		$arr['rrm_name_no'] =$VehicleNo->rrm_name_no;				           	
	           }
	            if($AgentViews->rrm_mail_id)
	           {
	           		$arr['rrm_mail_id'] =$VehicleNo->rrm_mail_id;				           	
	           }
	            if($AgentViews->coordinator_mail_id)
	           {
	           		$arr['coordinator_mail_id'] =$VehicleNo->coordinator_mail_id;				           	
	           }
	            if($AgentViews->letter_refernce)
	           {
	           		$arr['letter_refernce'] =$VehicleNo->letter_refernce;				           	
	           }
	            if($AgentViews->dispatch_date)
	           {
	           		$arr['dispatch_date'] =$VehicleNo->dispatch_date;				           	
	           }
	            if($AgentViews->letter_date)
	           {
	           		$arr['letter_date'] =$VehicleNo->letter_date;				           	
	           }
	            if($AgentViews->valid_date)
	           {
	           		$arr['valid_date'] =$VehicleNo->valid_date;				           	
	           }
         
         }

         $data=[];
         $wholedata=[];

         foreach($arr as $k => $v)
         {
         	$key = ucwords(str_replace("_"," ",$k));
         	$data["name"]=$key;
         	$data["value"]=$v;
         	$wholedata[] = $data;
         }	

        

         if($VehicleNo)
	     {
	          return response()->json(['Code'=>200,'message'=>'success','data'=>$wholedata]);
	     }
	     else
	     {
	     	  return response()->json(['Code'=>500,'message'=>'record is not available']);
	     }


	}

	
    
}
