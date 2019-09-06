<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Helpers\GlobalFunctions;
use App\Http\Requests\SaveCategoryRequest;
use Illuminate\Support\Str;

class ManageCategoriesController extends Controller
{
    public function getCategory($id)
    {
        $category = Category::find($id);
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
            if ($request->file('cover_file')->getMimeType() == 'image/svg')
            {
                $fileName = Str::random(40).'.svg';
                $category->cover = $request->file('cover_file')->storeAs('public/media/covers', $fileName);
            }
            else
            {
                $category->cover = $request->file('cover_file')->store('public/media/covers');
            }
            $category->is_cover = true;
        }
        if (json_decode($request->is_icon_change))
        {
            if ($category->is_icon)
            {
                Storage::delete($category->icon);
            }
            if ($request->file('icon_file')->getMimeType() == 'image/svg')
            {
                $fileName = Str::random(40).'.svg';
                $category->icon = $request->file('icon_file')->storeAs('public/media/covers', $fileName);
            }
            else
            {
                $category->icon = $request->file('icon_file')->store('public/media/covers');
            }
            $category->is_icon = true;
        }
        $category->save();
    }
}
