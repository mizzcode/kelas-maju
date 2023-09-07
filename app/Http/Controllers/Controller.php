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

            // Alert user
            switch (true) {
                case session('successCreateUser'):
                    Alert::success("Success", session("successCreateUser"));
                    break;

                case session('errorCreateUser'):
                    Alert::error("Error", session("errorCreateUser"));
                    break;

                case session('successUpdateUser'):
                    Alert::success("Success", session("successUpdateUser"));
                    break;

                case session('errorUpdateUser'):
                    Alert::error("Error", session("errorUpdateUser"));
                    break;

                case session('successDeleteUser'):
                    Alert::success("Success", session("successDeleteUser"));
                    break;

                case session('errorDeleteUser'):
                    Alert::error("Error", session("errorDeleteUser"));
                    break;

                    // Alert student
                case session('successCreateStudent'):
                    Alert::success("Success", session("successCreateStudent"));
                    break;

                case session('errorCreateStudent'):
                    Alert::error("Error", session("errorCreateStudent"));
                    break;

                case session('successUpdateStudent'):
                    Alert::success("Success", session("successUpdateStudent"));
                    break;

                case session('errorUpdateStudent'):
                    Alert::error("Error", session("errorUpdateStudent"));
                    break;

                case session('successDeleteStudent'):
                    Alert::success("Success", session("successDeleteStudent"));
                    break;

                case session('errorDeleteStudent'):
                    Alert::error("Error", session("errorDeleteStudent"));
                    break;

                    // Alert teacher
                case session('successCreateTeacher'):
                    Alert::success("Success", session("successCreateTeacher"));
                    break;

                case session('errorCreateTeacher'):
                    Alert::error("Error", session("errorCreateTeacher"));
                    break;

                case session('successUpdateTeacher'):
                    Alert::success("Success", session("successUpdateTeacher"));
                    break;

                case session('errorUpdateTeacher'):
                    Alert::error("Error", session("errorUpdateTeacher"));
                    break;

                case session('successDeleteTeacher'):
                    Alert::success("Success", session("successDeleteTeacher"));
                    break;

                case session('errorDeleteTeacher'):
                    Alert::error("Error", session("errorDeleteTeacher"));
                    break;

                case session('login'):
                    Alert::success("Success", session('login'));
                    break;

                case session('errorLogin'):
                    Alert::error("Error", session('errorLogin'));
                    break;

                case session('logout'):
                    Alert::success("Success", session('logout'));
                    break;

                    // Alert mapel
                case session('successCreateMapel'):
                    Alert::success("Success", session("successCreateMapel"));
                    break;

                case session('errorCreateMapel'):
                    Alert::error("Error", session("errorCreateMapel"));
                    break;

                case session('successUpdateMapel'):
                    Alert::success("Success", session("successUpdateMapel"));
                    break;

                case session('errorUpdateMapel'):
                    Alert::error("Error", session("errorUpdateMapel"));
                    break;

                case session('requiredFieldsUpdate'):
                    Alert::error("Error", session("requiredFieldsUpdate"));
                    break;

                case session('successDeleteMapel'):
                    Alert::success("Success", session("successDeleteMapel"));
                    break;

                case session("errorDeleteMapel"):
                    Alert::error("Error", session("errorDeleteMapel"));
                    break;
            }

            return $next($request);
        });
    }
}
