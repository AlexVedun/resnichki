<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $result = collect();
        foreach ($categories as $category) {
            $item = $category;
            if ($item->is_cover)
            {
                $item->cover = asset(Storage::url($item->cover));
                $item->icon = asset(Storage::url($item->icon));
            }
            else
            {
                $item->cover = asset($item->cover);
                $item->icon = asset($item->icon);
            }
            $result->push($item);
        }
        return $result;
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryName = Category::find($id)->name;
        $categoryOffers = Category::find($id)->offers;
        foreach ($categoryOffers as $offer) {
            if ($offer->is_cover)
            {
                $offer->cover = asset(Storage::url($offer->cover));
            }
            else
            {
                $offer->cover = asset('/covers/no_cover.png');
            }
        }
        return response()->json([
            'name' => $categoryName,
            'offers' => $categoryOffers,
        ]);
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
