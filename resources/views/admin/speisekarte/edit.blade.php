@extends('admin.layout.admin')
@section('title'){{ __('Menu edit') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <!-- Zutaten -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Menu edit') }}</h3>
            <div class="card-tools">
                <div>
                    <a href="#" class="btn btn-success text-dark" data-toggle="modal" data-target="#speisekarteAddModal"> {{ __('Back') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('admin.speisekarte.update', $speisekarte->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="speisekarte_name">Gericht:</label>
                                <input type="text" name="speisekarte_name" class="form-control @error('speisekarte_name') is-invalid @enderror" placeholder="Gericht" id="speisekarte_name" value="{{ old('speisekarte_name', $speisekarte->speisekarte_name) }}">
                            </div>
                        </div>
                        <div class="col-lg-6"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="font-weight-bold">Zutaten:</label><br>
                                @foreach($zutaten as $zutat)

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('speisekarte_zutaten') is-invalid @enderror" type="checkbox" name="speisekarte_zutaten[]" id="{{ $zutat->zutat }}" value="{{ $zutat->id }}" @foreach($zutatens as $zutatdb) @if($zutatdb->zutaten_id == $zutat->id) checked @endif @endforeach>
                                        <label class="form-check-label" for="{{ $zutat->zutat }}">{{ $zutat->zutat }}</label>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="font-weight-bold">Kategorie:</label><br>
                                @foreach($categorie as $kategorie)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('speisekarte_kategorie') is-invalid @enderror" type="checkbox" name="speisekarte_kategorie" id="{{ $kategorie->kategorie }}" value="{{ $kategorie->id }}" @if($speisekarte->categories_id == $kategorie->id) checked @endif>
                                        <label class="form-check-label" for="{{ $kategorie->kategorie }}">{{ $kategorie->kategorie }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="speisekarte_basispreis">Grundpreis:</label>
                                <input type="number" step="0.10" name="speisekarte_basispreis" class="form-control @error('speisekarte_basispreis') is-invalid @enderror" placeholder="Grundpreis" id="speisekarte_basispreis" value="{{ old('speisekarte_basispreis', $speisekarte->speisekarte_basispreis) }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="speisekarte_basispreisabholung">Abholerpreis:</label>
                                <input type="number" step="0.10" name="speisekarte_basispreisabholung" class="form-control @error('speisekarte_basispreisabholung') is-invalid @enderror" placeholder="Abholerpreis nur eingeben falls abweichend vom Grundpreis" id="speisekarte_basispreisabholung" value="{{ old('speisekarte_basispreisabholung', $speisekarte->speisekarte_basispreisabholung) }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="speisekarte_basispreislieferung">Lieferpreis:</label>
                                <input type="number" step="0.10" name="speisekarte_basispreislieferung" class="form-control @error('speisekarte_basispreislieferung') is-invalid @enderror" placeholder="Lieferpreis nur eingeben falls abweichend vom Grundpreis" id="speisekarte_basispreislieferung" value="{{ old('speisekarte_basispreislieferung', $speisekarte->speisekarte_basispreislieferung) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="speisekarte_allergene">Allergene:</label>
                                <input type="text" name="speisekarte_allergene" class="form-control @error('speisekarte_allergene') is-invalid @enderror" placeholder="Allergene" id="speisekarte_allergene" value="{{ old('speisekarte_allergene', $speisekarte->speisekarte_allergene) }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="speisekarte_zusatzstoffe">Zusatzstoffe:</label>
                                <input type="text" name="speisekarte_zusatzstoffe" class="form-control @error('speisekarte_zusatzstoffe') is-invalid @enderror" placeholder="Zusatzstoffe" id="speisekarte_zusatzstoffe" value="{{ old('speisekarte_zusatzstoffe', $speisekarte->speisekarte_zusatzstoffe) }}">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Speichern</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('js')

@endpush