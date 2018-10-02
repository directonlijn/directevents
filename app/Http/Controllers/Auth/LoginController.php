<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use GuzzleHttp\Exception\GuzzleException;
//use GuzzleHttp\Client;

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
    protected function redirectTo()
    {
        // Try to login user into other domains Not working :(
//        $domains = ['http://directevents.test'];
//        foreach ($domains as $domain) {
//            $client = new Client(); //GuzzleHttp\Client
//            $result = $client->post($domain.'/authUser', [
//                'form_params' => [
//                    'sessionId' => \Session::getId(),
//                    '_token' => csrf_token()
//                ]
//            ]);
//        }

        if (\Auth::user()->hasRole('administrator')) {
            return '/admin';
        } else if (\Auth::user()->hasRole('standhouder')) {
            $explodedUrl = explode('.',request()->getHost());

            $domain = count($explodedUrl) > 2 ? $explodedUrl[1] : $explodedUrl[0];

            if ($domain == 'directevents') {
                return '/dashboard';
            } else {
                return '/';
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
