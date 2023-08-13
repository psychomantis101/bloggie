@extends('layouts.app', ['class' => 'bg-white'])

@section('content')
    <div class="header bg-gradient-primary py-3">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">
                            Testimonials
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        @foreach ($testimonials as $testimonial)
            <testimonial-card :testimonial="{{json_encode($testimonial)}}"></testimonial-card>
        @endforeach

        <div class="mt-6">
            {{ $testimonials->links() }}
        </div>
    </div>
    <latest-blogs :limit=9></latest-blogs>
@endsection
