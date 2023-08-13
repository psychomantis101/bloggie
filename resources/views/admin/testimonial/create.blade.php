@extends('layouts.admin')

@section('content')
    <?php $now = Carbon\Carbon::now() ?>

    <div class="panel">
        <div class="header bg-primary pb-6 pt-5 pt-md-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Testimonials</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i
                                                class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('admin.testimonial.index') }}">Testimonials</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">New</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-neutral">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form
                            action="{{isset($testimonial) ? route('admin.testimonial.update', $testimonial) : route('admin.testimonial.store')}}"
                            method="POST" autocomplete="off">
                            @isset($testimonial)
                                @method('PATCH')
                            @endisset

                            {{ csrf_field() }}
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-3">{{isset($testimonial) ? 'Edit' : 'New'}} Testimonials</h3>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                @if(count($errors))
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label
                                        for="user_name"
                                        class="form-control-label"
                                    >
                                        User Name
                                    </label>
                                    {{-- if php8.0 was guaranteed, I could use nullsafe operator instead of the gross isset--}}
                                    <input
                                        id="user_name"
                                        class="form-control"
                                        name="user_name"
                                        placeholder="User Name"
                                        required
                                        type="text"
                                        value="{{ old('user_name') ?? (isset($testimonial) ? $testimonial->user_name ?? '' : '')  }}"
                                    />
                                </div>

                                <div class="form-group">
                                    <label
                                        for="message"
                                        class="form-control-label"
                                    >
                                        Message
                                    </label>
                                    <textarea
                                        id="message"
                                        class="form-control"
                                        name="message"
                                        required
                                        placeholder="message"
                                        rows="5"
                                        type="text"
                                    >{{ old('message') ?? (isset($testimonial) ? $testimonial->message ?? '' : '')  }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="rating"
                                        class="form-control-label"
                                    >
                                        Rating
                                    </label>
                                    <input
                                        id="rating"
                                        class="form-control"
                                        name="rating"
                                        placeholder="Rating"
                                        required
                                        type="number"
                                        min="0"
                                        max="5"
                                        value="{{ old('rating') ?? (isset($testimonial) ? $testimonial->rating ?? '' : '')  }}"
                                    />
                                </div>
                            </div>

                            <!-- Card footer -->
                            <div class="card-footer py-4 text-right">
                                <button
                                    class="btn btn-primary"
                                    type="submit"
                                >
                                    {{isset($testimonial) ? 'Update' : 'Create'}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


