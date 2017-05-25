<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function setAppToken(Request $request) {
        $user = User::where('email', $request->input('phone'))
            ->update('app_token', $request->input('token'));
        $user = User::where('email', $request->input('phone'))->first();

        $prescriptions = [];

        if ($user['usertype'] == 'pharmacy') {
            $prescriptions = Prescription::getByPharmacy($request->input('phone'));
        } elseif ($user['usertype'] == 'doctor') {
            $prescriptions = Prescription::getByDoctor($request->input('phone'));
        }

        if($user != null){
            return json_encode([
                'usertype' => $user['usetype'],
                'prescriptions' =>  $prescriptions ,
            ]);
        } else {
            return json_encode([
                'usertype' => null,
                'prescriptions' =>  null ,
            ]);
        }
        
    }
}
