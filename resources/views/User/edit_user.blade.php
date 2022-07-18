@extends('template.base')
@section('title','User')
@section('description','Ubah User')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah User</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Ubah</h3>
            </div>


            <form id="form-edit" action="{{url('user/'.$user['id_user'])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama"
                                       value="{{$user['name']}}">
                            </div>
                            <div class="form-group">
                                <label for="name">No. Telp</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="No. Telp"
                                       value="{{$user['phone_number']}}">
                            </div>
                            <div class="form-group">
                                <label for="akses">Jenis Kelamin</label>
                                <select class="custom-select rounded-0" name="gender" id="gender">
                                    <option value=""></option>
                                    <option {{$user['gender'] === 'L' ? 'selected' :''}} value="L">Laki-laki</option>
                                    <option {{$user['gender'] === 'P' ? 'selected' :''}} value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                       value="{{$user['email']}}">
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir"
                                       placeholder="Tanggal Lahir" value="{{$user['date_birth']}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="akses">Akses</label>
                                <select class="custom-select rounded-0" name="akses" id="akses">
                                    <option value=""></option>
                                    <option {{$user['role'] === 'member' ? 'selected' :''}} value="member">Member
                                    </option>
                                    <option {{$user['role'] === 'admin' ? 'selected' :''}} value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="password">No KTP</label>
                                <input type="text" name="no_ktp" class="form-control" id="no_ktp" placeholder="No KTP"
                                       value="{{$user['no_ktp']}}">
                            </div>
                            <div class="form-group">
                                <label for="password">Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo" name="photo">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="button" id="btn-submit" class="btn btn-sm btn-primary">Simpan</button>
                        <a href="{{url('user')}}" type="button" class="btn btn-sm btn-success">Kembali</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <script>
        $(function () {
            $("#btn-submit").on('click', function () {
                $("#form-edit").submit();
            });
            $('#form-edit').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "{{url('validation')}}",
                            type: "POST",
                            data: {
                                _token: "{{csrf_token()}}",
                                email: function () {
                                    return $('#email').val();
                                },
                                id: {{$user['id_user']}}
                            }
                        }
                    },
                    name: {
                        required: true,
                    },
                    no_ktp: {
                        required: true,
                    },
                    akses: {
                        required: true,
                    },
                    tgl_lahir: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    phone: {
                        required: true,
                        minlength: 10
                    },
                    photo: {
                        extension: "JPG|PNG",
                        // filesize
                    }
                },
                messages: {
                    email: {
                        required: "Silahkan masukkan alamat email",
                        email: "silahkan isi dengan format email",
                        remote: "Email sudah digunakan"
                    },
                    name: {
                        required: "Silahkan masukkan nama",
                    },
                    no_ktp: {
                        required: "Silahkan masukkan no ktp",
                    },
                    akses: {
                        required: "Silahkan pilih akses user",
                    },
                    tgl_lahir: {
                        required: "Silahkan masukan tanggal lahir",
                    },
                    gender: {
                        required: "Silahkan pilih jenis kelamin",
                    },
                    phone: {
                        required: "Silahkan masukan No. Telp",
                        minlength: "No. Telp minimal 10 karakter",
                    },
                    photo: {
                        extension: "masukan format file png atau jpeg",
                        // filesize : "maximal foto 1MB.",
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
