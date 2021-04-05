@extends('errors.layout')

@section('content')
<div class="background">
    <div class="wrapper">
        <h1>503</h1>
        <h3>{{ __('Service unavailable') }}</h3>
        <p>{{ __('Sorry the page you are looking for currently not found, please check the URL and then refresh your browser.') }}</p>
        <div class="btn-mitte">
            <a href="/" class="btn btn-primary">
                {{ __('go back to the home page') }}
            </a>
        </div>
    </div>
</div>
@endsection