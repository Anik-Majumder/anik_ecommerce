@extends('backend.layout.master')

@section('title','customers')

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
                                <li class="breadcrumb-item active">Customers</li>
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
                            <!-- Satic modal button -->
                            <div class="mb-1">
                                <!-- Satic modal -->
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"
                                >
                                    Add Customers
                                </button>
                            </div>
                            <!-- Satic modal button end-->
                            <table
                                id="customerTable"
                                class="table table-striped table-bordered dt-responsive nowrap"
                                style="
                                border-collapse: collapse;
                                border-spacing: 0;
                                width: 100%;
                            "
                            >
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>District</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- start add modal -->

            <div class="row">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div
                        class="modal fade addModal"
                        id="staticBackdrop"
                        data-bs-backdrop="static"
                        data-bs-keyboard="false"
                        tabindex="-1"
                        aria-labelledby="staticBackdropLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="staticBackdropLabel"
                                    >
                                        Add Customers
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>
                                </div>
                                <div class="modal-body">
                                    <!-- start add modal form-->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form
                                                        id="customerAddForm"
                                                        class="needs-validation"
                                                        novalidate
                                                    >
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Name</label
                                                                    >
                                                                    <input
                                                                        name="customer_name"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="validationCustom01"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Email</label
                                                                    >
                                                                    <input
                                                                        name="customer_email"
                                                                        class="form-control"
                                                                        type="email"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Address</label
                                                                    >
                                                                    <input
                                                                        name="customer_address"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="validationCustom01"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >District</label
                                                                    >
                                                                    <input
                                                                        name="customer_district"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Country</label
                                                                    >
                                                                    <input
                                                                        name="country"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button
                                                                type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal"
                                                            >
                                                                Close
                                                            </button>
                                                            <button
                                                                class="btn btn-primary"
                                                                type="submit"
                                                            >
                                                                Save
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <!-- end modal form -->
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
            <!-- end row -->
            <!-- end add modal -->

            <!-- start edit modal -->
            <div class="row">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div
                        class="modal fade editModal"
                        id="editModal"
                        data-bs-backdrop="static"
                        data-bs-keyboard="false"
                        tabindex="-1"
                        aria-labelledby="staticBackdropLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="staticBackdropLabel"
                                    >
                                        Edit Customers
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>
                                </div>
                                <div class="modal-body">
                                    <!-- start edit modal form-->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form
                                                        id="customerFormUpdate"
                                                        class="needs-validation"
                                                        novalidate
                                                    >
                                                        @csrf @method('PUT')
                                                        <input
                                                            type="text"
                                                            id="edit_id"
                                                            name="edit_id"
                                                        />
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Name</label
                                                                    >
                                                                    <input
                                                                        name="customer_name"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="customer_name"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Email</label
                                                                    >
                                                                    <input
                                                                        name="customer_email"
                                                                        class="form-control"
                                                                        type="email"
                                                                        id="customer_email"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Address</label
                                                                    >
                                                                    <input
                                                                        name="customer_address"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="customer_address"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >District</label
                                                                    >
                                                                    <input
                                                                        name="customer_district"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="customer_district"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Country</label
                                                                    >
                                                                    <input
                                                                        name="country"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="country"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button
                                                                type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal"
                                                            >
                                                                Close
                                                            </button>
                                                            <button
                                                                class="btn btn-primary"
                                                                type="submit"
                                                            >
                                                                Save
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <!-- end modal form -->
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            </div>
            <!-- end row -->
            <!-- end edit modal -->
        </div>
        <!-- End Page-content -->
    </div>

@endsection


@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
    ></script>

    <script>
        // render datatables

        var token = $("input[name='_token']").val();

        let customerTable = $("#customerTable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get-customer-data') }}",

            columns: [
                {
                    data: "id",
                },
                {
                    data: "customer_name",
                },
                {
                    data: "customer_email",
                },
                {
                    data: "customer_address",
                },
                {
                    data: "customer_district",
                },
                {
                    data: "country",
                },
                {
                    data: "action",
                    name: "Action",
                    orderable: false,
                    searchable: false,
                },
            ],
        });

        // add customer

        $("#customerAddForm").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('customer.store') }}",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log("success");

                    $("#customerAddForm")[0].reset();
                    $(".addModal").modal("hide");
                    customerTable.ajax.reload();
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // read customer

        $(document).on("click", ".edit-btn", function () {
            let id = $(this).data("id");
            console.log(id);

            // $('#id').val(id);

            $.ajax({
                url: "{{ url('admin/customers') }}/" + id + "/edit",
                type: "GET",
                data: {
                    id: id,
                },
                processData: false,
                contentType: false,
                success: function (res) {
                    $("#edit_id").val(res.data.id);
                    $("#customer_name").val(res.data.customer_name);
                    $("#customer_email").val(res.data.customer_email);
                    $("#customer_address").val(res.data.customer_address);
                    $("#customer_district").val(res.data.customer_district);
                    $("#country").val(res.data.country);
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // update customer

        $("#customerFormUpdate").submit(function (e) {
            e.preventDefault();
            let id = $("#edit_id").val();

            $.ajax({
                url: "{{ url('admin/customers') }}/" + id,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log("success");

                    $("#customerFormUpdate")[0].reset();
                    $("#editModal").modal("hide");
                    customerTable.ajax.reload();
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // Delete customer

        $(document).on("click", "#deleteCustomerBtn", function () {
            let id = $(this).data("id");
            console.log(id);

            $.ajax({
                url: "{{ url('admin/customers') }}/" + id,
                data: {
                    _token: token,
                },
                type: "DELETE",
                // headers: {
                //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                // },
                success: function (res) {
                    customerTable.ajax.reload();
                    console.log("success");
                },
                eror: function (err) {
                    console.log(err);
                },
            });
        });
    </script>
@endpush
