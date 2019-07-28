<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
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
        $newOffer = Offer::create([
            'title' => $request->title,
            'short_descr' => $request->short_descr,
            'category_id' => $request->category_id,
            //'user_id' => User::id,
            'user_id' => 2,
            'cover' => $request->cover,
        ]);
        $newOffer->details()->create([
            'description' => $request->description,
            'is_video' => $request->is_video,
            'is_photo' => $request->is_photo,
            'is_audio' => $request->is_audio,
        ]);
        $newOffer->news()->create([
            'news' => $newOffer->title,
            'user_id' => $newOffer->user_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offer::find($id);
        $offer->details->load('offerMedia');
        $offer['details'] = $offer->details;
        return $offer;
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
        $offer = Offer::find($id);
        $offer->delete();
    }
}
