<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Hash;
use App\User;
use Carbon\Carbon;
use App\UserSubscription;


class AgentController extends Controller
{
	public $successStatus = 200;

	public function login(Request $request)
	{
       $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return $validator->errors();       
        }

        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            $error = "Unauthorized";
            return $error;
        }
        $user = $request->user();
        $success['token'] =  $user->createToken('token')->accessToken;
        return $success;
	}

	public function checkEmail(Request $request)
	{
     $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
        ]);
        if($validator->fails()){
            return $validator->errors();       
        }

      	$checkEmail = User::where('email',$request->email)->where('status','Active')->first();
      	if($checkEmail)
        {
        	 return response()->json(['Email Is Not Available'=>$checkEmail],$this-> successStatus);
        }
        else
        {
        	 return response()->json(['Email Not available'],$this-> successStatus);
        }
	}
	public function profile(Request $request)
	{	

      	$checkEmail = User::select('name','email','contact')->where('id', Auth::user()->id)->first();
      	if($checkEmail)
      	{
        	 return response()->json(['Profile'=>$checkEmail],$this-> successStatus);
      	}

	}
  public function logout(Request $request)
    {
      
        
        $isUser = $request->user()->token()->revoke();
        if($isUser){
            $success['message'] = "Successfully logged out.";
            return $success;
        }
        else{
            $error = "Something went wrong.";
            return $error;
        }
            
        
    }


	

      

/*
      	$GetUserSubscription = UserSubscription::where('user_id',$request->id)->first();

      	$dateStart = $GetUserSubscription->start_date; 
      	$dateEnd = $GetUserSubscription->end_date; 

        $count = UserSubscription::where('user_id',$request->id)
            ->where(function($query) use ($dateStart, $dateEnd){
                $query->where([
                    ['start_date', '<=', $dateStart],
                    ['end_date', '>=', $dateStart]
                ])
                    ->orWhere([
                        ['start_date', '<', $dateEnd],
                        ['end_date', '>=', $dateEnd]
                    ])
                    ->orWhere([
                        ['start_date', '>=', $dateStart],
                        ['end_date', '<', $dateEnd]
                    ]);
            })->count();*/




      

}
