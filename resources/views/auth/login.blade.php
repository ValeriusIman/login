@extends('auth.main_login')
@section('title','Login')
@section('content')

    <!-- /.login-logo -->
    <div class="login-box">
        {{--        <div class="text-center">--}}
        {{--            <img src="<?= base_url() . 'assets/img/logo.png' ?>" class="rounded" alt="logo" width="200">--}}
        {{--        </div>--}}
        {{--        </p>--}}
        <div class="login-logo" style="font-size: 29px;">
            SISTEM INFORMASI
        </div>
        <div class="card">
            <div class="card-header">
                <div align="center">
                    LogIn
                </div>
            </div>
            <div class="card-body login-card-body">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form id="form-registration" method="POST" action="{{url('/singin')}}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                               required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                               required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button id="btn-login" type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                    </p>
                </form>
                <br>
                <div align="center">
                    Nama : Andin <br>
                    Email : andin@gmail.com <br>
                    Password : asdasd <br>
                    Role : Admin
                    =========================
                </div>
                <div align="center">
                    Email : anton@gmail.com <br>
                    Password : asdasd <br>
                    Role : Member
                </div>

            </div>
        </div>
    </div>

@endsection

