@extends('errors.layout')

@section('content')
<div class="background">
    <div class="wrapper">
        <h1>403</h1>
        <h3>{{ __('User does not have any of the necessary access rights.') }}</h3>
        <div class="btn-mitte">
            <a href="/" class="btn btn-primary">
                {{ __('go back to the home page') }}
            </a>
        </div>
    </div>
</div>
@endsection