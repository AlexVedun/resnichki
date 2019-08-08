<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GlobalFunctions;

class ManageOffersController extends Controller
{
    public function getOffers()
    {
        $user = Auth::user();
        $user->offers->load('details');
        $offers = $user->offers;
        foreach ($offers as $offer)
        {
            $offer->cover = GlobalFunctions::ConvertImage2base64('//media//covers//'.$offer->cover);
        }
        return $offers;
    }

    public function saveOffer(Request $request)
    {
        $path = $request->file('cover_file')->store('media/covers');
        return $path;
    }
}
