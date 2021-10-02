@extends('welcome')
@section('content')


    <div class="container-fluid">
        <div class="container h-100">
            <div class="row mt-5 d-flex  justify-content-center align-items-center h-100">
                <div class="col-md-6 ">
                    <div class="card m-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Display CLASSIC version </h5>
                            <p class="card-text text-center">Classic version of the book rental application.</p>
                            <div class="text-center">
                                <a href="{{ route('author.index') }}" class="btn btn-primary">Go application</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="card m-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Display VUE version</h5>
                            <p class="card-text text-center">Vue version of the app for renting books.</p>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary">Go application</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url('migrate') }}">Migration</a>
@endsection

