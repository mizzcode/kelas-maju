@extends('layouts.main')

@section('title', "Mahasiswa | KelasMaju")

@section('content-header')
<h1>Mahasiswa</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="/admin">Dashboard</a></div>
    <div class="breadcrumb-item">Mahasiswa</div>
</div>
@endsection

@section('content-body')
    <div class="col-md-6 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Seluruh Data Mahasiswa</h4>
        </div>
        <div class="card-body p-0">
            <p class="px-4">Berikut adalah daftar seluruh mahasiswa</p>
            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                <th>#</th>
                <th>Name</th>
                <th>Nim</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
                </tr>
                <tr>
                <td>1</td>
                <td>Misbahudin</td>
                <td>12345</td>
                <td>Teknik Informatika</td>
                <td><div class="badge badge-success">Active</div></td>
                <td>2023-09-01</td>
                <td>2023-09-01</td>
                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
                <tr>
                <td>2</td>
                <td>Anjani Dewi Anugrah</td>
                <td>12345</td>
                <td>Graphic Designer</td>
                <td><div class="badge badge-success">Active</div></td>
                <td>2017-01-09</td>
                <td>2018-01-09</td>
                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
                <tr>
                <td>3</td>
                <td>Kusnadi</td>
                <td>12345</td>
                <td>Teknik Informatika</td>
                <td><div class="badge badge-danger">Not Active</div></td>
                <td>2017-01-11</td>
                <td>2017-01-11</td>
                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
                <tr>
                <td>4</td>
                <td>Rizal Fakhri</td>
                <td>12345</td>
                <td>Teknik Informatika</td>
                <td><div class="badge badge-success">Active</div></td>
                <td>2017-01-11</td>
                <td>2017-01-11</td>
                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
                <tr>
                <td>5</td>
                <td>Isnap Kiswandi</td>
                <td>12345</td>
                <td>Teknik Informatika</td>
                <td><div class="badge badge-success">Active</div></td>
                <td>2017-01-17</td>
                <td>2017-01-17</td>
                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
            </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">
            <ul class="pagination mb-0">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                <li class="page-item">
                <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                </li>
            </ul>
            </nav>
        </div>
        </div>
    </div>
@endsection