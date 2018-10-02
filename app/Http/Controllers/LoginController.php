<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    private $domainEventJson;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->domainEventJson = json_decode(file_get_contents(base_path().'\config\domainEvent.json'), true);
        $this->middleware('guest')->except('logout');
    }

    /**
     * The register handler
     *
     * @param Request $request
     */
    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:user|max:255',
            'password' => 'required',
        ]);
    }

    /**
     * To login on other websites
     *
     * @param Request $request
     */
    public function login(Request $request)
    {
        $validatedData = $this->validateLogin($request);

        // The data is valid
    }

    private function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * To login on main domain
     *
     * @param Request $request
     */
    public function loginMainDomain(Request $request)
    {
        $validatedData = $this->validateLogin($request);

        // The data is valid
        return 'loggedin';
    }

    public function renderLoginMainDomain()
    {
        return view('directevents.login');
    }

    public function renderLogin($domain)
    {
        // If session domainDetails aren't empty load it from the session
        if (session('domainDetails') !== null) {
            $domainDetails = session('domainDetails');
        // Check if domain exists in the json
        } else if (isset($this->domainEventJson[$domain])){
            // Domain exists so load the correct template
            $domainDetails = $this->domainEventJson[$domain];
            session('domainDetails', $domainDetails);
        } else {
            // Domain doesn't exist
            Log::error('domain ' . $domain . 'doesn\'t exists');
            abort(404);
        }

        $view = 'event_templates.'.$domainDetails['template'].'.login';

        if (\View::exists($view)) {
            // return the view that corresponds to the domain
            return view($view)->with(['domainDetails' => $domainDetails]);
        } else {
            Log::error('view ' . $view . ' couldn\'t be loaded');
            abort(404);
        }
    }

    public function getLogin()
    {
        if (\Auth::user()) {
            if (\Auth::user()->hasRole('administrator')) {
                return redirect('admin');
            } else if (\Auth::user()->hasRole('standhouder')) {
                return redirect('dashboard');
            }
        }
        return view('directevents.login');
    }

    public function logout()
    {
        if (\Auth::user()) {
            auth()->logout();
        }

        return redirect('/');
    }
}
