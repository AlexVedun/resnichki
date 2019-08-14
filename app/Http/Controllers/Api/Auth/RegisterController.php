<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Mail\NewUserLogin;
use App\User;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterFormRequest $request)
    {
        $password = str_random(8);
        $user = User::create(array_merge(
            $request->only('name', 'email', 'type', 'role'),
            ['password' => bcrypt($password)],
        ));

        Mail::to($request->email)->send(new NewUserLogin($request->email, $password));

        return response()->json([
            'message' => 'You were successfully registered. Use your email and password to sign in.'
        ], 200);
    }
}
