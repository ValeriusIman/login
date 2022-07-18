@extends('template.base')
@section('title','User')
@section('description','Ubah User')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View User</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" alt="User profile picture"
                                 src="{{asset('images').'\\'.$user['photo']}}"
                                 onerror="this.onerror=null;this.src='{{asset('assets/img/default.jpg')}}';"/>
                        </div>
                        <h3 class="profile-username text-center">{{$user['name']}}</h3>
                        <p class="text-muted text-center">{{$user['role'] === 'admin' ? 'Admin' : 'Member'}}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>No. KTP</b> <a class="float-right">{{$user['no_ktp']}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>No Telp</b> <a class="float-right">{{$user['phone_number']}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{$user['email']}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tanggal Lahir</b> <a
                                    class="float-right">{{date('d-m-Y',strtotime($user['date_birth']))}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <a
                                    class="float-right">{{$user['gender'] === 'L' ? 'Laki-laki' : 'Perempuan'}}</a>
                            </li>
                        </ul>

                        <div class="card-footer">
                            <a href="{{url('user/'.$user['id_user'].'/edit')}}" type="button" class="btn btn-sm btn-primary">Ubah Data</a>
                            <a href="{{url('user')}}" type="button" class="btn btn-sm btn-success">Kembali</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
