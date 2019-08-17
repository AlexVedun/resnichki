<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Helpers\GlobalFunctions;
use App\Http\Requests\SaveCategoryRequest;

class ManageCategoriesController extends Controller
{
    public function getCategory($id)
    {
        $category = Category::find($id);
        if ($category->is_cover)
        {
            $category->cover = asset(Storage::url($category->cover));
        }
        else
        {
            $category->cover = GlobalFunctions::ConvertImage2base64($category->cover/* '/covers/no_cover.png' */);
        }
        return $category;
    }

    public function saveCategory(SaveCategoryRequest $request)
    {
        $category = $request->category_id !=0 ? Category::find($request->category_id) : Category::create();
        $category->name = $request->name;

        if (json_decode($request->is_cover_change))
        {
            if ($category->is_cover)
            {
                Storage::delete($category->cover);
            }
            $category->cover = $request->file('cover_file')->store('public/media/covers');
            $category->is_cover = true;
        }
        $category->save();
    }
}
