<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Mapel;
use App\Models\Teacher;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MapelController extends Controller
{

    private function useValidator(Request $request, array $rules)
    {
        $validator = Validator::make($request->all(), $rules);
        return $validator;
    }

    public function index()
    {
        $mapels = Mapel::query()->latest()->paginate(5);
        $teachers = Teacher::query()->latest()->paginate(5);

        $title = "Hapus Mata Pelajaran!";
        $text = "Apakah Anda yakin untuk menghapus?";
        confirmDelete($title, $text);

        return view("admin.mapel.index", [
            "mapels" => $mapels,
            "teachers" => $teachers
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validator = $this->useValidator($request, [
                "name" => "required",
                "teacher_id" => "required"
            ]);
    
            // jika gagal validasi sesuai rules
            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with("errorCreateMapel", "Gagal menambah mata pelajaran baru.");
            }
            // menerima input yang sudah tervalidasi
            $validated = $validator->validated();
    
            // Lakukan insert
            Mapel::query()->create($validated);

            return redirect()->route("mapel.index")->with("successCreateMapel", "Berhasil menambahkan mata pelajaran baru.");
        } catch (QueryException $e) {
            Log::info($e);
            dd($e->getMessage());
            return redirect()->back()->with("errorCreateMapel", "Gagal menambah mata pelajaran baru.");
        }
    }

    public function update(Request $request)
    {
        try {
            $mapel = Mapel::query()->findOrFail($request->mapel_id);

            $validator = $this->useValidator($request, [
                "name" => "required",
                "teacher_id" => "required"
            ]);
    
            // jika gagal validasi sesuai rules
            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with("errorUpdateMapel", "Gagal menambah mata pelajaran baru.");
            }
            // menerima input yang sudah tervalidasi
            $validated = $validator->validated();
    
            // Lakukan insert
            Mapel::query()->where('id', '=', $mapel->id)->update($validated);

            return redirect()->route("mapel.index")->with("successUpdateMapel", "Berhasil menambahkan mata pelajaran baru.");
        } catch (QueryException $e) {
            Log::info($e);
            dd($e->getMessage());
            return redirect()->back()->with("errorUpdateMapel", "Gagal menambah mata pelajaran baru.");
        }
    }

    public function destroy(string $id)
    {
        try {
            Mapel::query()->where('id', '=', $id)->delete();

            return redirect()->route("mapel.index")->with("successDeleteMapel", "Data mata pelajaran berhasil di delete.");
        } catch (QueryException $e) {
            Log::info($e);
            dd($e->getMessage());
            return back()->with("errorDeleteMapel", "Gagal menghapus data mata pelajaran.");
        } 
    }
}