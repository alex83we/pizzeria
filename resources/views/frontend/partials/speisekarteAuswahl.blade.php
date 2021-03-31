<div id="speisekarte-{{ $speisekarte->id }}" class="collapse">
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
                        <form id="{{ $speisekarte->id }}" action="{{ route('admin.speisekarte.store') }}" method="POST">
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
                                                    <input class="form-check-input" type="checkbox" name="beilage_{{ $speisekarte->id }}" id="ibeilage_{{ $speisekarte->id }}" value="mit Salami (+ 0,75 €)" data-name="" data-price="" data-preispickup="" data-sidedishid="{{ $speisekarte->id }}">
                                                    <span class="inline-beschreibung">
                                                    mit Salami
                                                        <span class="beilage-auswahl-preis">(+0,75 €)</span>
                                                    </span>
                                                </div>
                                                <span class="beilage-allergene-wrapper ml-auto">
                                                    <span class="text-mahlzeit-allergene" data-name="" alt="Weitere Produktinformationen" title="Weitere Produktinformationen" data-sidedish-id="{{ $speisekarte->id }}">Produktinfo</span>
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
                                        <div class="input-group-text btn-nummer" id="minus-btn" data-type="minus" data-field="ibeilage_[{{ $speisekarte->id }}]">
                                            <i class="fas fa-minus"></i></div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center eingabe-nummer" name="beilage" id="ibeilage_[{{ $speisekarte->id }}]" value="@if (old('anzahl') == true){{ old('anzahl') }}@else{{ 1 }}@endif" min="1" max="100">

                                    <div class="input-group-append">
                                        <div class="input-group-text btn-nummer" id="plus-btn" data-type="plus" data-field="ibeilage_[{{ $speisekarte->id }}]">
                                            <i class="fas fa-plus"></i></div>
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