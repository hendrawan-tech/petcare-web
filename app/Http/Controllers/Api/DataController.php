<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\PracticeSchedule;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function articles(Request $request)
    {
        $articles = Article::orderBy('id', 'DESC')->paginate($request->limit);
        return ResponseFormatter::success($articles);
    }

    public function scheduleDoctor(Request $request)
    {
        $schedules = PracticeSchedule::where('user_id', $request->user()->id)->get();
        return ResponseFormatter::success($schedules);
    }
}
