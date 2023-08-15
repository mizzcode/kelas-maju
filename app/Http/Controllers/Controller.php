<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('successUpdateMahasiswa')) {
                Alert::success("Berhasil Update", session("successUpdateMahasiswa"));
            }

            if (session('errorUpdateMahasiswa')) {
                Alert::error("Gagal Update", session("errorUpdateMahasiswa"));
            }

            if (session('successDeleteMahasiswa')) {
                Alert::success("Berhasil Hapus", session("successDeleteMahasiswa"));
            }

            if (session('errorDeleteMahasiswa')) {
                Alert::error("Gagal Hapus", session("errorDeleteMahasiswa"));
            }

            if (session('login')) {
                Alert::success("Berhasil Login", session('login'));
            }

            if (session('errorLogin')) {
                Alert::error("Gagal Login", session('errorLogin'));
            }

            if (session('logout')) {
                Alert::success("Berhasil Logout", session('logout'));
            }

            return $next($request);
        });
    }
}
