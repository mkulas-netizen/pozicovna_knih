@extends('welcome')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                @foreach($authors as $author)
                <div class="col-sm-6 col-md-4">
                    <div class="div-box">
                        <div class="user-img">
                            <img src="{{ asset('img/avatar.png') }}" class="img-fluid" alt="avatar" width="">
                        </div>
                        <h3 class="user-name">{{ $author->name }} {{ $author->surname }}</h3>
                        <h4 class="designation">Writer</h4>
                        <div class="contact-btn">
                            <button type="button" class="btn btn-success">Follow</button>
                            <button type="button" class="btn btn-secondary">Message</button>
                        </div>
                        <div class="profile-details">
                            <ul>
                                @foreach($author->book->take(2) as $book)
                                <li><a><i class="fas fa-home"></i>{{ $book->title }}</a></li>
                                @endforeach
                                <li><a><i class="fas fa-flag"></i>And others ... </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
