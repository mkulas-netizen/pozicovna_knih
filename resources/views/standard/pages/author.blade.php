@extends('welcome')
@section('content')
    <div class="container-fluid">
        <div class="container h-100">
            <!-- PAGE TITLE -->
            <h2 class="text-center pt-4 text-muted">Books authors</h2>
            <div class="row mt-5">
            @if(count($authors) > 0)
                <!-- BUTTON ALL BOOKS -->
                    <div class="col-12">
                        <a href="{{ route( 'book.index')}}" class="btn btn-active text-center btn-outline-dark">
                            All books
                        </a>
                    </div>
                    <!-- All authors card -->
                    @foreach($authors as $author)
                        <div class="col-md-4">
                            <div class="div-box ">
                                <button type="button" data-toggle="modal"
                                        data-target="#removeAuthor"
                                        class="position-absolute btn btn-sm btn-danger m-2">
                                    X
                                </button>
                                <button type="button"
                                        id="js-edit-author"
                                        class="position-absolute ml-5  btn btn-sm btn-danger m-2">
                                    edit
                                </button>
                                <div class="user-img">
                                    <img src="{{ asset('img/avatar.png') }}" class="img-fluid" alt="avatar" width="">
                                </div>
                                <h3 id="js-edit-text-author-" data-text="{{ $author->id }}" class="user-name">{{ $author->authorFullName }}</h3>
                                <h4 class="designation">Writer</h4>
                                <div class="contact m-auto text-center p-2">
                                    <a href="{{ route( 'author.show', $author)}}"
                                       class="btn btn-active w-75 btn-dark">Author books</a>
                                </div>
                                <div class="profile-details">
                                    <ul>
                                        @if(count($author->book) > 0)
                                            @foreach($author->book->take(1) as $book)
                                                <li><a><i class="fas fa-home"></i>Example: {{ $book->title }}</a></li>
                                            @endforeach
                                            <li>
                                                <a><i class="fas fa-flag"></i>
                                                    We register {{ count($author->book) }} books .
                                                </a>
                                            </li>
                                            <li>
                                                <a><i class="fas fa-flag"></i>
                                                    Borrowed : {{ $author->book->where('is_borrowed',true)->count() }} books .
                                                </a>
                                            </li>
                                        @else
                                            <li><a><i class="fas fa-home"></i></a></li>
                                            <li><a><i class="fas fa-home"></i></a></li>
                                            <li><a><i class="fas fa-flag"></i>Create book please ... </a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @include('standard.components.delete_author_modal',$author)
                    @endforeach
                <!-- message authors if not exist -->
                @else
                    <div class="col-12 text-center">
                        <h2>Not exist authors</h2>
                        <a href="{{ url('seed') }}" class="btn btn-danger">Create seed test data</a>
                    </div>
            @endif
            <!-- add new authors card -->
                <div class="col-sm-6 col-md-4">
                    <div class="div-box">
                        <div class="user-img">
                            <img src="{{ asset('img/add.png') }}" class="img-fluid" alt="avatar" width="">
                        </div>
                        <h3 class="user-name">Author</h3>
                        <h4 class="designation">Add new</h4>
                        <div class="contact m-auto text-center p-2">
                            <a class="btn btn-active w-75 btn-success" data-toggle="modal"
                               data-target="#addAuthor">Create Author</a>
                        </div>
                        <div class="profile-details">
                            <ul>
                                <li><a><i class="fas fa-flag"></i>...</a></li>
                                <li><a><i class="fas fa-flag"></i>...</a></li>
                                <li><a><i class="fas fa-flag"></i>...</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end authors card -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div> <!-- end container-fluid -->
    @include('standard.components.create_author_modal')

    <script>
        $(document).ready(function (){

        });

    </script>
@endsection
