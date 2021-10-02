
    <div class="col-12 text-center">
        <h4>{{ __('data.export_file') }}</h4>
    </div>
    <div class="col-4 text-center">
        <a href="{{ url('xlsx') }}" class="btn btn-sm btn-outline-dark">{{ __('data.export_file_author_xlsx') }}</a>
    </div>
    <div class="col-4 text-center">
        <a href="{{ url('localXml') }}" class="btn btn-sm btn-outline-dark">{{ __('data.export_data_xml_local') }}</a>
    </div>
    <div class="col-4 text-center">
        <a href="{{ url('publicXml') }}" class="btn btn-sm btn-outline-dark">{{ __('data.export_data_xml_public') }}</a>
    </div>
{{--    <div class="col-12 mt-5">--}}
{{--        <h4>{{ __('data.artisan') }}</h4>--}}
{{--    </div>--}}
