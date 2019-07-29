<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Auth::logout();
        /* $user = Auth::user();
        return $user; */
        if(Auth::check())
        {
            Auth::logout();
            return response()->json([
                'error' => false,
                'text' => 'Выход выполнен',
            ]);
        }
        else
        {
            return response()->json([
                'error' => true,
                'text' => '',
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user != null) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
            {
                return Auth::user();
                /* return response()->json([
                    'error' => false,
                    'text' => 'Вход выполнен',
                ]); */
            }
            else
            {
                return response()->json([
                    'error' => true,
                    'text' => 'Вход не выполнен',
                ]);
            }
            /* if(Hash::check($request->password, $user->password))
            {
                Auth::login($user);
                return Auth::user();
            }
            else
            {
                return response()->json([
                    'login' => false,
                    'text' => 'Неверный пароль',
                ]);
            } */
        }
        else
        {
            return response()->json([
                'login' => false,
                'text' => 'Пользователь не найден!',
            ]);
        }



        /* $user = Auth::user();
            $current_password = Auth::User()->password;
            $request_data = $request->all();

            if(Hash::check($request_data['current_password'], $current_password))
            {

                $user->password = Hash::make($request_data['new_password']);
                $user->save();

                $request->session()->flash('password_change_success', 'Пароль изменён');

                return redirect()->back();
            }
            else {

                $request->session()->flash('current_password_wrong', 'Неверно введён текущий пароль');

                return redirect()->back();
            }

        } else
        {
            return redirect()->to('/');
        } */

        //return Auth::loginUsingId();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
