@extends('errors.layout')

@section('content')
<div class="background">
    <div class="wrapper">
        <h1>503</h1>
        <h3>{{ __('Service Temporarily Unavailable') }}</h3>
        <p>{{ __('The server is temporarily unable to service your request due to maintenance downtime or capacity problems. Please try again later.') }}</p>
        <div class="btn-mitte">
            <a href="/" class="btn btn-primary">
                {{ __('go back to the home page') }}
            </a>
        </div>
    </div>
</div>
@endsection