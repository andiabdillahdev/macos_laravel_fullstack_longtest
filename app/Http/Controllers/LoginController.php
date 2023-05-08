<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\BaseController as BaseController;
class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();
        if(Auth::validate($credentials) == false):
            return redirect()->to('login')
                ->withErrors(trans('auth'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);
        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user) 
    {
        if($user->role == 'admin'){
            return redirect()->intended('dashboard-admin');
        }else {
            return redirect()->intended('dashboard-user');
        } 
    }


     public function logout(Request $request){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
