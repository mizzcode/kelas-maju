@extends('layouts.main')

@section('title', "Mahasiswa | KelasMaju")

@section("css")
<link rel="stylesheet" href="{{asset("assets/library/prismjs/themes/prism.css")}}">
@endsection

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
                @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$mahasiswa->name}}</td>
                    <td>{{$mahasiswa->nim}}</td>
                    <td>{{$mahasiswa->jurusan}}</td>
                    @if ($mahasiswa->status == "Active")
                    <td><div class="badge badge-success">Active</div></td>
                    @else
                    <td><div class="badge badge-danger">Not Active</div></td>
                    @endif
                    <td>{{$mahasiswa->created_at}}</td>
                    <td>{{$mahasiswa->updated_at}}</td>
                    <td><button type="button" class="btn btn-secondary" data-id="{{$mahasiswa->id}}" data-name="{{$mahasiswa->name}}" data-nim="{{$mahasiswa->nim}}" data-jurusan="{{$mahasiswa->jurusan}}" data-status="{{$mahasiswa->status}}" data-created_at="{{$mahasiswa->created_at}}" data-updated_at="{{$mahasiswa->updated_at}}" data-toggle="modal" data-target="#detailModel">Detail</button></td>
                    </tr>
                @endforeach
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

@section("modal")
<div class="modal fade" tabindex="-1" role="dialog" id="detailModel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        {{-- param ke 2 dari route itu cuma data fake agar method update di controller tidak eror, 
            karena kita kirim id nya dari input hidden id dan value id ini di ambil lewat javascript--}}
        <form action="{{route("mahasiswa.update", "fake")}}" method="POST">
        @csrf
        @method("PUT")
            <div class="modal-body">
                <input type="hidden" name="mahasiswa_id" id="id">
                @include("admin.mahasiswa.form")
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        {{-- param ke 2 dari route itu cuma data fake agar method destroy di controller tidak eror, 
            karena kita kirim id nya dari input hidden id dan value id ini di ambil lewat javascript--}}
        <form action="{{route("mahasiswa.destroy", "fake")}}" method="post">
        @csrf
        @method("DELETE")
            <div class="modal-body">
                <input type="hidden" name="mahasiswa_id" id="id">
                <button type="submit" class="btn btn-danger mt-0">Delete</button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection

@section("libjs")
<script src="{{asset("assets/library/prismjs/prism.js")}}"></script>
@endsection

{{-- jQuery untuk ambil data mahasiswa dan mengirim ke class modal-body --}}
@section("js")
<script src="{{asset("assets/js/page/bootstrap-modal.js")}}"></script>
@endsection