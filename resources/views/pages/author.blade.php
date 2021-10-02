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

                            <div class="div-box">
                                <form method="post" action="{{ route('author.destroy',$author) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="position-absolute btn btn-sm btn-danger m-2">X</button>
                                </form>
                                <div class="user-img">
                                    <img src="{{ asset('img/avatar.png') }}" class="img-fluid" alt="avatar" width="">
                                </div>
                                <h3 class="user-name">{{ $author->name }} {{ $author->surname }}</h3>
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
                    @endforeach
                <!-- message authors if not exist -->
                @else
                    <div class="col-12 text-center">
                        <h2>Not exist authors</h2>
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

    <!-- Modal -->
    <div class="modal fade" id="addAuthor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new author</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('author.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label mr-4">Name:</label>
                            <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror"
                                   required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="surname" class="form-label mr-1">Surname:</label>
                            <input type="text" name="surname" id="surname"
                                   class="@error('surname') is-invalid @enderror" required>

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add author</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
