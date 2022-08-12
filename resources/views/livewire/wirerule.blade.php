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
                {{ $data->links()}}
            </div>
        </div>

    </div>
</div>