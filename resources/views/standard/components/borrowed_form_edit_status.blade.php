<form method="post" action="{{ route('book.update',$book) }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="borrowed" value="{{ $value }}">
    <button type="submit" class="btn btn-sm btn-secondary w-75">{{ $btn_name }}</button>
</form>
