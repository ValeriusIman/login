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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Json Data</h3>
                    </div>
                    <div class="card-body">
                        {{$user}}
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
