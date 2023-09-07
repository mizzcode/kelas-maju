'use strict';

// ketika modal muncul maka buat event
$("#detailModel").on("show.bs.modal", function (event) {
  // relatedTarget untuk id button yang di klik
  let button = $(event.relatedTarget);
  // jadi ambil semua data nya yang sesuai di klik button nya
  let id = button.data("id");
  let email = button.data("email");
  let name = button.data("name");
  let nis = button.data("nis");
  let nip = button.data("nip");
  let education = button.data("education");
  let gender = button.data("gender");
  let jurusan = button.data("jurusan");
  let status = button.data("status");
  let role = button.data("role");
  let created_at = button.data("created_at");
  let updated_at = button.data("updated_at");
  let teacher_id = button.data("teacher_id");

  // menunjukkan modal saat ini
  let modal = $(this);
  // mencari modal dengan class modal-body
  // kemudian di dalam modal-body ada input yang id nya sesuai akan di isi value dari masing2 data yang sudah di set di atas
  modal.find(".modal-body #id").val(id);
  modal.find(".modal-body #email").val(email);
  modal.find(".modal-body #name").val(name);
  modal.find(".modal-body #nis").val(nis);
  modal.find(".modal-body #nip").val(nip);
  modal.find(".modal-body #education").val(education);
  modal.find(".modal-body #gender").val(gender);
  modal.find(".modal-body #jurusan").val(jurusan);
  modal.find(".modal-body #status").val(status);
  modal.find(".modal-body #role").val(role);
  modal.find(".modal-body #created_at").val(created_at);
  modal.find(".modal-body #updated_at").val(updated_at);
  modal.find(".modal-body #teacher_id").val(teacher_id);
})