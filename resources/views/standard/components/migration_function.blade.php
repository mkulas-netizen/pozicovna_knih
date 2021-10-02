<div class="col-12">
    <div class="row text-center m-auto p-5">
        <div class="col-md-12">
            @if(!Schema::hasTable('authors'))
            <a href="{{ url('migrate') }}" class="btn btn-sm btn-danger">Database migration</a>
            @else
                <h6 class="text-secondary text-center">The database already exists, it is not possible to perform the migration</h6>
                <a href="{{ url('drop') }}" class="btn btn-danger btn-sm">Drop datasbase ? </a>
            @endif
        </div>
    </div>
</div>
