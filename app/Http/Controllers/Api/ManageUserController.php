<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManageUserController extends Controller
{
    public function getUser()
    {
        $user = Auth::user();
        $user['details'] = $user->details;
        return $user;
    }

    public function saveUser($request)
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
        $user->save();
    }
}
