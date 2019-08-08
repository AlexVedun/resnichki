<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Storage;
use App\Models\Offer;

class ManageOffersController extends Controller
{
    public function getOffers()
    {
        $user = Auth::user();
        $user->offers->load('details');
        $offers = $user->offers;
        foreach ($offers as $offer)
        {
            //$offer->cover = GlobalFunctions::ConvertImage2base64('//covers//'.$offer->cover);
            $offer->cover = env('APP_URL', false).Storage::url($offer->cover);
        }
        return $offers;
    }

    public function saveOffers(Request $request)
    {
        $offer = Offer::find($request->offer_id);
        $offer->title = $request->title;
        $offer->short_descr = $request->short_descr;
        $offer->category_id = $request->category_id;
        if (json_decode($request->is_cover_change))
        {
            $offer->cover = $request->file('cover_file')->store('public/media/covers');
        }
        $offer->save();
        //$path = $request->file('cover_file')->store('public/media/covers');
        //return env('APP_URL', false).Storage::url($path);
    }
}
