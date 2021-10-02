<div class="col-12">
    <div class="row text-center m-auto p-5">
        <div class="col-md-12">
            @if(!Schema::hasTable('authors'))
            <a href="{{ url('migrate') }}" class="btn btn-sm btn-danger">{{ __('data.db_migrate') }}</a>
            @else
                <h6 class="text-secondary text-center">{{ __('data.db_migrate_message') }}</h6>
                <a href="{{ url('drop') }}" class="btn btn-danger btn-sm">{{ __('data.db_drop') }} </a>
            @endif
        </div>
    </div>
</div>
