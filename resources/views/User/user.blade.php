@extends('template.base')
@section('title','User')
@section('description','User')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">

            <a href="{{url('user/create')}}" class="btn btn-sm btn-success"><i class="nav-icon fas fa-plus"></i>
                Tambah</a>
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="data-user" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama</th>
                                    <th>No KTP</th>
                                    <th>Email</th>
                                    <th>No. Telp</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($user as $us)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$us->name}}</td>
                                        <td>{{$us->no_ktp}}</td>
                                        <td>{{$us->email}}</td>
                                        <td>{{$us->phone_number}}</td>
                                        <td>{{date('d-m-Y',strtotime($us->date_birth))}}</td>
                                        <td>{{$us->gender === 'L' ? 'Laki-laki' : 'Perempuan'}}</td>
                                        <td>{{ucfirst($us->role)}}</td>
                                        <td>
                                            <a href="{{url('user/'.$us->id_user.'/show')}}"
                                               class="btn btn-sm btn-success"><i
                                                    class="nav-icon fas fa-eye"></i></a>
                                            <a href="{{url('user/'.$us->id_user.'/edit')}}"
                                               class="btn btn-sm btn-primary"><i
                                                    class="nav-icon fas fa-edit"></i></a>
                                            @if($session['id_user'] !== $us->id_user)
                                                <a href="{{url('user/'.$us->id_user.'/delete')}}"
                                                   class="btn btn-sm btn-danger"><i
                                                        class="nav-icon fas fa-trash-alt"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(function () {
            $("#data-user").DataTable({
                "responsive": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
