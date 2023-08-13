<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;

class TestimonialController extends Controller
{
    public function latest(): JsonResponse
    {
        $testimonials =  Testimonial::orderBy('created_at', 'desc')->get();

        return response()->json($testimonials);
    }
}
