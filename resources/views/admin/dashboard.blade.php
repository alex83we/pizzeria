@extends('admin.layout.admin')
@section('title', ' Dashboard')
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-bars"></i> </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kategorien gesamt</span>
                        <span class="info-box-number">{{ $kategorien }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-secondary"><i class="fas fa-pizza-slice"></i> </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Zutaten gesamt</span>
                        <span class="info-box-number">{{ $zutaten }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-file"></i> </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Gericht gesamt</span>
                        <span class="info-box-number">{{ $speisekarte }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush