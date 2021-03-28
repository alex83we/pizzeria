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
                            <div class="speisekarte__mahlzeiten-gruppe menu-mahlzeiten-gruppe-beliebt" id="0">
                                <div class="speisekarte__mahlzeiten-gruppe-kategorie">
                                    <div class="speisekarte__kategorie-inhalt speisekarte__kategorie-hat-bild">
                                        <div class="speisekarte__kategorie-name">
                                            123
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($category as $kategorie)
                                <div class="speisekarte__mahlzeiten-gruppe" id="{{ $kategorie->id }}" anchor-id="{{ $kategorie->slug }}">
                                    <div class="speisekarte__mahlzeiten-gruppe-kategorie">
                                        <div class="lazy speisekarte__kategorie-bilder-container" data-bg="{{ Storage::disk('public')->url('images/kategorie/'.$kategorie->images) }}" data-was-processed="true" style="background-image: url('{{ Storage::disk('public')->url('images/kategorie/'.$kategorie->images) }}')"></div>
                                        <div class="speisekarte__kategorie-inhalt">
                                            <div class="speisekarte__kategorie-name">
                                                {{ $kategorie->kategorie }}
                                            </div>
                                            <div class="speisekarte__kategorie-zeitliche-beschraenkung">
                                                <i class="fas fa-clock"></i>
                                                Achtung: Alle Produkte in dieser Kategorie können nur von: 17:00 bis 20:00 geliefert werden.
                                            </div>
                                            <div class="speisekarte__kategorie-beschreibung js-content-toggle">
                                                456
                                            </div>
                                        </div>
                                    </div>

                                    <div class="speisekarte__mahlzeiten">
                                        <div class="mahlzeiten-container js-mahlzeiten-container" id="">
                                            <div class="js-mahlzeit-item" itemscope itemtype="http://schema.org/Product">
                                                <div class="mahlzeit__wrapper">
                                                    <div class="mahlzeit__beschreibung-texte">
{{--                                                    <a href="#speisekarte-{{ $kategorie->id }}" class="mahlzeit__beschreibung-texte" role="button" id="{{ $kategorie->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="speisekarte-{{ $kategorie->id }}">--}}
                                                    <span class="mahlzeit-name" itemprop="name">
                                                        <span class="notranslate" data-product-name="{{ $kategorie->title }}">{{ $kategorie->title }}</span>
                                                        <button class="btn btn-link js-produkt-allergene text-mahlzeit-allergene" title="Weitere Produktinformationen" data-id="{{ $kategorie->id }}" data-name="{{ $kategorie->name }}">Produktinfo</button>
                                                    </span>
                                                        <div class="mahlzeit__beschreibung-zusaetzliche-information" itemprop="description">
                                                            {{ $kategorie->kategorie }}
                                                        </div>
                                                        <span class="auswahl-preis">
                                                    <div class="mahlzeit__beschreibung-waehle-aus">
                                                        {{ 'Wahl aus: ' . $kategorie->slug }}
                                                    </div>
                                                    <div itemprop="price" class="mahlzeit__preis">4,50 €</div>
                                                    </span>
{{--                                                    </a>--}}
                                                    </div>
                                                </div>
                                                <div id="speisekarte-{{ $kategorie->id }}" class="collapse">
                                                    <div class="mahlzeit">
                                                        <div class="beilagen-ausklappen">
                                                            <div class="innen">
                                                                <div class="beilage-inhalt">
                                                                    <div class="beilagen groessenauswahl">
                                                                        <div class="beilage">
                                                                            <h3>Döner Kebab</h3>
                                                                            <span class="auswahl-eingabe">
                                                                            <select name="groessenauswahl" id="igroessenauswahl" class="form-control">
                                                                                <option data-price="" data-id="" value="">&#8709 28cm: 7,50 €</option>
                                                                            </select>
                                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="beilagen-fromular-container">
                                                                        <form id="{{ $kategorie->id }}" action="{{ route('admin.speisekarte.store') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="action" value="hinzufuegen">
                                                                            <input type="hidden" name="menucat" value="kategorieID">
                                                                            <input type="hidden" name="produkt" value="productID">
                                                                            <input type="hidden" name="produktname" value="produktName">
                                                                            <input type="hidden" name="basispreis" value="basisPreis">
                                                                            <input type="hidden" name="basispreislieferung" value="basisPreisLieferung">
                                                                            <input type="hidden" name="lieferkosten" value="lieferkosten">
                                                                            <input type="hidden" name="rest" value="rest">
                                                                            <input type="hidden" name="produktpreis" value="ProduktPreis">
                                                                            <div class="beilagen">
                                                                                <div class="beilage beilage-kontrollkaestchengruppe">
                                                                                    <h3>Ihre Extras:</h3>
                                                                                    <!-- foreach() schleife -->
                                                                                    <div class="beilage-kontrollkaestchen">
                                                                                        <div class="kontrollkaestchen-inline">
                                                                                            <div class="d-flex">
                                                                                                <div class="form-check">
                                                                                                    <input class="form-check-input" type="checkbox" name="beilage_{{ $kategorie->id }}" id="ibeilage_{{ $kategorie->id }}" value="mit Salami (+ 0,75 €)" data-name="" data-price="" data-preispickup="" data-sidedishid="{{ $kategorie->id }}">
                                                                                                    <span class="inline-beschreibung">
                                                                                                    mit Salami
                                                                                                        <span class="beilage-auswahl-preis">(+0,75 €)</span>
                                                                                                    </span>
                                                                                                </div>
                                                                                                <span class="beilage-allergene-wrapper ml-auto">
                                                                                                    <span class="text-mahlzeit-allergene" data-name="" alt="Weitere Produktinformationen" title="Weitere Produktinformationen" data-sidedish-id="{{ $kategorie->id }}">Produktinfo</span>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- end foreach schleife -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="beilage-footer">
                                                                                <div class="menu-preis input-group input-group-sm">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text btn-nummer" id="minus-btn" data-type="minus" data-field="ibeilage_[{{ $kategorie->id }}]"><i class="fas fa-minus"></i></div>
                                                                                    </div>
                                                                                    <input type="text" class="form-control form-control-sm text-center eingabe-nummer" name="beilage" id="ibeilage_[{{ $kategorie->id }}]" value="@if (old('anzahl') == true){{ old('anzahl') }}@else{{ 1 }}@endif" min="1" max="100">

                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text btn-nummer" id="plus-btn" data-type="plus" data-field="ibeilage_[{{ $kategorie->id }}]"><i class="fas fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="beilagen-hinzufuegen-button mahlzeit-hinzufuegen-btn-wapper d-grid">
                                                                                    <button class="btn btn-blue-light btn-block" type="submit">
                                                                                    <span class="button-hinzufuegen-value">
                                                                                        <h3>3,58 €</h3>
                                                                                    </span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
