@extends('frontend.layouts.frontend')

@section('title'){{ __('Menu') }}@endsection

@push('css')

@endpush

@section('content')
    <main class="js-speisekarte-haupt-container speisekarte-haupt">
        <div id="main" class="inhaltsliste speisekarte-liste">
            <div class="menu-speisekarte js-pizzeria-speisekarte">
                <div id="speisekarte-tab-content" class="speisekarte-mahlzeiten back-link__grid-container has-imprint">
                    <div class="js-menu-kategorie-bar-sticky">
                        <div class="menu-kategorie-bar-container">
                            <div class="menu-kategorie-bar container">
                                {{--<div class="menu-kategorie-suche">
                                    <i class="icon-search js-menu-mahlzeit-suche-expand"></i>
                                    <div class="menu-mahlzeit-suche">
                                        <label class="menu-mahlzeit-suche-label">
                                            <input class="menu-mahlzeit-suche-input js-produkt-suche" type="text"
                                                   maxlength="25" placeholder="Suche nach Gerichten, usw...">
                                        </label>
                                        <button class="menu-mahlzeit-suche-close js-menu-mahlzeit-loesche-suche"
                                                tabindex="0"></button>
                                    </div>
                                </div>--}}
                                <div class="menu-kategorie-liste">
                                    <div class="swiper-container js-swiper">
                                        <div class="swiper-wrapper">
                                            @foreach($category as $key => $kategorie)
                                                <a href="{{ '#' . $kategorie->slug }}" data-category="{{ $kategorie->id
                                                }}" class="swiper-slide">{{ $kategorie->title }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="swipe-next">
                                    <i class="icon-ta-next-v2 swipe-next-button"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="speisekarte" id="ispeisekarte">
                        <div class="container">
                            <div class="kein_produkt_gefunden">
                                <i class="icon-ta-search-icon fa-3x text-secondary"></i>
                                <h3 class="kein_produkt_gefunden_text">Keine Produkte gefunden</h3>
                                <button class="reset-produkt-suche js-reset-produkt-filter">Suche zurücksetzen</button>
                            </div>
                            {{--<div class="speisekarte__mahlzeiten-gruppe menu-mahlzeiten-gruppe-beliebt" id="0">
                                <div class="speisekarte__mahlzeiten-gruppe-kategorie">
                                    <div class="speisekarte__kategorie-inhalt speisekarte__kategorie-hat-bild">
                                        <div class="speisekarte__kategorie-name">
                                            123
                                        </div>
                                    </div>
                                </div>
                            </div>--}}

                            @foreach($category as $key => $kategorie)
                                <div class="speisekarte__mahlzeiten-gruppe" id="{{ $kategorie->slug }}" anchor-id="{{ $kategorie->slug }}">
                                    <div class="speisekarte__mahlzeiten-gruppe-kategorie">
                                        <div class="lazy speisekarte__kategorie-bilder-container" data-bg="{{ Storage::disk('public')->url('images/kategorie/'.$kategorie->images) }}" data-was-processed="true" style="background-image: url('{{ Storage::disk('public')->url('images/kategorie/'.$kategorie->images) }}')"></div>
                                        <div class="speisekarte__kategorie-inhalt">
                                            <div class="speisekarte__kategorie-name">
                                                {{ $kategorie->title }}
                                            </div>
                                            @if(false)
                                            <div class="speisekarte__kategorie-zeitliche-beschraenkung">
                                                <i class="fas fa-clock"></i>
                                                Achtung: Alle Produkte in dieser Kategorie können nur von: 17:00 bis 20:00 geliefert werden.
                                            </div>
                                            @endif
                                            <div class="speisekarte__kategorie-beschreibung js-content-toggle">
                                                {{ $kategorie->description }}
                                            </div>
                                        </div>
                                    </div>

                                    @foreach($speisekarten as $speisekarte)
                                        @if($speisekarte->categories_id == $kategorie->id)
                                            <div class="speisekarte__mahlzeiten">
                                                <div class="mahlzeiten-container js-mahlzeiten-container" id="{{ $speisekarte->id }}">
                                                    <div class="js-mahlzeit-item" itemscope itemtype="http://schema.org/Offer">
                                                        <div class="mahlzeit__wrapper">
                                                            <div class="mahlzeit__beschreibung-texte">
{{--                                                                <a href="#speisekarte-{{ $speisekarte->id }}" class="mahlzeit__beschreibung-texte" role="button" id="{{ str_replace(' ', '_', $speisekarte->speisekarte_name) }}" data-toggle="collapse" aria-expanded="false" aria-controls="speisekarte-{{ $speisekarte->id }}">--}}
                                                                    <span class="mahlzeit-name" itemprop="name">
                                                                        <span class="notranslate" data-product-name="{{ str_replace(' ', '_', $speisekarte->speisekarte_name) }}">{{ $speisekarte->speisekarte_name }}</span>
                                                                        <button class="btn btn-link js-produkt-allergene text-mahlzeit-allergene" title="Weitere Produktinformationen" data-id="{{ $speisekarte->id }}" data-name="{{ str_replace(' ', '_', $speisekarte->speisekarte_name) }}">@if($speisekarte->speisekarte_zusatzstoffe == true){{ 'Zusatzstoffe: ' . $speisekarte->speisekarte_zusatzstoffe }}@endif @if($speisekarte->speisekarte_allergene == true){{ ' Allergene: ' .  $speisekarte->speisekarte_allergene }}@endif</button>
                                                                    </span>
                                                                    <div class="mahlzeit__beschreibung-zusaetzliche-information" itemprop="description">
                                                                        @foreach($speisekarte->zutatens as $zutat)
                                                                            <span>{{ $zutat->zutat }}</span>
                                                                        @endforeach
                                                                    </div>
                                                                    <span class="auswahl-preis">
                                                                        <div class="mahlzeit__beschreibung-waehle-aus">
                                                                            @if(false){{ 'Wahl aus: ' . $speisekarte->slug }}@endif
                                                                        </div>
                                                                        <div itemprop="price" content="{{ $speisekarte->speisekarte_basispreis }}" class="mahlzeit__preis">{{ $speisekarte->speisekarte_basispreis . ' €' }}</div>
                                                                    </span>
{{--                                                                </a>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <section id="speisekarte" class="speisekarte mb-4">
        <div class="container">
            <div class="row speisekarte__allergene">
                <div class="col-lg-12">
                    <div class="heading-block">
                        <span class="text-uppercase light-weight">Gut zu wissen.</span>
                        <h2 class="text-uppercase solid-weight">Zusatzstoffe und Allergene</h2>
                        <div class="line"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p class="mb-1">Allergene: </p>
                    <p>A = Gluten, B = enthält Krebstiere, C = enthält Eier, D = enthält Soja, E = enthält Fisch, G = enthält Milch, H = enthält Schalenfrüchte, I = enthält Sellerie, J = enthält Senf, S = enthält Sesam</p>
                    <p class="mb-1">Zusatzstoffe: </p>
                    <p>1 mit Farbstoff, 2 mit Konservierungsstoff, 3 mit Antioxidationsmittel, 4 mit Geschmacksverstärker, 6 gewachst, 10 mit Phosphat, 11 koffeinhaltig</p>
                </div>
            </div>
        </div>
    </section>

    <div class="smartbnr" id="smartbnr">
        <div class="smartbnr-wrapper">

        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
@endpush

@push('scriptjs')
    <script>
        $('.btn-nummer').click(function (e) {
            e.preventDefault();

            feldName    = $(this).attr('data-field');
            type        = $(this).attr('data-type');
            var input   = $("input[id='"+feldName+"']");
            var currentVar = parseInt(input.val());
            if (!isNaN(currentVar)) {
                if (type == 'minus') {
                    if (currentVar > input.attr('min')) {
                        input.val(currentVar - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabeld', true);
                    }
                } else if (type == 'plus') {
                    if (currentVar < input.attr('max')) {
                        input.val(currentVar + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabeld', true);
                    }
                }
            } else {
                input.val(0);
            }
        });
        $('.eingabe-nummer').focusin(function () {
            $(this).data('oldValue', $(this).val());
        });
        $('.eingabe-nummer').change(function () {
            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('id');
            if (valueCurrent >= minValue) {
                $(".btn-nummer[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Entschuldigung, der Mindestwert wurde erreicht');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-nummer[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Entschuldigung, der Maximalwert wurde erreicht');
                $(this).val($(this).data('oldValue'));
            }
        });
        $(".eingabe-nummer").keydown(function (e) {
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {
                return;
            }
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    </script>
@endpush
