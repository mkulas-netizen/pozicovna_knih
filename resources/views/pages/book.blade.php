@extends('welcome')
@section('content')
    <div class="container-fluid">
        <div class="container mt-5">
            <!-- page title -->
            <h2 class="text-muted text-center">Author Books</h2>
            <div class="row">
                <!-- all books card -->
                @if(count($books) > 0)
                    @foreach($books as $book)
                        <div class="col-md-6 col-lg-4 mt-5 pb-5">
                            <div class="card m-auto  shadow-lg" style="width: 15rem;">
                                <div class="card-body">
                                    <div
                                        class="stuha @is_borrowed( $book->is_borrowed ) bg-dark-red @else  bg-black @endif">
                                        <small>
                                            {{ $book->title }} @is_borrowed( $book->is_borrowed ) - - Borrowed @endif
                                        </small>
                                    </div>
                                    <h5 class="card-title js-card-title w-130px">{{ $book->title }}</h5>
                                    <p class="card-text"> {{ $book->authorFullName }}</p>
                                    <div class="position-absolute p-3 mb-5 w-75 fixed-bottom">
                                        @is_borrowed($book->is_borrowed)
                                        @include('components.borrowed_form_edit_status',['book' => $book,'btn_name' => 'Give back','value' => 'return'])
                                    @else
                                        @include('components.borrowed_form_edit_status',['book' => $book,'btn_name' => 'Borrow','value' => 'borrowed'])
                                        @endif
                                    </div>
                                    <div class="position-absolute d-flex fixed-bottom p-3 mt-2">
                                        <button type="submit" class="btn btn-sm  btn-danger" data-toggle="modal"
                                                data-target="#exampleModal">Remove
                                        </button>
                                        <a href="#" class="btn btn-sm btn-dark ml-2 js-edit">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('components.delete_book_modal',$book)
                    @endforeach
                @else
                    <div class="col-12">
                        <h2 class="text-center">Not exist books</h2>
                    </div>
                @endif
            <!-- add books card -->
                <div class="col-md-6 col-lg-4 mt-5 pb-5">
                    <div class="card m-auto  shadow-lg" style="width: 15rem;">
                        <div class="card-body">
                            <h5 class="card-title w-130px">Add new book</h5>
                            <p class="card-text"></p>
                            <div class="position-absolute fixed-bottom p-3">
                                <a href="#" class="btn btn-success w-100" data-toggle="modal" data-target="#bookCreate">Add new book</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- container fluid -->

    @include('components.add_book_modal',['id' => isset($id) ? $id : ''])

    <!-- paginate links -->
    <div class="d-flex justify-content-center">
        {!! $books->links('pagination::bootstrap-4') !!}
    </div>

    <script>
        $('.js-edit').click(function (){

         var data =    $('h5.js-card-title').text();
         console.log(data);
        });
    </script>
@endsection
