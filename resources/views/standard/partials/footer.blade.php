<div class="container m-auto">
    <div class="row">
        <div class="col-md-12 text-center mt-5 ">
            @foreach(Config::get('language') as $lang => $language)
                <a href="{{ url('lang',$lang) }}" class="btn btn-link">
                    @if($lang == App::getLocale())
                        <strong>{{ $language }}</strong>
                    @else
                        {{ $language }}
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</div>
@stack('js')
<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
