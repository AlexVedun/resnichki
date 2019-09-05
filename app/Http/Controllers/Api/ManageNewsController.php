<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class ManageNewsController extends Controller
{
    public function addAdminNews(Request $request)
    {
        Auth::user()->news()->create([
            'news' => $request->news,
            'status' => 'admin',
        ]);
    }
}
