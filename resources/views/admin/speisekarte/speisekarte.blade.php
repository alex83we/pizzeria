@extends('admin.layout.admin')
@section('title'){{ __('Menu') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.24/r-2.2.7/sl-1.3.3/datatables.min.css"/>
    <style>
        @media (min-width: 1200px) {
            .modal-xl {
                max-width: 1140px;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Zutaten -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Menu') }}</h3>
            <div class="card-tools">
                <div>
                    <a href="#" class="btn btn-success text-dark" data-toggle="modal" data-target="#speisekarteAddModal"> {{ __('Add dish') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <h5>Übersicht über alle Gerichte</h5>
            <table id="speisekarte" class="table table-bordered table-hover table-striped" style="width:100%">
                <thead>
                <tr>
                    <th width="50">ID</th>
                    <th>Name</th>
                    <th>Preis</th>
                    <th>Aktion</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="speisekarteAddModal" tabindex="-1" aria-labelledby="speisekarteModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="speisekarteModal">{{ __('Add dish') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> </button>
                </div>
                <form method="POST" action="{{ route('admin.speisekarte.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="speisekarte_name">Gericht:</label>
                                    <input type="text" name="speisekarte_name" class="form-control @error('speisekarte_name') is-invalid @enderror" placeholder="Gericht" id="speisekarte_name" value="{{ old('speisekarte_name') }}">
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
                                            <input class="form-check-input @error('speisekarte_zutaten') is-invalid @enderror" type="checkbox" name="speisekarte_zutaten[]" id="{{ $zutat->zutat }}" value="{{ $zutat->id }}" {{ ( is_array(old('speisekarte_zutaten')) && in_array($zutat->id, old('speisekarte_zutaten')) ) ? 'checked ' : '' }}>
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
                                            <input class="form-check-input @error('speisekarte_kategorie') is-invalid @enderror" type="checkbox" name="speisekarte_kategorie" id="{{ $kategorie->kategorie }}" value="{{ $kategorie->id }}" {{ ( is_array(old('speisekarte_kategorie')) && in_array($kategorie->id, old('speisekarte_kategorie')) ) ? 'checked ' : '' }}>
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
                                    <input type="number" step="0.10" name="speisekarte_basispreis" class="form-control @error('speisekarte_basispreis') is-invalid @enderror" placeholder="Grundpreis" id="speisekarte_basispreis" value="{{ old('speisekarte_basispreis') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="speisekarte_basispreisabholung">Abholerpreis:</label>
                                    <input type="number" step="0.10" name="speisekarte_basispreisabholung" class="form-control @error('speisekarte_basispreisabholung') is-invalid @enderror" placeholder="Abholerpreis nur eingeben falls abweichend vom Grundpreis" id="speisekarte_basispreisabholung" value="{{ old('speisekarte_basispreisabholung') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="speisekarte_basispreislieferung">Lieferpreis:</label>
                                    <input type="number" step="0.10" name="speisekarte_basispreislieferung" class="form-control @error('speisekarte_basispreislieferung') is-invalid @enderror" placeholder="Lieferpreis nur eingeben falls abweichend vom Grundpreis" id="speisekarte_basispreislieferung" value="{{ old('speisekarte_basispreislieferung') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="speisekarte_allergene">Allergene:</label>
                                    <input type="text" name="speisekarte_allergene" class="form-control @error('speisekarte_allergene') is-invalid @enderror" placeholder="Allergene" id="speisekarte_allergene" value="{{ old('speisekarte_allergene') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="speisekarte_zusatzstoffe">Zusatzstoffe:</label>
                                    <input type="text" name="speisekarte_zusatzstoffe" class="form-control @error('speisekarte_zusatzstoffe') is-invalid @enderror" placeholder="Zusatzstoffe" id="speisekarte_zusatzstoffe" value="{{ old('speisekarte_zusatzstoffe') }}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.24/r-2.2.7/sl-1.3.3/datatables.min.js"></script>
    <script type="text/javascript">
        $(function () {

            var table = $('#speisekarte').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('admin.api.speisekarte.data') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'speisekarte_name', name: 'speisekarte_name'},
                    {data: 'speisekarte_basispreis', name: 'speisekarte_basispreis'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/German.json'
                },
                pageLength : 20,
                lengthMenu: [[10, 20, 50, 100, -1], [10, 20, 50, 100, 'alle']],
                order: [[ 1, "asc"]]
            });
        });
    </script>

@endpush