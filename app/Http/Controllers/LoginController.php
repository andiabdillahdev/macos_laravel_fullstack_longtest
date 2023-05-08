<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use Hash;
use Illuminate\Support\Facades\Auth;
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
}
