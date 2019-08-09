<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\UserDetails;

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
        $userDetails = $user->details != null ? $user->details : new UserDetails();
        $userDetails->contact_name = $request->contact_name;
        $userDetails->phone = $request->phone;
        $userDetails->mobile_1 = $request->mobile_1;
        $userDetails->mobile_2 = $request->mobile_2;
        $userDetails->mobile_3 = $request->mobile_3;
        $userDetails->viber = $request->viber;
        $userDetails->whats_up = $request->whats_up;
        $userDetails->telegram = $request->telegram;
        $userDetails->skype = $request->skype;
        $userDetails->vkontakte = $request->vkontakte;
        $userDetails->web_site = $request->web_site;
        $userDetails->instagram = $request->instagram;
        $user->details()->save($userDetails);
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
