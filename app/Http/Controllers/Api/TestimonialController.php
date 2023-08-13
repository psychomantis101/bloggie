<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function latest(Request $request): JsonResponse
    {
        $testimonials =  Testimonial::orderBy('created_at', 'desc')->limit($request->limit)->get();

        return response()->json($testimonials);
    }
}
