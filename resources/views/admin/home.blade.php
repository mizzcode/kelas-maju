@extends('layouts.main')

@section('title', 'Dashboard - KelasMaju')

@section('content-header')
<h1>Dashboard</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item">Dashboard</div>
</div>
@endsection

@section('content-body')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fa-solid fa-user fa-xl" style="color: #ffffff;"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pengguna</h4>
                </div>
                <div class="card-body">
                    {{$total_user}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fa-solid fa-graduation-cap fa-xl" style="color: #ffffff;"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Siswa</h4>
                </div>
                <div class="card-body">
                    {{$total_student}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fa-solid fa-graduation-cap fa-xl" style="color: #ffffff;"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Guru</h4>
                </div>
                <div class="card-body">
                    {{$total_teacher}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fa-solid fa-graduation-cap fa-xl" style="color: #ffffff;"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    {{$total_mapel}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection