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
                <h4>Total Admin</h4>
            </div>
            <div class="card-body">
                {{$total_admin}}
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
                <h4>Total Mahasiswa</h4>
            </div>
            <div class="card-body">
                {{$total_mahasiswa}}
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fa-solid fa-xmark fa-xl" style="color: #ffffff;"></i>
            </div>
            <div class="card-wrap">
            <div class="card-header">
                <h4>Mahasiswa Tidak Aktif</h4>
            </div>
            <div class="card-body">
                {{$mahasiswa_not_active}}
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fa-solid fa-check fa-xl" style="color: #ffffff;"></i>
            </div>
            <div class="card-wrap">
            <div class="card-header">
                <h4>Mahasiswa Aktif</h4>
            </div>
            <div class="card-body">
                {{$mahasiswa_active}}
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection