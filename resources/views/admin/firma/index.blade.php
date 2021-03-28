@extends('admin.layout.admin')
@section('title'){{ __('Company Administration') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <!-- Firmendaten -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Company details') }}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.firma.store') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <!-- Firmenname -->
                        <input type="text" id="firmenname" class="form-control @error('firmenname') is-invalid @enderror" name="firmenname" value="{{ $data->firmenname }}">
                        <label class="form-label" for="firmenname">Firmenname</label>
                    </div>
                    <div class="form-group col-lg-6">
                        <!-- Inhaber -->
                        <input type="text" id="inhaber" class="form-control @error('inhaber') is-invalid @enderror" name="inhaber" value="{{ $data->inhaber }}">
                        <label class="form-label" for="inhaber">Inhaber</label>
                    </div>
                    <div class="form-group col-lg-6">
                        <!-- Straße -->
                        <input type="text" id="straße" class="form-control @error('straße') is-invalid
                            @enderror" name="straße" value="{{
                            $data->straße }}">
                        <label class="form-label" for="straße">Straße</label>
                    </div>
                    <div class="form-group col-lg-2">
                        <!-- Postleitzahl -->
                        <input type="text" id="plz" class="form-control @error('plz') is-invalid @enderror" name="plz" value="{{ $data->plz }}" maxlength="5">
                        <label class="form-label" for="plz">PLZ</label>
                    </div>
                    <div class="form-group col-lg-4">
                        <!-- Inhaber -->
                        <input type="text" id="ort" class="form-control @error('ort') is-invalid @enderror" name="ort" value="{{ $data->ort }}">
                        <label class="form-label" for="ort">Ort</label>
                    </div>
                    <div class="form-group col-lg-6">
                        <!-- Telefon -->
                        <input type="text" id="Telefon" class="form-control @error('telefon') is-invalid @enderror" name="telefon" value="{{ $data->telefon }}">
                        <label class="form-label" for="Telefon">Telefon</label>
                    </div>
                    <div class="form-group col-lg-6">
                        <!-- Mobil -->
                        <input type="text" id="mobil" class="form-control @error('mobil') is-invalid @enderror" name="mobil" value="{{
                            $data->mobil }}">
                        <label class="form-label" for="mobil">Mobil</label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="ml-auto">
                        <button class="btn btn-success text-dark" type="submit">Speichern</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Öffnungszeiten -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Opening Hours') }}</h3>
            <div class="card-tools">
                @hasanyrole('Admin')
                <div>
                    <a href="#" class="btn btn-success text-dark" data-toggle="modal" data-target="#oeffnungAddModal"><i class="fas fa-clock"></i> Öffnungszeiten hinzufügen</a>
                </div>
                @else
                    Öffnungszeiten hinzufügen
                @endhasanyrole
            </div>
        </div>
        <div class="card-body table-responsive">
            <table id="oeffnunUebersicht" class="table table-borderless">
                <tbody>
                @foreach($oeffnung as $key => $oeffnung)
                    <tr id="oeid-{{$oeffnung->id}}">
                        <td class="align-middle fw-bolder fs-6">{{ $oeffnung->wochentag . ' ' . $oeffnung->von . ' - ' . $oeffnung->bis . ' Uhr' }}</td>
                        @hasanyrole('Admin|Inhaber')
                            <td class="align-middle text-right"><a href="javascript:void(0)" onclick="editOeffnung({{ $oeffnung->id }})" class="btn btn-light"><i class="fas fa-edit fw-bolder fs-6"></i></a></td>
                        @else
                            <td class="align-middle text-right fw-bolder fs-6">Änderung anfragen</td>
                        @endhasanyrole
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Lieferzeiten -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Delivery times') }}</h3>
            <div class="card-tools">
                @hasanyrole('Admin')
                <div>
                    <a href="#" class="btn btn-success text-dark" data-toggle="modal" data-target="#oeffnungAddModal"><i class="fas fa-clock"></i> Lieferzeiten hinzufügen</a>
                </div>
                @else
                    Lieferzeiten hinzufügen
                @endhasanyrole
            </div>
        </div>
        <div class="card-body table-responsive">
            <table id="lieferUebersicht" class="table table-borderless">
                <tbody>
                @foreach($liefer as $key => $liefer)
                    <tr id="oeid-{{$liefer->id}}">
                        <td class="align-middle fw-bolder fs-6">{{ $liefer->wochentag . ' ' . $liefer->von . ' - ' . $liefer->bis . ' Uhr' }}</td>
                        @hasanyrole('Admin|Inhaber')
                            <td class="align-middle text-right"><a href="javascript:void(0)" onclick="editliefer({{ $liefer->id }})" class="btn btn-light"><i class="fas fa-edit fw-bolder fs-6"></i></a></td>
                        @else
                            <td class="align-middle text-right fw-bolder fs-6">Änderung anfragen</td>
                        @endhasanyrole
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Öffnungszeiten -->
    <!-- Add Modal -->
    <div class="modal fade" id="oeffnungAddModal" tabindex="-1" aria-labelledby="oeffnungModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="oeffnungModal">Öffnungszeiten hinzufügen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> </button>
                </div>
                <form id="oeffnungAddForm">
                    @csrf
                    <div class="modal-body">
                        <!-- Wochentage -->
                        <div class="form-outline mb-4">
                            <input type="text" id="wochentag" class="form-control @error('wochentag') is-invalid
                                    @enderror" name="wochentag" id="wochentag">
                            <label class="form-label" for="wochentag">Wochentag</label>
                        </div>
                        <!-- von -->
                        <div class="form-outline mb-4">
                            <input type="text" id="von" class="form-control @error('von') is-invalid
                                    @enderror" name="von" id="von">
                            <label class="form-label" for="von">von</label>
                        </div>
                        <!-- bis -->
                        <div class="form-outline mb-4">
                            <input type="text" id="bis" class="form-control @error('bis') is-invalid
                                    @enderror" name="bis" id="bis">
                            <label class="form-label" for="bis">bis</label>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="ms-auto">
                                <button class="btn btn-primary" type="submit">Speichern</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="oeffnungEditModal" tabindex="-1" aria-labelledby="oeffnung" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="oeffnung">Öffnungszeiten bearbeiten</h5>
                </div>
                <form id="oeffnungEditForm">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="modal-body">
                        <!-- Wochentage -->
                        <div class="form-outline mb-4">
                            <input type="text" id="oeffnungszeiten_wochentag" class="form-control @error('wochentag') is-invalid
                                    @enderror" name="wochentag" id="wochentag">
                            <label class="form-label" for="oeffnungszeiten_wochentag">Wochentag</label>
                        </div>
                        <!-- von -->
                        <div class="form-outline mb-4">
                            <input type="text" id="oeffnungszeiten_von" class="form-control @error('von') is-invalid
                                    @enderror" name="von" id="von">
                            <label class="form-label" for="oeffnungszeiten_von">von</label>
                        </div>
                        <!-- bis -->
                        <div class="form-outline mb-4">
                            <input type="text" id="oeffnungszeiten_bis" class="form-control @error('bis') is-invalid
                                    @enderror" name="bis" id="bis">
                            <label class="form-label" for="oeffnungszeiten_bis">bis</label>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="ms-auto">
                                <button class="btn btn-primary" type="submit">Ändern</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Lieferzeiten -->
    <!-- Add Modal -->
    <div class="modal fade" id="lieferAddModal" tabindex="-1" aria-labelledby="lieferModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lieferModal">Lieferzeiten hinzufügen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> </button>
                </div>
                <form id="lieferAddForm">
                    @csrf
                    <div class="modal-body">
                        <!-- Wochentage -->
                        <div class="form-outline mb-4">
                            <input type="text" id="wochentag" class="form-control @error('wochentag') is-invalid
                                    @enderror" name="wochentag" id="wochentag">
                            <label class="form-label" for="wochentag">Wochentag</label>
                        </div>
                        <!-- von -->
                        <div class="form-outline mb-4">
                            <input type="text" id="von" class="form-control @error('von') is-invalid
                                    @enderror" name="von" id="von">
                            <label class="form-label" for="von">von</label>
                        </div>
                        <!-- bis -->
                        <div class="form-outline mb-4">
                            <input type="text" id="bis" class="form-control @error('bis') is-invalid
                                    @enderror" name="bis" id="bis">
                            <label class="form-label" for="bis">bis</label>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="ms-auto">
                                <button class="btn btn-primary" type="submit">Speichern</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="lieferEditModal" tabindex="-1" aria-labelledby="liefer" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="liefer">Lieferzeiten bearbeiten</h5>
                </div>
                <form id="lieferEditForm">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="modal-body">
                        <!-- Wochentage -->
                        <div class="form-outline mb-4">
                            <input type="text" id="lieferszeiten_wochentag" class="form-control @error('wochentag') is-invalid
                                    @enderror" name="wochentag" id="wochentag">
                            <label class="form-label" for="lieferszeiten_wochentag">Wochentag</label>
                        </div>
                        <!-- von -->
                        <div class="form-outline mb-4">
                            <input type="text" id="lieferszeiten_von" class="form-control @error('von') is-invalid
                                    @enderror" name="von" id="von">
                            <label class="form-label" for="lieferszeiten_von">von</label>
                        </div>
                        <!-- bis -->
                        <div class="form-outline mb-4">
                            <input type="text" id="lieferszeiten_bis" class="form-control @error('bis') is-invalid
                                    @enderror" name="bis" id="bis">
                            <label class="form-label" for="lieferszeiten_bis">bis</label>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="ms-auto">
                                <button class="btn btn-primary" type="submit">Ändern</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <!-- Öffnungszeiten -->
    <script>
        $("#oeffnungAddForm").submit(function (e) {
            e.preventDefault();
            let wochentag = $("#wochentag").val();
            let von = $("#von").val();
            let bis = $("#bis").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{route('admin.oeffnungszeiten.store')}}",
                type: "POST",
                data:{
                    wochentag: wochentag,
                    von: von,
                    bis: bis,
                    _token: _token
                },
                success:function (response)
                {
                    window.location.reload();
                    if (response)
                    {
                        $("#oeffnungUebersicht tbody").prepend('<tr><td>' +
                            response.wochentag + ' ' + response.von + ' - ' + response.bis + ' Uhr' +
                            'fs-6"></td></tr>');
                        $('#oeffnungAddForm')[0].reset();
                    }
                }

            });
        });
    </script>

    <script>
        function editOeffnung(id)
        {
            $.get('./firma/oeffnungszeiten/'+id+'/edit', function (oeffnung) {
                $('#id').val(oeffnung.id);
                $('#oeffnungszeiten_wochentag').val(oeffnung.wochentag);
                $('#oeffnungszeiten_von').val(oeffnung.von);
                $('#oeffnungszeiten_bis').val(oeffnung.bis);
                $('#oeffnungEditModal').modal('toggle');
            });
        }

        $("#oeffnungEditForm").submit(function (e) {
            e.preventDefault();
            let id = $("#id").val();
            let wochentag = $("#oeffnungszeiten_wochentag").val();
            let von = $("#oeffnungszeiten_von").val();
            let bis = $("#oeffnungszeiten_bis").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: './firma/oeffnungszeiten/'+id,
                type: "PATCH",
                data:{
                    id: id,
                    wochentag: wochentag,
                    von: von,
                    bis: bis,
                    _token: _token
                },
                success:function(response) {
                    $('#oeid-' + response.id +' td:nth-child(1)').text(response.wochentag + ' ' + response.von + ' -' +
                        ' ' + response.bis + ' Uhr');
                    $('#oeffnungEditModal').modal('toggle');
                    $('#oeffnungEditForm')[0].reset();
                }
            });
        });
    </script>


    <!-- Lieferzeiten -->
    <script>
        $("#lieferAddForm").submit(function (e) {
            e.preventDefault();
            let wochentag = $("#wochentag").val();
            let von = $("#von").val();
            let bis = $("#bis").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{route('admin.lieferzeiten.store')}}",
                type: "POST",
                data:{
                    wochentag: wochentag,
                    von: von,
                    bis: bis,
                    _token: _token
                },
                success:function (response)
                {
                    location.reload();
                    if (response)
                    {
                        $("#lieferUebersicht tbody").prepend('<tr><td>' +
                            response.wochentag + ' ' + response.von + ' - ' + response.bis + ' Uhr' +
                            'fs-6"></td></tr>');
                        $('#lieferAddForm')[0].reset();
                    }
                }

            });
        });
    </script>

    <script>
        function editliefer(id)
        {
            $.get('./firma/lieferzeiten/'+id+'/edit', function (liefer) {
                $('#id').val(liefer.id);
                $('#lieferszeiten_wochentag').val(liefer.wochentag);
                $('#lieferszeiten_von').val(liefer.von);
                $('#lieferszeiten_bis').val(liefer.bis);
                $('#lieferEditModal').modal('toggle');
            });
        }

        $("#lieferEditForm").submit(function (e) {
            e.preventDefault();
            let id = $("#id").val();
            let wochentag = $("#lieferszeiten_wochentag").val();
            let von = $("#lieferszeiten_von").val();
            let bis = $("#lieferszeiten_bis").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: './firma/lieferzeiten/'+id,
                type: "PATCH",
                data:{
                    id: id,
                    wochentag: wochentag,
                    von: von,
                    bis: bis,
                    _token: _token
                },
                success:function(response) {
                    $('#oeid-' + response.id +' td:nth-child(1)').text(response.wochentag + ' ' + response.von + ' -' +
                        ' ' + response.bis + ' Uhr');
                    $('#lieferEditModal').modal('toggle');
                    $('#lieferEditForm')[0].reset();
                }
            });
        });
    </script>
@endpush