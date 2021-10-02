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
