@extends('template.base')
@section('title','Dashboard')
@section('description','Dashboard')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" alt="User profile picture"
                                         src="{{asset('images').'\\'.$session['photo']}}"
                                     onerror="this.onerror=null;this.src='{{asset('assets/img/default.jpg')}}';"/>

                            </div>
                            <h3 class="profile-username text-center">{{$session['name']}}</h3>
                            <p class="text-muted text-center">{{$session['role'] === 'admin' ? 'Admin' : 'Member'}}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>No. KTP</b> <a class="float-right">{{$session['no_ktp']}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>No Telp</b> <a class="float-right">{{$session['phone_number']}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{$session['email']}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tanggal Lahir</b> <a
                                        class="float-right">{{date('d-m-Y',strtotime($session['date_birth']))}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Jenis Kelamin</b> <a
                                        class="float-right">{{$session['gender'] === 'L' ? 'Laki-laki' : 'Perempuan'}}</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
