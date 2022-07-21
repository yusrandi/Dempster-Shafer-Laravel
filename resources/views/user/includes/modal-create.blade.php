<!-- Modal -->
<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Form User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Hak Akses</label>
                    <select class="form-select @error('role_id') is-invalid @enderror" 
                        aria-label="Default select example" name="role_id" required>
                        <option value="" disabled>Open this select menu</option>
                        <option value="1">Admin</option>
                        <option value="2">Pakar</option>
                        <option value="3">Pasien</option>
                    </select>

                </div>

                <div class="col mb-3">
                    <label for="nameBackdrop" class="form-label">Nama User</label>
                    <input type="text" id="nameBackdrop" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter User Fullname" name="name"  required>

                </div>
                <div class="col mb-3">
                    <label for="nameBackdrop" class="form-label">Alamat Lengkap</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                        placeholder="Enter User Address" name="address"  required>
                </div>
                <div class="col mb-3">
                    <label for="nameBackdrop" class="form-label">Nomor Hp</label>
                    <input type="number"  class="form-control @error('phone') is-invalid @enderror"
                        placeholder="Enter User Phone Number" name="phone" required>
                </div>
                <div class="col mb-3">
                    <label for="nameBackdrop" class="form-label">Password</label>
                    <input type="password"  class="form-control @error('password') is-invalid @enderror"
                        placeholder="Enter User Password" name="password" id="password" required minlength="8">
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
