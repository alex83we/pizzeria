@extends('errors.layout')

@section('content')
<div class="background">
    <div class="wrapper">
        <h1>404</h1>
        <h3>{{ __('Not Found') }}</h3>
        <p>{{ __('They have broken our site! :-)') }}</p>
        <div class="btn-mitte">
            <a href="/" class="btn btn-primary">
                {{ __('go back to the home page') }}
            </a>
        </div>
    </div>
</div>
@endsection