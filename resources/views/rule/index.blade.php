@extends('layouts.app')
@section('title', 'Data Rule')
@section('page_css')

@endsection
@section('content')
    <!-- Content -->


    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Rule /</span> Data Rule</h4>

        <!-- Bootstrap modals -->
        <div class="card">
            <h5 class="card-header">Data Rule</h5>
            <div class="card-body">
                <div class="row gy-3">
                    {{-- @livewire('wirerule') --}}
                    <!-- Modal Backdrop -->
                    <div class="col-lg-12">
                        <div class="mt-0">
                            <div class="col-md-12 mt-3">
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="#example1">
                                        
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                        
                                    </table>
                                    
                                </div>
                                <div class="d-flex justify-content-center">
                                    {{ $data->appends(Request::only('rule'))->links()}}
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
   
@endsection
