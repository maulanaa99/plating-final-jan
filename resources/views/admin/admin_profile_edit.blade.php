@extends('layout.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="card-title"> <span> Edit Profile Page </span> </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input name="name" class="form-control" type="text" id="name"
                                            value="{{ ucwords(strtolower($editData->name)) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">User Email</label>
                                    <div class="col-sm-10">
                                        <input name="email" class="form-control" type="email" id="email"
                                            value="{{ $editData->email }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input name="username" class="form-control" type="text" id="username"
                                            value="{{ $editData->username }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input name="profile_images" type="file" class="custom-file-input"
                                                id="image">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <img id="showImage" class="rounded avatar-xl"
                                                src="{{ !empty($editData->profile_images) ? url('upload/admin_images/' . $editData->profile_images) : url('upload/no_image.jpg') }}">
                                        </div>
                                    </div>
                                <!-- end row -->
                                <center>
                                    <input type="submit" class="btn btn-info" value="Update Profile">
                                </center>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection

@push('page-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush

@push('after-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush
