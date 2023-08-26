@extends('layouts.main')

@section('title', "Teacher | KelasMaju")

@section("css")
<link rel="stylesheet" href="{{asset("assets/library/prismjs/themes/prism.css")}}">
@endsection

@section('content-header')
<h1>Guru</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{route("dashboard")}}">Dashboard</a></div>
    <div class="breadcrumb-item">Guru</div>
</div>
@endsection

@section('content-body') 
    <div class="col-md-6 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Seluruh Data Guru</h4>
        </div>
        <div class="card-body p-0">
            <p class="px-4">Berikut adalah daftar seluruh guru.</p>
            {{-- id add akan di tangkap jqeury untuk membuat modal
                cek di bootstrap-modal.js --}}
            <div class="m-3 d-flex align-items-center justify-content-end">
                <button class="btn btn-success" data-toggle="modal" data-target="#add">Add Guru</button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                <th>#</th>
                <th>NAME</th>
                <th>NIP</th>
                <th>PENDIDIKAN</th>
                <th>STATUS</th>
                <th>CREATED AT</th>
                <th>ACTION</th>
                </tr>
                @foreach ($teachers as $teacher)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->nip}}</td>
                    <td>{{$teacher->education}}</td>
                    @if ($teacher->status == "Active")
                    <td><div class="badge badge-success">Active</div></td>
                    @else
                    <td><div class="badge badge-danger">Not Active</div></td>
                    @endif
                    <td>{{$teacher->created_at}}</td>
                    <td>
                        <a href="{{ route('teacher.destroy', $teacher->id) }}" class="btn btn-danger" 
                            data-confirm-delete="true">Delete
                        </a>
                        <button class="btn btn-info" data-id="{{$teacher->id}}" 
                            data-email="{{$teacher->email}}"
                            data-name="{{$teacher->name}}" 
                            data-nip="{{$teacher->nip}}"
                            data-education="{{$teacher->education}}" data-gender="{{$teacher->gender}}" 
                            data-status="{{$teacher->status}}" 
                            data-created_at="{{$teacher->created_at}}" 
                            data-updated_at="{{$teacher->updated_at}}" data-toggle="modal" 
                            data-target="#detailModel">Detail
                        </button>
                    </td>
                    </tr>
                @endforeach
            </table>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            {{$teachers->links()}}
        </div>
        </div>
    </div>
@endsection

@section("modal")
    {{-- modal create teacher --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="add">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create a New Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route("teacher.store")}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    <label for="email">EMAIL</label>
                                    <input type="text" class="form-control @error("email") is-invalid @enderror" name="email" value="{{old("email")}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="name">NAME</label>
                                    <input type="text" class="form-control @error("name") is-invalid @enderror" name="name" value="{{old("name")}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nip">NIP</label>
                                        <input type="number" class="form-control @error("nip") is-invalid @enderror" name="nip" value="{{old("nip")}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    <label for="education">PENDIDIKAN</label>
                                    <input type="text" class="form-control @error("education") is-invalid @enderror" name="education" value="{{old("education")}}"">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="gender">JENIS KELAMIN</label>
                                    <select class="form-control" name="gender">
                                        <option value="Pria">Laki-Laki</option>
                                        <option value="Wanita">Perempuan</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status">STATUS</label>
                                        <select class="form-control" name="status">
                                            <option value="Active">Active</option>
                                            <option value="Not Active">Not Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal detail teacher--}}
    <div class="modal fade" tabindex="-1" role="dialog" id="detailModel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Guru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            {{-- form untuk update --}}
            {{-- param ke 2 dari route itu cuma data fake agar method update di controller tidak eror, 
                karena kita kirim id nya dari input hidden id dan value id ini di ambil lewat javascript--}}
            <form action="{{route("teacher.update", "fake")}}" method="POST">
            @csrf
            @method("PUT")
                <div class="modal-body">
                    <input type="hidden" name="teacher_id" id="id">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="email">EMAIL</label>
                                <input type="email" class="form-control @error("email") is-invalid @enderror" name="email" id="email">
                                </div>
                            </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="name">NAME</label>
                            <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nip">NIP</label>
                                <input type="number" class="form-control" id="nip" name="nip">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="education">PENDIDIKAN</label>
                            <input type="text" class="form-control @error("education") is-invalid @enderror" name="education" id="education">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="gender">JENIS KELAMIN</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="Pria">Laki-Laki</option>
                                <option value="Wanita">Perempuan</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">STATUS</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="Active">Active</option>
                                    <option value="Not Active">Not Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="created_at">DI BUAT</label>
                            <input type="datetime-local" class="form-control" id="created_at" name="created_at" readonly>
                        </div>
                        <div class="form-group">
                            <label for="updated_at">DI UPDATE</label>
                            <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection

@section("libjs")
<script src="{{asset("assets/library/prismjs/prism.js")}}"></script>
@endsection

{{-- jQuery untuk ambil data guru dari database dan mengirim ke class modal-body --}}
@section("js")
<script src="{{asset("assets/js/page/bootstrap-modal.js")}}"></script>
@endsection