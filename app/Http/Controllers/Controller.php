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

            // alert user
            if (session('successCreateUser')) {
                Alert::success("Success", session("successCreateUser"));
            }

            if (session('errorCreateUser')) {
                Alert::error("Error", session("errorCreateUser"));
            }

            if (session('successUpdateUser')) {
                Alert::success("Success", session("successUpdateUser"));
            }

            if (session('errorUpdateUser')) {
                Alert::error("Error", session("errorUpdateUser"));
            }

            if (session('successDeleteUser')) {
                Alert::success("Success", session("successDeleteUser"));
            }

            if (session('errorDeleteUser')) {
                Alert::error("Error", session("errorDeleteUser"));
            }
            // alert student
            if (session('successCreateStudent')) {
                Alert::success("Success", session("successCreateStudent"));
            }

            if (session('errorCreateStudent')) {
                Alert::error("Error", session("errorCreateStudent"));
            }

            if (session('successUpdateStudent')) {
                Alert::success("Success", session("successUpdateStudent"));
            }

            if (session('errorUpdateStudent')) {
                Alert::error("Error", session("errorUpdateStudent"));
            }

            if (session('successDeleteStudent')) {
                Alert::success("Success", session("successDeleteStudent"));
            }

            if (session('errorDeleteStudent')) {
                Alert::error("Error", session("errorDeleteStudent"));
            }
            
            // alert teacher
            if (session('successCreateTeacher')) {
                Alert::success("Success", session("successCreateTeacher"));
            }

            if (session('errorCreateTeacher')) {
                Alert::error("Error", session("errorCreateTeacher"));
            }

            if (session('successUpdateTeacher')) {
                Alert::success("Success", session("successUpdateTeacher"));
            }

            if (session('errorUpdateTeacher')) {
                Alert::error("Error", session("errorUpdateTeacher"));
            }

            if (session('successDeleteTeacher')) {
                Alert::success("Success", session("successDeleteTeacher"));
            }

            if (session('errorDeleteTeacher')) {
                Alert::error("Error", session("errorDeleteTeacher"));
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
