<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\PracticeSchedule;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function articles(Request $request)
    {
        $articles = Article::orderBy('created_at', 'DESC')->paginate($request->limit);
        return ResponseFormatter::success($articles);
    }

    public function categoryArticles(Request $request)
    {
        $categoryArticle = CategoryArticle::orderBy('name', 'DESC')->paginate($request->limit);
        return ResponseFormatter::success($categoryArticle);
    }

    public function scheduleDoctor(Request $request)
    {
        $schedules = PracticeSchedule::where('user_id', $request->user()->id)->get();
        return ResponseFormatter::success($schedules);
    }

    public function listRegistration(Request $request)
    {
        $registrations = Registration::orderBy('urutan', 'DESC')->whereDate('date_regis', Carbon::now())->with('user', 'patient')->paginate($request->limit);
        foreach ($registrations as $item) {
            $item->patient->user;
            $item->patient->speciesPatient;
        }
        return ResponseFormatter::success($registrations);
    }

    public function deleteRegistration($id)
    {
        $registrations = Registration::where('id', $id)->first();
        $registrations->delete();
        return ResponseFormatter::success($registrations);
    }

    public function products(Request $request)
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate($request->limit);
        return ResponseFormatter::success($products);
    }

    public function categoryProduct(Request $request)
    {
        $productCategory = ProductCategory::orderBy('name', 'DESC')->paginate($request->limit);
        return ResponseFormatter::success($productCategory);
    }
}
