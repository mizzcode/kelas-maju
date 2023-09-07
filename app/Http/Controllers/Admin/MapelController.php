<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Mapel;
use App\Models\Teacher;

use Illuminate\Http\Request;

class MapelController extends Controller
{

    private function validateForm(Request $request, array $rules)
    {
        $validator = Validator::make($request->all(), $rules);
        return $validator;
    }

    public function index()
    {
        $mapel = Mapel::query()->latest()->paginate(5);
        $teacherIds = Teacher::select('id', 'name')->get();

        $title = "Hapus Mata Pelajaran!";
        $text = "Apakah Anda yakin untuk menghapus?";
        confirmDelete($title, $text);

        return view("admin.mapel.index", [
            "mapel" => $mapel,
            "teachersIds" => $teacherIds
        ]);
    }

    public function store(Request $request)
    {
        $validator = $this->validateForm($request, [
            "name" => "required"
        ]);

        // jika gagal validasi sesuai rules
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with("errorCreateMapel", "Gagal menambah mata pelajaran baru.");
        } else {

            // Lakukan insert
            $insertMapel = Mapel::create([
                'name' => $request->name,
                'teacher_id' => $request->teacher_id
            ]);

            if ($insertMapel) {

                return redirect()->route("mapel.index")->with("successCreateMapel", "Berhasil menambahkan mata pelajaran baru.");
            }
        }
    }

    public function update(Request $request)
    {

        $validator = $this->validateForm($request, [
            "name" => "required"
        ]);

        // jika gagal validasi sesuai rules
        if ($validator->fails()) {
            return redirect()->back()
                ->with("requiredFieldsUpdate", "Anda harus mengisi bidang yang tersedia.");
        } else {

            // Lakukan update berdasarkan ID mapel pada modal update
            $mapel = Mapel::query()->findOrFail($request->mapel_id);

            $mapel->name = $request->name;
            $mapel->teacher_id = $request->teacher_id;

            // Cek jika berhasil di update
            if ($mapel->save()) {

                // Kirim pesan
                return redirect()->route("mapel.index")->with("successUpdateMapel", "Data mata pelajaran berhasil di update.");

                // Kalo gagal
            } else {
                back()->with("errorUpdateMapel", "Gagal memperbarui data mata pelajaran.");
            }
        }
    }

    public function destroy(string $id)
    {

        $mapel = Mapel::query()->findOrFail($id);

        if ($mapel->delete()) {

            return redirect()->route("mapel.index")->with("successDeleteMapel", "Data mata pelajaran berhasil di delete.");
        } else {
            return back()->with("errorDeleteMapel", "Gagal menghapus data mata pelajaran.");
        }
    }
}
