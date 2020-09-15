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
	public function login(Request $request)
	{
		$request->validate([
			'email' => 'required|string|email',
			'password' => 'required|string'
		]);        $credentials = request(['email', 'password']);       
		 if(!Auth::attempt($credentials))
		return response()->json([
			'message' => 'Unauthorized'
		], 401);        $user = $request->user();       
		 $tokenResult = $user->createToken('Personal Access Token');
		$token = $tokenResult->token;        
		   
			  $token->save();        return response()->json([
				'access_token' => $tokenResult->accessToken,
				'token_type' => 'Bearer',
				'expires_at' => Carbon::parse(
					$tokenResult->token->expires_at
				)->toDateTimeString()
			]);
	}

      


      /*	$GetUserSubscription = UserSubscription::where('user_id',$request->id)->first();

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
