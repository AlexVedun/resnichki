<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function checkout()
    {
        return response()->json([
            'isLogin' => Auth::check(),
        ]);
    }

    public function getUser()
    {
        $user = Auth::user();
        $user['details'] = $user->details;
        return $user;
    }

    public function saveUserContacts(Request $request)
    {
        $user = Auth::user();
        $user->details->contact_name = $request->contact_name;
        $user->details->phone = $request->phone;
        $user->details->mobile_1 = $request->mobile_1;
        $user->details->mobile_2 = $request->mobile_2;
        $user->details->mobile_3 = $request->mobile_3;
        $user->details->viber = $request->viber;
        $user->details->whats_up = $request->whats_up;
        $user->details->telegram = $request->telegram;
        $user->details->skype = $request->skype;
        $user->details->vkontakte = $request->vkontakte;
        $user->details->web_site = $request->web_site;
        $user->details->instagram = $request->instagram;
        $user->details->save();
        //$user->save();
    }

    public function changeUserPassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $current_password = Auth::User()->password;
        $request_data = $request->all();

        if(Hash::check($request_data['current_password'], $current_password))
        {

            $user->password = Hash::make($request_data['new_password']);
            $user->save();

            return response()->json([
                'message' => 'Пароль изменён',
            ], 200);
        }
        else {
            return response()->json([
                'message' => 'Неверно введён текущий пароль!',
                'errors' => [
                    'current_password' => 'Неверно введён текущий пароль!',
                ],
            ], 400);
        }

    }
}
