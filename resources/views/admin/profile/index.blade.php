@extends('admin.layout.admin')
@section('title', 'Profile')
@section('bodyTag', 'sidebar-mini')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.css">
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }
        .modal-lg{
            max-width: 1000px !important;
        }
    </style>
@endpush

@section('content')

    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img style="width: 200px;" class="profile-user-img img-fluid img-circle"
                             src="/images/{{ auth()->user()->photo == '' ? 'default.png' : 'profile_picture/'.auth()->user()->photo }}"
                             alt="{{ Auth::user()->name }}">
                    </div>
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                           <p class="text-muted text-center mb-1">
                               @forelse(Auth::user()->getRoleNames() as $role)
                                   <span class="badge badge-warning">{{ $role }}</span>
                               @empty
                               @endforelse
                           </p>
                    <p class="text-muted text-center mb-1">{{ Auth::user()->email }}</p>
                    <p class="text-muted text-center mb-1">{{ Auth::user()->phone }}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h4>Bearbeite Profil</h4>
                </div>
                <div class="card-body">
                    <div>
                        <form class="form-horizontal" method="post" action="{{ route('admin.user.postProfile') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name"  id="name" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->name }}" required placeholder="Name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-Mail Adresse</label>
                                        <input type="email" name="email"  id="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" placeholder="E-Mail Adresse">
                                        @error('siteemail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Telefonnummer</label>
                                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Telefonnummer" value="{{ auth()->user()->phone }}" required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button mb-1">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Profil aktualisieren</button>
{{--                                                 <a role="button" href="admin/index.html" class="bizwheel-btn theme-2">Login</a>--}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr class="my-2">
                    <p class="mb-1 font-weight-bold">{{ __('Change profile picture') }}</p>
                    <input type="file" name="image" class="image">
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">{{ __('Change profile photo') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="img-container">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                                    <button type="button" class="btn btn-primary" id="crop">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"></script>
    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        $("body").on("change", ".image", function(e){
            var files = e.target.files;
            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 250,
                height: 250,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ route('admin.photo.store') }}",
                        data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'image': base64data},
                        success: function(data){
                            console.log(data);
                            $modal.modal('hide');
                            window.location = '{{ route('admin.user.profile') }}';
                        }
                    });
                }
            });
        })
    </script>
@endpush