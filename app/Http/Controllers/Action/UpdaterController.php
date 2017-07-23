<?php

namespace App\Http\Controllers\Action;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class UpdaterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Update user Password.
     *
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'current' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $validator->currentRequest = $request;

        $validator->after(function($validator){
            if(!Hash::check($validator->currentRequest->current, user()->password)){
                $validator->errors()->add('current', 'The password entered did not match your current password.');
            }
        });

        if ($validator->fails()) {
            return Redirect::to(URL::previous() . "#account_settings")
                ->withErrors($validator)
                ->withInput();
        }

        user()->update([
            "password" => bcrypt($request->password),
        ]);

        return Redirect::to(URL::previous() . "#account_settings");
    }

    /**
     * Update user profile attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users,email,'.user()->id,
            'phone' => 'nullable|min:9|max:10|unique:users,phone,'.user()->id,
        ]);

        if ($validator->fails()) {
            return Redirect::to(URL::previous() . "#account_settings")
                ->withErrors($validator)
                ->withInput();
        }

        user()->update([
            "email" => $request->email,
            "phone" => $request->phone,
        ]);

        return Redirect::to(URL::previous() . "#account_settings");
    }
}