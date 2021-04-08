@extends('frontend.layouts.frontend')

@section('title'){{ __('Home') }}@endsection

@push('css')

@endpush

@section('content')
    <section id="masthead" class="masthead d-flex pb-5">
        <div class="container text-center text-white my-auto">
            <div class="hero-text">
                <h1>Ihr {{ $firma->firmenname }} in {{ $firma->ort }}</h1>
                <h2>100% Lecker</h2>
                <h3>Döner Burger Pizza.</h3>
                <h3>Ofenfrisch.</h3>
            </div>
        </div>
    </section>

    <!-- Vorstellung -->
    <section class="einleitung">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="einleitung__heading">
                        <h4>Guten Appetit</h4>
                        <h6>Wir freuen uns über ihren Besuch.</h6>
                    </div>
                    <p>Wir freuen uns sie auf unserer Homepage begrüßen zu dürfen und möchten Ihnen hier einen Überblick über unser Angebot geben.</p>
                </div>
                <div class="col-lg-4">
                    <div class="einleitung__zusatz">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 bd-highlight"><i class="fas fa-utensils"></i></div>
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <h5>Frische Zutaten</h5>
                                <p>Bei uns wird Täglich frisch eingekauft, so das sie immer Frische Zutaten erhalten.</p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight">
                            <div class="p-2 bd-highlight"><i class="fas fa-home"></i></div>
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <h5>Kurdische Spezialitäten</h5>
                                <p>Vom Pom Döner bis Pide erhalten sie bei uns, alles der kurdischen Küche.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="einleitung__zusatz">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 bd-highlight"><i class="fas fa-pizza-slice"></i></div>
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <h5>Lieferservice</h5>
                                <p>Wir beliefern sie Wochentags Mittags und am Wochenende, am Abend ab 17:00 Uhr.</p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight">
                            <div class="p-2 bd-highlight"><i class="fas fa-leaf"></i></div>
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <h5>Vergetarisch</h5>
                                <p>Auch für Vegetarier haben wir ein kleines Angebot.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lieferservice & Abholung -->
    <section class="p-0 pos-r">
        <div class="fullbg bg-right-pos" style="background-image: url(./images/Pizzaofen.webp)"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6 min-height">
                    <div class="py-7 pl-7 xs-py-3 xs-pl-0">
                        <div class="heading-block">
                            <span class="text-uppercase light-weight"></span>
                            <h2 class="text-uppercase solid-weight">Abholung</h2>
                            <div class="line"></div>
                        </div>
                        <p>Bei uns können sie ihre Speisen gerne abholen. Um Zeit zu sparen und für sie die Wartezeit zu minimieren, rufen sie einfach vorher an und Bestellen sie.</p>
                        <p>In der Regel können sie schon 30 Minuten später ihr Essen abholen.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="p-0 pos-r grey-bg">
        <div class="fullbg bg-pos-right" style="background-image: url(./images/lieferung.webp);"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 min-height">
                    <div class="py-7 pr-7 xs-pr-0 xs-py-3">
                        <div class="heading-block">
                            <span class="text-uppercase light-weight"></span>
                            <h2 class="text-uppercase solid-weight">Lieferung</h2>
                            <div class="line"></div>
                        </div>
                        <p>Wir beliefern sie von Dienstag – Samstag in der Zeit von @foreach($lieferzeiten as $data) @if($data->id == 1) {{ $data->von . ' - ' . $data->bis . ' Uhr' }} @endif @endforeach und von @foreach($lieferzeiten as $data) @if($data->id == 2) {{ $data->von . ' - ' . $data->bis . ' Uhr' }} @endif @endforeach und am Sonntag oder Feiertagen ab @foreach($lieferzeiten as $data) @if($data->id == 3) {{ $data->von . ' - ' . $data->bis . ' Uhr.' }} @endif @endforeach</p>
                        <p>In der Regel können sie schon, 30 Minuten später ihr Essen verzehren.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(false)
    <!-- Bistro -->
    <section class="Restaurant">
        <div class="container">
            <div class="Restaurant__bistro">
                <h3>Unser Bistro</h3>
                <h6>Herzlich Willkommen</h6>
                <div class="line"></div>
            </div>
            <div class="owl-carousel owl-theme c-theme owl-loaded Restaurant__carousel" data-items="4" data-sm-items="3" data-xs-items="2" data-nav-arrow="false" data-nav-dots="true" data-space="30">
                <div> <img src="https://via.placeholder.com/263x467/?text=1"> </div>
                <div> <img src="https://via.placeholder.com/263x467/?text=2"> </div>
                <div> <img src="https://via.placeholder.com/263x467/?text=3"> </div>
                <div> <img src="https://via.placeholder.com/263x467/?text=4"> </div>
                <div> <img src="https://via.placeholder.com/263x467/?text=5"> </div>
                <div> <img src="https://via.placeholder.com/263x467/?text=6"> </div>
                <div> <img src="https://via.placeholder.com/263x467/?text=7"> </div>
            </div>
            <div class="Restaurant__button">
                <div class="d-grid col-md-6 col-lg-4 mx-auto text-center">
                    <a class="btn btn-blue-dark" href="./files/Bistro_Buttstädt.pdf" download="Bistro_Buttstädt">Speisekarte als PDF</a>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection

@push('js')

@endpush

@push('scriptjs')

@endpush
