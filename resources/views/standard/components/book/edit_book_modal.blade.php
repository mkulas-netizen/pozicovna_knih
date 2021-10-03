<!-- Modal -->
<div class="modal fade" id="bookEdit{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('data.edit_book') }}</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('book.update',$book) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="form-label mr-4">{{ __('data.title') }}:</label>
                            <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror w-100"
                                   value="{{ $book->title }}"
                                   required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="author" value="{{ $book }}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('data.close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('data.book_update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
