<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Helpers\GlobalFunctions;
use App\Models\Offer;
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
        foreach ($categories as $category) {
            if ($category->is_cover)
            {
                $category->cover = asset(Storage::url($category->cover));
                $category->icon = asset(Storage::url($category->icon));
            }
            else
            {
                $category->cover = asset($category->cover);
                $category->icon = asset($category->icon);
            }
        }
        return $categories;
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
        $categoryOffers = Offer::where('category_id', $id)->latest('updated_at')->get();
        foreach ($categoryOffers as $offer) {
            if ($offer->is_cover)
            {
                $offer->cover = asset(Storage::url($offer->cover));
            }
            else
            {
                $offer->cover = asset('/covers/no_cover.svg');
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
