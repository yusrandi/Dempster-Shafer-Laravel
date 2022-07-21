@extends('layouts.app')
@section('title', 'Data User')
@section('page_css')

@endsection
@section('content')
    <!-- Content -->


    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Data User</h4>

        <!-- Bootstrap modals -->
        <div class="card">
            <h5 class="card-header">Data User</h5>
            <div class="card-body">
                <div class="row gy-3">

                    <!-- Modal Backdrop -->
                    <div class="col-lg-12">
                        <div class="mt-0">

                            @if (auth()->user()->id == 1)
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#backDropModal">
                                    Tambah User
                                </button>

                            @endif
                            
                            @include('user.includes.modal-create')
                            @include('user.includes.modal-edit')

                            <div class="col-md-12 mt-3">
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="#example1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama User</th>
                                                <th>Alamat</th>
                                                <th>Nomor Hp</th>
                                                <th class="text-center">Hak Akses</th>
                                                @if (auth()->user()->id == 1)
                                                <th class="text-end">Actions</th>                                                    
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->address }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td class="text-center">
                                                

                                                        @if ($item->role_id == 1)
                                                            <span class="badge bg-primary">Admin</span>
                                                        @else @if ($item->role_id == 2)
                                                            <span class="badge bg-success">Pakar</span>
                                                        @else
                                                            <span class="badge bg-danger">Pasien</span>
                                                        @endif
                                                            
                                                        @endif
                                                    </td>
                                                       
                                                    @if (auth()->user()->id == 1)
                                                    <td class="text-end">
                                                        <a href="#gejalaEditModal" class="btn btn-success btn-sm edit"
                                                            data-bs-toggle="modal" data-bs-target="#gejalaEditModal"
                                                            data-id="{{ $item }}">
                                                            <i class="bx bx-pencil"></i>
                                                        </a>
                                                        <a href="#" id="delete" class="btn btn-danger btn-sm delete"
                                                            data-id="{{ $item->id }}">
                                                            <i class="bx bx-trash"></i>

                                                        </a>

                                                    </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>



        </div>
        <!--/ Bootstrap modals -->



    </div>

    <!-- / Content -->
@endsection
@section('page_js')
    @include('utils.toastr')
    <script type="text/javascript">
        $(function() {


            $('.delete').click(function() {
                var data = $(this).attr('data-id');
                swal({
                        title: "Anda yakin?",
                        text: "Anda akan menghapus data ini!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "user/delete/" + data;
                        } else {
                            swal("Your data is safe!");
                        }
                    });


            });
            $('.edit').click(function() {
                var data = $(this).attr('data-id');
                console.log(data);
                var obj = jQuery.parseJSON(data);
                // alert(obj.gejala_kode);

                $('#name').val(obj.name);
                $('#role_id').val(obj.role_id);
                $('#phone').val(obj.phone);
                $('#address').val(obj.address);



                $('#editForm').attr('action', 'user/' + obj.id);


            });
        });
    </script>
@endsection
