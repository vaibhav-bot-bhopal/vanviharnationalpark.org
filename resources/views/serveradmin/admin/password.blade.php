@extends('layouts.backend.master')

@section('title','Admin Change Password')

@push('css')
    <style>
        .input-group-text{
            width: 42px;
        }

        .input-group-text span.fas.fa-eye{
            cursor: pointer;
        }

        .hide-password {
            display: none;
        }
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Change Password Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('serveradmin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            {{-- <div class="text-center">
                                @if ($user->image)
                                    <img class="profile-user-img img-fluid img-circle"
                                    src="{{asset('public/storage/profile/'.$user->image)}}"
                                    alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-fluid img-circle"
                                    src="{{asset('public/storage/profile/avatar.jpg')}}"
                                    alt="User profile picture">
                                @endif
                            </div> --}}

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <p class="text-muted text-center">{{ $user->email }}</p>

                            <form action="{{ route('serveradmin.updateadminpassword', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- <div class="form-group">
                                    <label for="old_passwprd">Old Password</label>
                                    <input type="password" class="form-control {{($errors->any() && $errors->first('old_password')) ? 'is-invalid' : ''}}" id="old_password" name="old_password" placeholder="Enter Your Old Password">
                                    @if ($errors->any())
                                        <p class="text-danger">{{$errors->first('old_password')}}</p>
                                    @endif
                                </div> --}}

                                <div class="form-group">
                                    <label for="password">New Password</label>

                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control {{($errors->any() && $errors->first('password')) ? 'is-invalid' : ''}}" id="password" name="password" placeholder="Enter Your New Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text new-password-showhide">
                                                <span class="fas fa-eye show-password"></span>
                                                <span class="fas fa-eye-slash hide-password"></span>
                                            </div>
                                        </div>

                                        @if ($errors->any())
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('password')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>

                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control {{($errors->any() && $errors->first('confirm_password')) ? 'is-invalid' : ''}}" id="password_confirmation" name="password_confirmation" placeholder="Enter Your Confirm Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text confirm-password-showhide">
                                                <span class="fas fa-eye show-password"></span>
                                                <span class="fas fa-eye-slash hide-password"></span>
                                            </div>
                                        </div>

                                        @if ($errors->any())
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('password_confirmation')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary float-right"><i class="nav-icon fas fa-upload" style="margin-right: 5px;"></i>UPDATE</button>
                                    <a href="{{route('serveradmin.dashboard')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 5px;"></i>BACK</a>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (end) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(".show-password, .hide-password").on('click', function() {
                var passwordId = $(this).parents('div:nth(2)').find('input').attr('id');
                if ($(this).hasClass('show-password')) {
                    $("#" + passwordId).attr("type", "text");
                    $(this).parent().find(".show-password").hide();
                    $(this).parent().find(".hide-password").show();
                } else {
                    $("#" + passwordId).attr("type", "password");
                    $(this).parent().find(".hide-password").hide();
                    $(this).parent().find(".show-password").show();
                }
            });
        });
    </script>
@endpush
