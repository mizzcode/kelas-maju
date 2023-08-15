'use strict';
// modal create mahasiswa
$("#add").fireModal({
  title: 'Create a New Mahasiswa',
  body: 'Modal body text goes here.'
});

// modal untuk mahasiswa
$("#detailModel").on("show.bs.modal", function (event) {
  let button = $(event.relatedTarget);
  let id = button.data("id");
  let name = button.data("name");
  let nim = button.data("nim");
  let jurusan = button.data("jurusan");
  let status = button.data("status");
  let created_at = button.data("created_at");
  let updated_at = button.data("updated_at");

  let modal = $(this);
  modal.find(".modal-body #id").val(id);
  modal.find(".modal-body #name").val(name);
  modal.find(".modal-body #nim").val(nim);
  modal.find(".modal-body #jurusan").val(jurusan);
  modal.find(".modal-body #status").val(status);
  modal.find(".modal-body #created_at").val(created_at);
  modal.find(".modal-body #updated_at").val(updated_at);
})