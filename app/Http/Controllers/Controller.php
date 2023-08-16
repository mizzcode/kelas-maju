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
            if (session('successCreateMahasiswa')) {
                Alert::success("Success", session("successCreateMahasiswa"));
            }

            if (session('errorCreateMahasiswa')) {
                Alert::error("Error", session("errorCreateMahasiswa"));
            }

            if (session('successUpdateMahasiswa')) {
                Alert::success("Success", session("successUpdateMahasiswa"));
            }

            if (session('errorUpdateMahasiswa')) {
                Alert::error("Error", session("errorUpdateMahasiswa"));
            }

            if (session('successDeleteMahasiswa')) {
                Alert::success("Success", session("successDeleteMahasiswa"));
            }

            if (session('errorDeleteMahasiswa')) {
                Alert::error("Error", session("errorDeleteMahasiswa"));
            }

            if (session('login')) {
                Alert::success("Success", session('login'));
            }

            if (session('errorLogin')) {
                Alert::error("Error", session('errorLogin'));
            }

            if (session('logout')) {
                Alert::success("Success", session('logout'));
            }

            return $next($request);
        });
    }
}
