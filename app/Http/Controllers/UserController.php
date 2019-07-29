<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::find($request->id);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $user['details'] = $user->details;
        return $user;
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
        $user = User::find($id);
        $user->delete();
    }
}
