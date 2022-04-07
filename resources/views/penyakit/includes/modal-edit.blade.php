<!-- Modal -->
<div class="modal fade" id="penyakitEditModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="{{ url('/penyakits') }}" method="POST" id="editForm">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Form Edit Gejala</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Kode Penyakit</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                class="bx bx-barcode-reader"></i></span>
                        <input type="text" class="form-control" id="penyakit_kode" placeholder="P0001"
                            aria-label="P0001" aria-describedby="basic-icon-default-fullname2" readonly
                            value="{{ $penyakit->penyakit_kode }}" name="penyakit_kode" required />

                    </div>
                </div>

                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-company">Nama Penyakit</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                class="bx bx-hive"></i></span>
                        <input type="text" id="penyakit_nama" class="form-control " placeholder="Nama Penyakit"
                            aria-label="Nama Penyakit" aria-describedby="basic-icon-default-company2"
                            name="penyakit_nama" value="{{ $penyakit->penyakit_nama }}" required />

                    </div>

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
