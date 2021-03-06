@php
    $firma = \App\Models\Admin\Firma::first();
    $oeffnungszeiten = \App\Models\Admin\Oeffnungszeiten::all();
    $lieferzeiten = \App\Models\Admin\Lieferzeiten::all();
@endphp
<header class="main-header">
    <div class="topbar">
        <div class="container">
            <i class="fas fa-history"></i> Öffnungszeiten: @foreach($oeffnungszeiten as $data) @if($data->id == 1){{ $data->wochentag . ' ' . $data->von . ' - ' . $data->bis }}@endif @if($data->id == 2){{ '& ' . $data->wochentag . ' ' . $data->von . ' - ' . $data->bis . ' Uhr' }}@endif @endforeach
            <span><i class="fa fa-phone"></i> <a href="tel:{{ str_replace(' - ', '', $firma->telefon) }}"> {{ $firma->telefon }}</a></span>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">{{ $firma->firmenname }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navigation" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('frontend.index') }}">Home</a>
                    <a class="nav-link {{ Request::is('speisekarte') ? 'active' : '' }}" href="{{ route('frontend.speisekarte.index') }}">Speisekarte</a>
                    <a class="nav-link {{ Request::is('lieferservice') ? 'active' : '' }}" href="{{ route('frontend.lieferservice.index') }}">Lieferservice</a>
                    <a class="nav-link {{ Request::is('kontakt') ? 'active' : '' }}" href="{{ route('frontend.kontakt.index') }}">Kontakt</a>
                    <div class="add-button nav-link" style="color: red !important; font-weight: bold;">Als App installieren</div>
                </div>
            </div>
        </div>
    </nav>
</header>