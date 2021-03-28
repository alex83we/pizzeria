@extends('admin.layout.admin')
@section('title'){{ __('Categories') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <!-- Kategorien -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Categories') }}</h3>
            <div class="card-tools">
                <div>
                    <a href="#" class="btn btn-success text-dark" data-toggle="modal" data-target="#kategorieAddModal"> {{ __('Add category') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">

            <table id="kategorieUebersicht" class="table table-borderless">
                <thead>
                <tr>
                    <th>Kategorie</th>
                    <th>Beschreibung</th>
                    <th>Kategoriebild</th>
                    <th>Aktion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $key => $kategorie)
                    <tr id="oeid-{{$kategorie->id}}">
                        <td class="align-middle fw-bolder fs-6">{{ $kategorie->kategorie }}</td>
                        <td class="align-middle fw-bolder fs-6">{{ $kategorie->description }}</td>
                        <td class="align-middle fw-bolder fs-6">
                            @if ($kategorie->images == true)
                                <img src="{{ Storage::disk('public')->url('images/kategorie/'.$kategorie->images) }}"
                                     alt="{{
                                 $kategorie->title }}" style="width: 150px;">
                            @endif
                        </td>
                        @hasanyrole('Admin|Inhaber')
                        <td class="align-middle text-end"><a href="javascript:void(0)" title="Bearbeiten"
                                                             onclick="editKategorie({{
                             $kategorie->id }})" class="btn btn-light"><i class="fas fa-edit fw-bolder fs-6"></i></a></td>
                        @else
                            <td class="align-middle text-end fw-bolder fs-6">Änderung anfragen</td>
                            @endhasanyrole
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="kategorieAddModal" tabindex="-1" aria-labelledby="kategorieModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kategorieModal">Kategorie hinzufügen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> </button>
                </div>
                <form id="kategorieAddForm" method="POST" action="{{ route('admin.kategorien.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Wochentage -->
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label class="form-label" for="title">Kategorie</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label class="form-label" for="description">Beschreibung</label>
                                <input type="text" id="description" class="form-control @error('description') is-invalid @enderror" name="description" id="description">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-lg-2 col-form-label" for="images">Kategoriebild</label>
                            <div class="col-lg-10">
                                <input type="file" id="images" class="form-control" name="images" accept="image/gif, image/jpg, image/jpeg, image/png, image/tif, image/tiff, image/svg">
                            </div>
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
@endsection

@push('js')

@endpush