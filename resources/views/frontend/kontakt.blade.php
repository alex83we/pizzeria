@extends('frontend.layouts.frontend')

@section('title'){{ __('Contact') }}@endsection

@push('css')

@endpush

@section('content')
    <section class="p-0 pos-r">
        <div class="fullbg bg-pos-right">
            <div id="map" style="width: 100%; height: 100%;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1252.1167271004874!2d11.417995608339515!3d51.12260172839866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a4194221f7810d%3A0xd1bfbb2fa0941b21!2sButtst%C3%A4dter%20Imbiss!5e0!3m2!1sde!2sde!4v1617607801720!5m2!1sde!2sde" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" loading="lazy"></iframe>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-8">
                    <div class="py-7 pr-7 xs-pr-0">
                        <div class="heading-block">
                            <h2 class="text-uppercase solid-weight">Adresse</h2>
                            <span class="text-uppercase light-weight"></span>
                            <div class="line"></div>
                        </div>
                        <ul class="icon-list lead">
                            <li>
                                <span class="fas fa-map-marker-alt"></span>
                                <span>{{ $firma->straße . ', ' . $firma->plz . ' ' . $firma->ort }}</span>
                            </li>
                            <li>
                                <span class="fas fa-envelope"></span>
                                <span>{{ $firma->email }}</span>
                            </li>
                            <li>
                                <span class="fas fa-phone-alt"></span>
                                <span>{{ $firma->telefon }}</span>
                            </li>
                            <li>
                                <span class="fas fa-mobile-alt"></span>
                                <span>{{ $firma->mobil }}</span>
                            </li>
                        </ul>
                        <div class="social-icons animated color mt-3">
                            Öffnungszeiten:
                            <table>
                                @foreach ($oeffnungszeitens as $value)
                                    <tr>
                                        <td class="pr-2">{{ $value->wochentag }}</td>
                                        <td>{{ $value->von . ' - ' . $value->bis . ' Uhr' }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="social-icons animated color mt-3">
                            Lieferzeiten:
                            <table>
                                @foreach ($lieferzeitens as $value)
                                    <tr>
                                        <td class="pr-2">{{ $value->wochentag }}</td>
                                        <td>{{ $value->von . ' - ' . $value->bis . ' Uhr' }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <h4 class="text-uppercase solid-weight mt-5" style="font-size: 24px;">Nachricht an uns.</h4>
                        <h4 class="text-uppercase" style="font-size: 24px;">Bitte <strong style="color: red; font-weight: bolder;">NICHT</strong> für Bestellungen nutzen.</h4>
                        <p>* = Pflichtfeld</p>
                        <form method="POST" action="{{ route('frontend.kontakt.store') }}" role="form" id="kontaktformular">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name *" value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="E-Mail-Adresse *" value="{{ old('email') }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control @error('telefon') is-invalid @enderror" name="telefon" id="telefon" placeholder="Telefon *" value="{{ old('telefon') }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control @error('message') is-invalid @enderror" rows="3" name="message" id="message" placeholder="Nachricht *">{{ old('message') }}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="datenschutz" class="custom-control-input @error('datenschutz') is-invalid @enderror" id="datenschutz" value="1" @if(old('datenschutz')) checked @endif>
                                        <label class="custom-control-label" for="datenschutz">Mit dem Absenden des Kontaktformulars erkläre ich mich damit einverstanden, dass meine Daten zur Bearbeitung der Nachricht erhoben und verarbeitet werden.
                                        Die abgesendeten Daten werden nur zum Zweck der Bearbeitung Ihres Anliegens verarbeitet.
                                            (weitere Informationen und Hinweise zum Wiederruf Ihrer Einwilligung finden sie hier: <a href="./datenschutz" target="_blank">Datenschutzerklärung</a>).</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">Nachricht senden <i class="fas fa-arrows" aria-hidden="true"></i> </button>
                                </div>
                            </div>
                        </form>
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
