@extends('welcome')
@section('content')
    <div class="container-fluid">
        <div class="container h-100">
            <div class="row mt-5 d-flex  justify-content-center align-items-center h-100">
                @include('standard.components.migration_function')
                @if(Schema::hasTable('authors'))
                <div class="col-md-6 ">
                    <div class="card m-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ __('data.classic') }} </h5>
                            <p class="card-text text-center">{{ __('data.classic_message') }}</p>
                            <div class="text-center">
                                <a href="{{ route('author.index') }}" class="btn btn-primary">{{ __('data.go') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="card m-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ __('data.vue') }}</h5>
                            <p class="card-text text-center">{{ __('data.vue_message') }}</p>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary">{{ __('data.go') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

