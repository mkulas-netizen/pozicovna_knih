@extends('welcome')
@section('content')
    <div class="container-fluid">
        <div class="container h-100 pb-5">
            <!-- PAGE TITLE -->
            <h2 class="text-center pt-4 text-muted">{{ __('data.books_author') }}</h2>
            <div class="row mt-5">
            @if(count($authors) > 0)
                <!-- BUTTON ALL BOOKS -->
                    @include('standard.components.other_function')
                    <div class="col-12 mt-4">
                        <a href="{{ url( '/')}}" class="btn btn-active text-center btn-outline-dark">
                            {{ __('data.home') }}
                        </a>
                        <a href="{{ route( 'book.index')}}" class="btn btn-active text-center btn-outline-dark">
                            {{ __('data.all_books') }}
                        </a>
                    </div>
                    <!-- All authors card -->
                    @foreach($authors as $author)
                        <div class="col-md-4">
                            <div class="div-box ">
                                <button type="button" data-toggle="modal"
                                        data-target="#removeAuthor"
                                        class="position-absolute btn btn-sm btn-outline-danger m-2">
                                    X
                                </button>
                                <a id="js-edit-author"
                                   class="position-absolute ml-5  btn btn-sm btn-outline-info m-2" data-toggle="modal"
                                   data-target="#editAuthor_{{ $author->id }}">
                                    {{ __('data.edit') }}
                                </a>
                                <div class="user-img">
                                    <img src="{{ asset('img/avatar.png') }}" class="img-fluid" alt="avatar" width="">
                                </div>
                                <h3 id="js-edit-text-author" class="user-name">{{ $author->authorFullName }}</h3>
                                <h4 class="designation">{{ __('data.writer') }}</h4>
                                <div class="contact m-auto text-center p-2">
                                    <a href="{{ route( 'author.show', $author)}}"
                                       class="btn btn-active w-75 btn-dark">{{ __('data.books_author') }}</a>
                                </div>
                                <div class="profile-details">
                                    <ul>
                                        @if(count($author->book) > 0)
                                            @foreach($author->book->take(1) as $book)
                                                <li>
                                                    <a><i class="fas fa-home"></i>
                                                        {{ __('data.example') }}: {{ Str::limit($book->title,25) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a><i class="fas fa-flag"></i>
                                                    {{ __('data.we_register') }} {{ count($author->book) }} {{ __('data.books') }}.
                                                </a>
                                            </li>
                                            <li>
                                                <a><i class="fas fa-flag"></i>
                                                    {{ __('data.borrowed') }}
                                                    : {{ $author->book->where('is_borrowed',true)->count() }} {{ __('data.books') }}.
                                                </a>
                                            </li>
                                        @else
                                            <li><a><i class="fas fa-home"></i></a></li>
                                            <li><a><i class="fas fa-home"></i></a></li>
                                            <li><a><i class="fas fa-flag"></i>{{ __('data.create_books') }} </a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @include('standard.components.author.edit_author_modal',[ 'author' => $author])
                        @include('standard.components.author.delete_author_modal',$author)
                    @endforeach
                <!-- message authors if not exist -->
                @else
                    <div class="col-12 text-center">
                        <h2>{{ __('data.not_authors') }}</h2>
                        <a href="{{ url('seed') }}" class="btn btn-danger">{{ __('data.seed') }}</a>
                    </div>
            @endif
            <!-- add new authors card -->
                <div class="col-sm-6 col-md-4">
                    <div class="div-box">
                        <div class="user-img">
                            <img src="{{ asset('img/add.png') }}" class="img-fluid" alt="avatar" width="">
                        </div>
                        <h3 class="user-name">{{ __('data.author') }}</h3>
                        <h4 class="designation">{{ __('data.add_author') }}</h4>
                        <div class="contact m-auto text-center p-2">
                            <a class="btn btn-active w-75 btn-success" data-toggle="modal"
                               data-target="#addAuthor">{{ __('data.create_author') }}</a>
                        </div>
                        <div class="profile-details">
                            <ul>
                                <li>
                                    <a><i class="fas fa-flag"></i>
                                        {{  __('data.we_register') . ' ' .$books . ' '.  __('data.books') }}
                                    </a>
                                </li>
                                <li>
                                    <a><i class="fas fa-flag"></i>
                                        {{  __('data.borrowed') . ' ' . $book_count . ' ' . __('data.books') }}
                                    </a>
                                </li>
                                <li><a><i class="fas fa-flag"></i>...</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end authors card -->
            </div> <!-- end row -->
            <!-- paginate links -->
            <div class="d-flex justify-content-center">
                {!! $authors->links('pagination::bootstrap-4') !!}
            </div>
        </div> <!-- end container -->
    </div> <!-- end container-fluid -->
    @include('standard.components.author.create_author_modal')
@endsection
