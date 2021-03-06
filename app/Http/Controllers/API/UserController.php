<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Http\Resources\API\UserResource;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;

	class UserController extends Controller 
{
    public $successStatus = 200;

    public function minibushello(Request $request)
    {
        $message = '***** Welcome to Minibus Registration API *****';
        return response()->json(['success' => $message], 
                $this-> successStatus);
    }
    
	/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(Request $request)
    { 
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        { 
            $user = Auth::user();   
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else
        {
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    
	/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this->successStatus); 
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }
}