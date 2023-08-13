<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('rating', 'desc')->paginate(12);

        return view('admin.testimonial.index', compact('testimonials', ));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(TestimonialRequest $request)
    {
        Testimonial::create($request->validated());

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial created successfully');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.create', compact('testimonial'));
    }

    public function update(Testimonial $testimonial, TestimonialRequest $request)
    {
        $testimonial->update($request->validated());

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial updated successfully');
    }
}
