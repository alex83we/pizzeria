@extends('admin.layout.admin')
@section('title'){{ __('Edit category') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <!-- Kategorien -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Edit category') }}</h3>
            <div class="card-tools">
                <div>
                    <a href="{{ route('admin.kategorien.index') }}" class="btn btn-success text-dark"> {{ __('Back') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.kategorien.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Wochentage -->
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label class="form-label" for="title">Kategorie</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $category->title }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label class="form-label" for="title">Sortierung</label>
                            <input type="number" class="form-control @error('sort') is-invalid @enderror" name="sort" id="sort" value="{{ $category->sort }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label class="form-label" for="description">Beschreibung</label>
                            <input type="text" id="description" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ $category->description }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <div class="pb-1 font-weight-bold">Vorschau</div>
                            <div style="height: 185px; background: url({{ url('images/kategorie/'.$category->images) }}); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-lg-2 col-form-label" for="images">Kategoriebild</label>
                        <div class="col-lg-10">
                            <input type="file" id="images" class="form-control" name="images" accept="image/gif, image/jpg, image/jpeg, image/png, image/tif, image/tiff, image/svg">
                        </div>
                    </div>
                    <input value="{{ $category->images }}" name="imagesalt" type="hidden">
                    <div class="d-flex mb-2">
                        <div class="ml-auto">
                            <button class="btn btn-primary" type="submit">Speichern</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')

@endpush