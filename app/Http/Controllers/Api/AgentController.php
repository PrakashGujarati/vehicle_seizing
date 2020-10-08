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

        $userCheck=User::where('email',$request->email)->first();
        if($userCheck)
        {
          if(Hash::check($request->password,$userCheck->password))
          {
            $checkExpiry=UserSubscription::where('end_date','>=',date('Y-m-d'))->where('user_id',$userCheck->id)->first();

            if($checkExpiry === null)
            {
                return response()->json(['Code'=>500,'message'=>'Your subscription is expired..']);
            }    
          }
          else
          {
            return response()->json(['Code'=>500,'message'=>'invalid login credentials']);
          }
          
        }
        else
        {
          return response()->json(['Code'=>500,'message'=>'invalid login credentials']);
        }

        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            $error = "Unauthorized";
            /*return response()->json(['Code'=>500,'message'=>'invalid login credentials','data'=>["null"=>""]]);*/

            return response()->json(['Code'=>500,'message'=>'invalid login credentials']);
            
        }
        $user = $request->user();
        $success['token'] =  $user->createToken('token')->accessToken;
        //return $success;
         return response()->json(['Code'=>200,'message'=>'success','data'=>$success]);
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
             return response()->json(['Code'=>200,'message'=>'success','data'=>$checkEmail]);
        }
        else
        {    
             return response()->json(['Code'=>500,'message'=>'Email not found..']);
        }
	}
	public function profile(Request $request)
	{	

      	$checkEmail = User::select('name','email','contact')->where('id', Auth::user()->id)->first();
      	if($checkEmail)
      	{
            return response()->json(['Code'=>200,'message'=>'success','data'=>$checkEmail]);
      	}

	}
  public function logout(Request $request)
    {
      
        
        $isUser = $request->user()->token()->revoke();
        if($isUser){
            $success['message'] = "Successfully logged out.";
            //return $success;
             return response()->json(['Code'=>200,'message'=>'success','data'=>$success]);
        }
        else{
            $error = "Something went wrong.";
            //return $error;
            return response()->json(['Code'=>500,'message'=>'Something went wrong.']);
        }
            
        
    }


	

      


      




      

}
