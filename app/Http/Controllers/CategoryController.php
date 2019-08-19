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
            }
            else
            {
                //$item->cover = GlobalFunctions::ConvertImage2base64($item->cover);
                $item->cover = asset($item->cover);
            }
            //$item->cover = GlobalFunctions::ConvertImage2base64($category->cover);
            /* $image = public_path().'//covers//'.$category->cover;
            $imageData = base64_encode(file_get_contents($image));
            $item->cover = 'data: '.mime_content_type($image).';base64,'.$imageData; */
            //$item->cover = base64_encode(File::get(public_path().'//covers//'.$category->cover));
            $result->push($item);
        }
        return $result;
        //return Category::all();
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
        Category::create([
            'name' => $request->name,
            'cover' => $request->cover,
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
        $categoryName = Category::find($id)->name;
        $categoryOffers = Category::find($id)->offers;
        foreach ($categoryOffers as $offer) {
            if ($offer->is_cover)
            {
                $offer->cover = asset(Storage::url($offer->cover));
            }
            else
            {
                $offer->cover = GlobalFunctions::ConvertImage2base64('/covers/no_cover.png');
            }
            //$offer->cover = GlobalFunctions::ConvertImage2base64('//media//covers//'.$offer->cover);
        }
        return response()->json([
            'name' => $categoryName,
            'offers' => $categoryOffers,
        ]);
        //return Category::find($id)->offers;
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->cover = $request->cover;
        $category->save();
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
