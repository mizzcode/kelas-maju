    <div class="card">
        <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="name">NAME</label>
            <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group col-md-6">
                <label for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="jurusan">JURUSAN</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan">
            </div>
            <div class="form-group col-md-4">
            <label for="status">STATUS</label>
            <select id="status" class="form-control" name="status">
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