<!-- Modal -->
<div class="modal fade" id="basisPengetahuanEditModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="{{ url('/basisPengetahuans') }}" method="POST" id="editForm">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Form Edit Basis Pengetahuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Pilih Penyakit</label>
                    <select class="form-select " id="penyakit_id" aria-label="Default select example"
                        name="penyakit_id" required>
                        <option value="" disabled>Open this select menu</option>

                        @foreach ($penyakits as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->penyakit_kode . ' | ' . $item->penyakit_nama }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="col mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Pilih Gejala</label>
                    <select class="form-select " id="gejala_id" aria-label="Default select example" name="gejala_id"
                        required>
                        <option value="" disabled>Open this select menu</option>

                        @foreach ($gejalas as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->gejala_kode . ' | ' . $item->gejala_nama }}
                            </option>
                        @endforeach
                    </select>


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
