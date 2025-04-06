@extends('backend.layout.master')

@section('title','cart')

@push('css')
    <style></style>
@endpush

@section('content')

    <div class="main-content">
        <div class="page-content">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div
                        class="page-title-box d-flex align-items-center justify-content-between"
                    >
                        <h4 class="page-title mb-0 font-size-18">Data Tables</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Tables</a>
                                </li>
                                <li class="breadcrumb-item active">Product</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                                <table
                                    id="cartTable"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    width: 100%;
                                    white-space: nowrap;
                                "
                                >
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>User Id</th>
                                        <th>Product Id</th>
                                        <th>Sale Price</th>
                                        <th>Old Price</th>
                                        <th>Quantity</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- End Page-content -->
    </div>

@endsection


@push('js')
    <script>
        // render datatables
        var token = $("input[name='_token']").val();

        let cartTable =$("#cartTable").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('get-cart-data') }}",
                scrollX: true,
                autoWidth: false,
                responsive: true,
                columns: [
                    { data: 'id' },
                    { data: 'user_id' },
                    { data: 'product_id' },
                    { data: 'new_price' },
                    { data: 'old_price' },
                    { data: 'quantity' },
                    { data: 'size' },
                    { data: 'color' },
                ],
            });

    </script>
@endpush
