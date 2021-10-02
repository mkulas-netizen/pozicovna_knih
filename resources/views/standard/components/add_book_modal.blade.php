<!-- Modal -->
<div class="modal fade" id="bookCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('data.addBook') }}</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('book.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="form-label mr-4">{{ __('data.title') }}:</label>
                            <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror"
                                   required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="author" value="{{ $author }}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('data.close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('data.create_book') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
