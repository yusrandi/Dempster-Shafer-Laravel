<!-- Modal -->
<div class="modal fade" id="gejalaEditModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="{{ url('/produk-kategoris') }}" method="POST" id="editForm">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Form Edit Gejala</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col mb-3">
                    <label for="status" class="form-label">Status
                        Gejala</label>
                    <select class="form-select" aria-label="Default select example" name="status" required id="tes">
                        <option value="" disabled selected>Open this select menu</option>
                        <option value="G">Gejala</option>
                        <option value="C">Ciri-Ciri</option>
                    </select>

                </div>
                <div class="col mb-3">
                    <label for="nameBackdrop" class="form-label">Nama Gejala</label>
                    <input type="text" class="form-control" placeholder="Enter Name" name="gejala_nama"
                        id="gejala_nama" required>

                </div>
                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-company">Bobot</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                class="bx bx-hive"></i></span>
                        <input type="text" class="form-control " placeholder="0.2" aria-label="Bobot"
                            aria-describedby="basic-icon-default-company2" name="bobot" id="bobot" required />

                    </div>
                    <small class="text-muted">please use "." (dot) to separate and for value 0.0 - 1.0</small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
