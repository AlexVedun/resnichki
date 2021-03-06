<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Storage;
use App\Models\Offer;
use App\Models\OfferDetails;
use function GuzzleHttp\json_decode;
use App\Models\OfferMedia;
use Illuminate\Support\Str;

class ManageOffersController extends Controller
{
    private function fixUrls($offer)
    {
        if ($offer->is_cover)
        {
            $offer->cover = asset(Storage::url($offer->cover));
        }
        else
        {
            $offer->cover = asset('/covers/no_cover.svg');
        }
        if ($offer->details != null)
        {
            foreach ($offer->details->offerMedia as $offerMedia)
            {
                $offerMedia->path_to_file = asset(Storage::url($offerMedia->path_to_file));
            }
        }
    }

    public function getOffers()
    {
        $user = Auth::user();
        $offers = Offer::with('details', 'details.offerMedia')->where('user_id', $user->id)->latest('updated_at')->get();
        foreach ($offers as $offer)
        {
            $this->fixUrls($offer);
        }
        return $offers;
    }

    public function getOffer($id)
    {
        $offer = Offer::with('details', 'details.offerMedia')->find($id);
        $this->fixUrls($offer);
        return $offer;
    }

    public function getAllOffers()
    {
        return Offer::with('category', 'user')->get()->all();
    }

    public function saveOffers(Request $request)
    {
        $isCreate = false;
        $offer = null;
        if ($request->offer_id != 0)
        {
            $offer = Offer::find($request->offer_id);
        }
        else
        {
            $offer = Offer::create();
            $isCreate = true;
        }
        //$offer = $request->offer_id != 0 ? Offer::find($request->offer_id) : Offer::create();
        $offerDetails = $offer->details != null ? $offer->details : new OfferDetails();
        $offer->title = $request->title;
        $offer->short_descr = $request->short_descr;
        $offer->category_id = $request->category_id;
        $offerDetails->description = $request->description;
        $offer->details()->save($offerDetails);
        if (json_decode($request->is_cover_change))
        {
            if ($request->file('cover_file') != null)
            {
                if ($offer->is_cover)
                {
                    Storage::delete($offer->cover);
                }
                if ($request->file('cover_file')->getMimeType() == 'image/svg')
                {
                    $fileName = Str::random(40).'.svg';
                    $offer->cover = $request->file('cover_file')->storeAs('public/media/covers', $fileName);
                }
                else
                {
                    $offer->cover = $request->file('cover_file')->store('public/media/covers');
                }
                $offer->is_cover = true;
            }
        }
        if (json_decode($request->is_photo_add))
        {
            for ($i=0; $i < $request->photo_count; $i++) {
                $pathForDb = '';
                if ($request->file('photo'.$i) != null)
                {
                    if ($request->file('photo'.$i)->getMimeType() == 'image/svg')
                    {
                        $fileName = Str::random(40).'.svg';
                        $pathForDb = $request->file('photo'.$i)->storeAs('public/media/photo', $fileName);
                    }
                    else
                    {
                        $pathForDb = $request->file('photo'.$i)->store('public/media/photo');
                    }
                    $offerMedia = OfferMedia::create([
                        'type' => 'photo',
                        'path_to_file' => $pathForDb,
                    ]);
                    $offerDetails->offerMedia()->save($offerMedia);
                }
            }
        }
        if (json_decode($request->is_video_add))
        {
            for ($i=0; $i < $request->video_count; $i++) {
                if ($request->file('video'.$i) != null)
                {
                    $offerMedia = OfferMedia::create([
                        'type' => 'video',
                        'path_to_file' => $request->file('video'.$i)->store('public/media/video'),
                    ]);
                    $offerDetails->offerMedia()->save($offerMedia);
                }
            }
        }
        if (json_decode($request->is_audio_add))
        {
            for ($i=0; $i < $request->audio_count; $i++) {
                if ($request->file('audio'.$i) != null)
                {
                    $offerMedia = OfferMedia::create([
                        'type' => 'audio',
                        'path_to_file' => $request->file('audio'.$i)->store('public/media/audio'),
                    ]);
                    $offerDetails->offerMedia()->save($offerMedia);
                }
            }
        }
        $offer->details()->save($offerDetails);
        Auth::user()->offers()->save($offer);
        $offer->news()->create([
            'user_id' => Auth::id(),
            'status' => $isCreate ? 'new' : 'update',
            'news' => $offer->title,
        ]);
        $offer->load('details.offerMedia');
        $this->fixUrls($offer);
        return $offer;
    }

    public function deleteMedia($id)
    {
        $offerMedia = OfferMedia::find($id);
        Storage::delete($offerMedia->path_to_file);
        $offerMedia->delete();
    }

    public function deleteOffer($id)
    {
        $offer = Offer::with('details', 'details.offerMedia')->find($id);
        Storage::delete($offer->cover);
        foreach ($offer->details->offerMedia as $item) {
            Storage::delete($item->path_to_file);
        }
        $offer->delete();
    }
}
