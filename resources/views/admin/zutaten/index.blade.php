@extends('admin.layout.admin')
@section('title'){{ __('Ingredients') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <!-- Zutaten -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Ingredients') }}</h3>
            <div class="card-tools">
                <div>
                    <a href="#" class="btn btn-success text-dark" data-toggle="modal" data-target="#zutatenAddModal"> {{ __('Add an ingredient') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table id="zutatenUebersicht" class="table table-borderless">
                <tbody>
                @foreach($zutaten as $key => $zutaten)
                    <tr id="oeid-{{$zutaten->id}}">
                        <td class="align-middle fw-bolder fs-6">{{ $zutaten->zutat }}</td>
                        <td class="align-middle fw-bolder fs-6">{{ $zutaten->aufpreis }}</td>
                        @hasanyrole('Admin|Inhaber')
                        <td class="align-middle text-right"><a href="javascript:void(0)" onclick="editZutaten({{ $zutaten->id }})" class="btn btn-light"><i class="fas fa-edit fw-bolder fs-6"></i></a></td>
                        @else
                            <td class="align-middle text-right fw-bolder fs-6">Änderung anfragen</td>
                            @endhasanyrole
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="zutatenAddModal" tabindex="-1" aria-labelledby="zutatenModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="zutatenModal">Zutat hinzufügen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form id="zutatenAddForm">
                    @csrf
                    <div class="modal-body">
                        <!-- Wochentage -->
                        <div class="form-outline mb-4">
                            <input type="text" id="zutat" class="form-control @error('zutat') is-invalid
                                    @enderror" name="zutat" id="zutat">
                            <label class="form-label" for="zutat">Zutat</label>
                        </div>
                        <!-- von -->
                        <div class="form-outline mb-4">
                            <input type="number" step="0.01" id="aufpreis" class="form-control @error('aufpreis')
                                    is-invalid
                                    @enderror" name="aufpreis" id="aufpreis">
                            <label class="form-label" for="aufpreis">Aufpreis</label>
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
    <div class="modal fade" id="zutatenEditModal" tabindex="-1" aria-labelledby="zutaten" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="zutaten">Zutaten bearbeiten</h5>
                </div>
                <form id="zutatenEditForm">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="modal-body">
                        <!-- Wochentage -->
                        <div class="form-outline mb-4">
                            <input type="text" id="zutaten_zutat" class="form-control @error('zutat') is-invalid
                                    @enderror" name="zutat" id="zutat">
                            <label class="form-label" for="zutaten_zutat">Zutat</label>
                        </div>
                        <!-- von -->
                        <div class="form-outline mb-4">
                            <input type="number" step="0.01" id="zutaten_aufpreis" class="form-control @error('aufpreis') is-invalid
                                    @enderror" name="aufpreis" id="aufpreis">
                            <label class="form-label" for="zutaten_aufpreis">Aufpreis</label>
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
    <script>
        $("#zutatenAddForm").submit(function (e) {
            e.preventDefault();
            let zutat = $("#zutat").val();
            let aufpreis = $("#aufpreis").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{ route('admin.zutaten.store') }}",
                type: "POST",
                data:{
                    zutat: zutat,
                    aufpreis: aufpreis,
                    _token: _token
                },
                success:function (response)
                {
                    // window.location.reload();
                    if (response)
                    {
                        $("#zutatenUebersicht tbody").prepend('<tr><td>' +
                            response.zutat + '</td><td>' + response.aufpreis + '</td><td>' +
                            '</td></tr>');
                        $('#zutatenAddForm')[0].reset();
                    }
                }

            });
        });
    </script>

    <script>
        function editZutaten(id)
        {
            $.get('./zutaten/'+id+'/edit', function (zutaten) {
                $('#id').val(zutaten.id);
                $('#zutaten_zutat').val(zutaten.zutat);
                $('#zutaten_aufpreis').val(zutaten.aufpreis);
                $('#zutatenEditModal').modal('toggle');
            });
        }

        $("#zutatenEditForm").submit(function (e) {
            e.preventDefault();
            let id = $("#id").val();
            let zutat = $("#zutaten_zutat").val();
            let aufpreis = $("#zutaten_aufpreis").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: './zutaten/'+id,
                type: "PATCH",
                data:{
                    id: id,
                    zutat: zutat,
                    aufpreis: aufpreis,
                    _token: _token
                },
                success:function(response) {
                    $('#oeid-' + response.id +' td:nth-child(1)').text(response.zutat);
                    $('#oeid-' + response.id +' td:nth-child(2)').text(response.aufpreis);
                    $('#zutatenEditModal').modal('toggle');
                    $('#zutatenEditForm')[0].reset();
                }
            });
        });
    </script>
@endpush