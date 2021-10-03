@extends('welcome')
@section('content')
    <div class="container-fluid">
        <div class="container mt-5">
            <!-- page title -->
            <h2 class="text-muted text-center">{{ __('data.author_books') }}</h2>
            <a href="{{ route('author.index') }}" class="btn btm-sm btn-secondary"><- {{ __('data.back') }}</a>
            <div class="row">
                <!-- all books card -->
                @if(count($books) > 0)
                    @foreach($books as $book)
                        <div class="my_card col-md-6 col-lg-4 mt-5 pb-5">
                            <div class="my_card card  m-auto  shadow-lg" style="width: 15rem;">
                                <div id="js-body" class="card-body">
                                    <div
                                        class="stuha @is_borrowed( $book->is_borrowed ) bg-dark-red @borrowed_else  bg-black @borrowed_end">
                                        <small>
                                            {{ Str::limit($book->title,25) }}
                                            @is_borrowed( $book->is_borrowed ) - -
                                                {{ __('data.borrowed') }}
                                            @borrowed_end
                                        </small>
                                    </div>
                                    <h5 id="js-card-title" class=" card-title w-130px">{{ $book->title }}</h5>
                                    <p class="card-text"> {{ $book->authorFullName }}</p>
                                    <div class="position-absolute p-3 mb-5 w-75 fixed-bottom">
                                        @is_borrowed($book->is_borrowed)
                                            @include('standard.components.book.borrowed_form_edit_status',['book' => $book,'btn_name' =>  __('data.give_back') ,'value' => 'return'])
                                        @borrowed_else
                                            @include('standard.components.book.borrowed_form_edit_status',['book' => $book,'btn_name' => __('data.borrowed'),'value' => 'borrowed'])
                                        @borrowed_end
                                    </div>
                                    <div class="position-absolute d-flex fixed-bottom p-3 mt-2">
                                        <button type="submit" class="btn btn-sm  btn-danger" data-toggle="modal"
                                                data-target="#exampleModal">{{ __('data.remove') }}
                                        </button>
                                        <button type="button" class="btn btn-sm btn-dark ml-2 js-edit" data-toggle="modal"
                                           data-target="#bookEdit{{ $book->id }}">{{ __('data.edit') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('standard.components.book.edit_book_modal',$book)
                        @include('standard.components.book.delete_book_modal',$book)
                    @endforeach
                @else
                    <div class="col-12">
                        <h2 class="text-center">{{ __('data.not_exist_book') }}</h2>
                    </div>
                @endif
            <!-- add books card -->
                @isset($author)
                    <div class="my_card col-md-6 col-lg-4 mt-5 pb-5">
                        <div class="card m-auto  shadow-lg" style="width: 15rem;">
                            <div class="card-body">
                                <h5 class="card-title w-130px">{{ __('data.add_new_book') }}</h5>
                                <p class="card-text"></p>
                                <div class="position-absolute fixed-bottom p-3">
                                    <a href="#" class="btn btn-success w-100" data-toggle="modal"
                                       data-target="#bookCreate">{{ __('data.add_book') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- container fluid -->

    @include('standard.components.book.add_book_modal',['author' => isset($author) ? $author : ''])

    <!-- paginate links -->
    <div class="d-flex justify-content-center">
        {!! $books->links('pagination::bootstrap-4',['limit::',5]) !!}
    </div>

@endsection
