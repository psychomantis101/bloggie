@extends('layouts.admin', ['class' => 'bg-white'])

@section('content')
    <div class="panel">
        <div class="header bg-primary pb-6 pt-5 pt-md-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Testimonials</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-sm btn-neutral">New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <p class="mb-0">{{ session('success') }}</p>
            </div>
        @endif

        <div class="table-responsive" style="overflow-y: hidden">
            @if(count($testimonials))
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Comment</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($testimonials as $testimonial)
                        <tr>
                            <td><testimonial-card :testimonial="{{json_encode($testimonial)}}"></testimonial-card></td>

                            <td><a href="{{ route('admin.testimonial.edit', $testimonial) }}" class="btn btn-primary btn-simple btn-round">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No current testimonials</p>
            @endif
        </div>
        <div class="card-footer py-4">
            {{ $testimonials->links() }}
        </div>
        </div>
    </div>

@endsection
