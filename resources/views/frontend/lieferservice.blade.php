@extends('frontend.layouts.frontend')

@section('title'){{ __('Delivery Service') }}@endsection
@section('meta-description')Hier können sie unsere Liefergebiete einsehen. Und erhalten Informationen zu unserem Mindestbestellwerten für die außer Haus Lieferung.@endsection

@push('css')

@endpush

@section('content')
    <section class="lieferservice">
        <div class="container">
            <div class="title-lieferservice text-center">
                <h1>Lieferservice</h1>
                <div class="text">Liefergebiete und Mindestbestellwert:</div>
            </div>
            <div class="preis-tabs tabs-boxen">
                <div class="tab-content">
                    <div class="tab active-tab" id="liefergebiete">
                        <div class="content">
                            <div class="row clearfix">
                                <div class="preis-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="upper-box">
                                            <h1 class="title">Region 1</h1>
                                            <div class="preis">15,00 €</div>
                                        </div>
                                        <div class="lower-content">
                                            <ul class="preis-liste">
                                                <li>99628 Buttstädt</li>
                                                <li>99628 Teutleben</li>
                                                <li>99628 Mannstedt</li>
                                                <li>99628 Guthmannshausen</li>
                                                <li>99628 Rudersdorf</li>
                                                <li>99628 Hardisleben</li>
                                                <li>99628 Eßleben</li>
                                                <li>99510 Niederreißen</li>
                                                <li>99510 Oberreißen</li>
                                                <li>06647 Herrengosserstedt</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="preis-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="upper-box">
                                            <div class="title">Region 2</div>
                                            <div class="preis">20,00 €</div>
                                        </div>
                                        <div class="lower-content">
                                            <ul class="preis-liste">
                                                <li>99628 Olbersleben</li>
                                                <li>99628 Ellersleben</li>
                                                <li>99628 Großbrembach</li>
                                                <li>99510 Willerstedt</li>
                                                <li>99510 Nirmsdorf</li>
                                                <li>99518 Gebstedt</li>
                                                <li>99439 Buttelstedt</li>
                                                <li>99439 Nermsdorf</li>
                                                <li>99636 Rastenberg</li>
                                                <li>99636 Roldisleben</li>
                                                <li>06448 Millingsdorf</li>
                                                <li>06448 Tromsdorf</li>
                                                <li>06448 Burgholzhausen</li>
                                                <li>06448 Thüsdorf</li>
                                                <li>06447 Marienroda</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="preis-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="upper-box">
                                            <div class="title">Region 3</div>
                                            <div class="preis">25,00 €</div>
                                        </div>
                                        <div class="lower-content">
                                            <ul class="preis-liste">
                                                <li>99628 Kleinbrembach</li>
                                                <li>99439 Schwerstedt</li>
                                                <li>99439 Sachsenhausen</li>
                                                <li>99439 Großobringen</li>
                                                <li>99439 Krautheim</li>
                                                <li>99510 Leutenthal</li>
                                                <li>99510 Zottelstedt</li>
                                                <li>99510 Oßmannstedt</li>
                                                <li>99610 Vogelsberg</li>
                                                <li>99625 Großneuhausen</li>
                                                <li>99625 Kleinneuhausen</li>
                                                <li>99636 Bachra</li>
                                                <li>06647 Billroda</li>
                                                <li>06647 Finne</li>
                                                <li>06647 Kalbitz</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-8 offset-lg-2">
                                    <div class="row clearfix">
                                        <div class="preis-block col-lg-6 col-md-6 col-sm-12">
                                            <div class="inner-box">
                                                <div class="upper-box">
                                                    <div class="title">Region 4</div>
                                                    <div class="preis">30,00 €</div>
                                                </div>
                                                <div class="lower-content">
                                                    <ul class="preis-liste">
                                                        <li>06648 Lißdorf</li>
                                                        <li>06648 Eckartsberga</li>
                                                        <li>06647 Wallroda</li>
                                                        <li>06647 Schimmel</li>
                                                        <li>99636 Ostramonda</li>
                                                        <li>99439 Ramsla</li>
                                                        <li>99518 Auerstedt</li>
                                                        <li>99518 Rannstedt</li>
                                                        <li>99518 Ködderitzsch</li>
                                                        <li>99518 Wickerstedt</li>
                                                        <li>99510 Rohrbach</li>
                                                        <li>99510 Ulrichshalben</li>
                                                        <li>99510 Mattstedt</li>
                                                        <li>99510 Apolda</li>
                                                        <li>99510 Oberroßla</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preis-block col-lg-6 col-md-6 col-sm-12">
                                            <div class="inner-box">
                                                <div class="upper-box">
                                                    <div class="title">Region 5</div>
                                                    <div class="preis"><span>auf Anfrage</span></div>
                                                </div>
                                                <div class="lower-content">
                                                    <ul class="preis-liste">
                                                        <li>06628 Gernstedt</li>
                                                        <li>06628 Poppel</li>
                                                        <li>06642 Bucha</li>
                                                        <li>06642 Allerstedt</li>
                                                        <li>06642 Wohlmirstedt</li>
                                                        <li>06647 Kahlwinkel</li>
                                                        <li>06647 Steinbach</li>
                                                        <li>06647 Gößnitz</li>
                                                        <li>06647 Pleismar</li>
                                                        <li>06647 Klosterhäseler</li>
                                                        <li>06647 Bad Bibra</li>
                                                        <li>06647 Finneland</li>
                                                        <li>06647 Zeisdorf</li>
                                                        <li>99427 Schöndorf</li>
                                                        <li>99439 Thalborn</li>
                                                        <li>99439 Wohlsborn</li>
                                                        <li>99439 Heichelheim</li>
                                                        <li>99439 Ettersburg</li>
                                                        <li>99439 Ottmanshausen</li>
                                                        <li>99439 Neumark</li>
                                                        <li>99625 Kölleda</li>
                                                        <li>99625 Backleben</li>
                                                        <li>99518 Bad Sulza</li>
                                                        <li>99518 Niedertrebra</li>
                                                        <li>99518 Eberstedt</li>
                                                        <li>99518 Darnstedt</li>
                                                        <li>99518 Flurstedt</li>
                                                        <li>99510 Denstedt</li>
                                                        <li>99510 Rödigsdorf</li>
                                                        <li>99510 Obertrebra</li>
                                                        <li>99510 Heusdorf</li>
                                                        <li>99510 Utenbach</li>
                                                        <li>99510 Nauendorf</li>
                                                        <li>99625 Großmonra</li>
                                                        <li>99625 Battgendorf</li>
                                                        <li>99628 Burgwenden</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush

@push('scriptjs')

@endpush
