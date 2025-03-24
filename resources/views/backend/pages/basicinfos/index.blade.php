@extends('backend.layout.master')

@section('title','basicInfos')

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
                                <li class="breadcrumb-item active">Basic Info</li>
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
                                    Add Basic Info
                                </button>
                            </div>
                            <!-- Satic modal button end-->
                            <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                                <table
                                    id="basicinfoTable"
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
                                        <th>Dark Logo</th>
                                        <th>Light Logo</th>
                                        <th>Website Name</th>
                                        <th>Short Desc</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Phone-1</th>
                                        <th>Phone-2</th>
                                        <th>FB Link</th>
                                        <th>Insta Link</th>
                                        <th>LinkedIn Link</th>
                                        <th>YouTube Link</th>
                                        <th>Action</th>
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
                                        Add Basic Info
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
                                                        id="basicinfoAddForm"
                                                        class="needs-validation"
                                                        novalidate
                                                    >
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Website
                                                                        Name</label
                                                                    >
                                                                    <input
                                                                        name="site_name"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="validationCustom01"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Short
                                                                        Desc</label
                                                                    >
                                                                    <input
                                                                        name="short_desc"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="validationCustom01"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Address</label
                                                                    >
                                                                    <input
                                                                        name="address"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="validationCustom01"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Email</label
                                                                    >
                                                                    <input
                                                                        name="email"
                                                                        class="form-control"
                                                                        type="email"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Phone
                                                                        1</label
                                                                    >
                                                                    <input
                                                                        name="phone_1"
                                                                        class="form-control"
                                                                        type="number"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Phone
                                                                        2</label
                                                                    >
                                                                    <input
                                                                        name="phone_2"
                                                                        class="form-control"
                                                                        type="number"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Fb
                                                                        Link</label
                                                                    >
                                                                    <input
                                                                        name="fb_link"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Insta
                                                                        Link</label
                                                                    >
                                                                    <input
                                                                        name="insta_link"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Linkdin
                                                                        Link</label
                                                                    >
                                                                    <input
                                                                        name="linkdin_link"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Youtube
                                                                        Link</label
                                                                    >
                                                                    <input
                                                                        name="youtube_link"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="input-group-text"
                                                                        for="inputGroupFile02"
                                                                    >Upload
                                                                        Light
                                                                        Logo</label
                                                                    >
                                                                    <input
                                                                        name="light_logo"
                                                                        type="file"
                                                                        class="form-control"
                                                                        id="inputGroupFile02"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="input-group-text"
                                                                        for="inputGroupFile02"
                                                                    >Upload Dark
                                                                        Logo</label
                                                                    >
                                                                    <input
                                                                        name="dark_logo"
                                                                        type="file"
                                                                        class="form-control"
                                                                        id="inputGroupFile02"
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
                                        Edit Basicinfo
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
                                                        id="basicinfoFormUpdate"
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
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Website
                                                                        Name</label
                                                                    >
                                                                    <input
                                                                        name="site_name"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="site_name"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Short
                                                                        Desc</label
                                                                    >
                                                                    <input
                                                                        name="short_desc"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="short_desc"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Address</label
                                                                    >
                                                                    <input
                                                                        name="address"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="address"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Email</label
                                                                    >
                                                                    <input
                                                                        name="email"
                                                                        class="form-control"
                                                                        type="email"
                                                                        id="email"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Phone
                                                                        1</label
                                                                    >
                                                                    <input
                                                                        name="phone_1"
                                                                        class="form-control"
                                                                        type="number"
                                                                        id="phone_1"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Phone
                                                                        2</label
                                                                    >
                                                                    <input
                                                                        name="phone_2"
                                                                        class="form-control"
                                                                        type="number"
                                                                        id="phone_2"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Fb
                                                                        Link</label
                                                                    >
                                                                    <input
                                                                        name="fb_link"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="fb_link"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Insta
                                                                        Link</label
                                                                    >
                                                                    <input
                                                                        name="insta_link"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="insta_link"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Linkdin
                                                                        Link</label
                                                                    >
                                                                    <input
                                                                        name="linkdin_link"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="linkdin_link"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Youtube
                                                                        Link</label
                                                                    >
                                                                    <input
                                                                        name="youtube_link"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="youtube_link"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="input-group-text"
                                                                        for="inputGroupFile02"
                                                                    >Upload
                                                                        Light
                                                                        Logo</label
                                                                    >
                                                                    <input
                                                                        name="light_logo"
                                                                        type="file"
                                                                        class="form-control"
                                                                        id="inputGroupFile02"
                                                                    />
                                                                    <img
                                                                        src=""
                                                                        alt=""
                                                                        width="40px"
                                                                        height="40px"
                                                                        id="light_logo"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="input-group-text"
                                                                        for="inputGroupFile02"
                                                                    >Upload Dark
                                                                        Logo</label
                                                                    >
                                                                    <input
                                                                        name="dark_logo"
                                                                        type="file"
                                                                        class="form-control"
                                                                        id="inputGroupFile02"
                                                                    />
                                                                    <img
                                                                        src=""
                                                                        alt=""
                                                                        width="40px"
                                                                        height="40px"
                                                                        id="dark_logo"
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

        let basicinfoTable = $("#basicinfoTable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get-basicinfos-data') }}",
            // ✅ Enable horizontal scrolling
            scrollX: true,
            autoWidth: false,
            responsive: true,

            columns: [
                {
                    data: "id",
                },
                {
                    data: "light_logo",
                },
                {
                    data: "dark_logo",
                },
                {
                    data: "site_name",
                },
                {
                    data: "short_desc",
                    render: function(data) {
                        return `<div style="
                    white-space: normal;
                    word-wrap: break-word;
                    overflow-wrap: break-word;
                    width: 200px;
                    max-height: 80px;
                    overflow-y: auto;
                    border: 1px solid #ccc;
                    padding: 4px;
                ">${data}</div>`;
                    }
                },
                {
                    data: "address",
                },
                {
                    data: "email",
                },
                {
                    data: "phone_1",
                },
                {
                    data: "phone_2",
                },
                {
                    data: "fb_link",
                },
                {
                    data: "insta_link",
                },
                {
                    data: "linkdin_link",
                },
                {
                    data: "youtube_link",
                },
                {
                    data: "action",
                    name: "Action",
                    orderable: false,
                    searchable: false,
                },
            ],
        });

        // add basicinfos

        $("#basicinfoAddForm").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('basicinfos.store') }}",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log("success");

                    $("#basicinfoAddForm")[0].reset();
                    $(".addModal").modal("hide");
                    basicinfoTable.ajax.reload();
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // read basicinfos
        let asset_path = "{{ asset('') }}";
        $(document).on("click", ".edit-btn", function () {
            let id = $(this).data("id");
            console.log(id);

            // $('#id').val(id);

            $.ajax({
                url: "{{ url('admin/basicinfos') }}/" + id + "/edit",
                type: "GET",
                data: {
                    id: id,
                },
                processData: false,
                contentType: false,
                success: function (res) {
                    $("#edit_id").val(res.data.id);
                    $("#light_logo").attr("src", asset_path + res.data.light_logo);
                    $("#dark_logo").attr("src", asset_path + res.data.dark_logo);
                    $("#site_name").val(res.data.site_name);
                    $("#short_desc").val(res.data.short_desc);
                    $("#address").val(res.data.address);
                    $("#email").val(res.data.email);
                    $("#phone_1").val(res.data.phone_1);
                    $("#phone_2").val(res.data.phone_2);
                    $("#fb_link").val(res.data.fb_link);
                    $("#insta_link").val(res.data.insta_link);
                    $("#linkdin_link").val(res.data.linkdin_link);
                    $("#youtube_link").val(res.data.youtube_link);
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // update basicinfos

        $("#basicinfoFormUpdate").submit(function (e) {
            e.preventDefault();
            let id = $("#edit_id").val();

            $.ajax({
                url: "{{ url('admin/basicinfos') }}/" + id,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log("success");

                    $("#basicinfoFormUpdate")[0].reset();
                    $("#editModal").modal("hide");
                    basicinfoTable.ajax.reload();
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // Delete admin

        $(document).on("click", "#deleteBasicinfoBtn", function () {
            let id = $(this).data("id");
            console.log(id);

            $.ajax({
                url: "{{ url('admin/basicinfos') }}/" + id,
                data: {
                    _token: token,
                },
                type: "DELETE",
                // headers: {
                //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                // },
                success: function (res) {
                    basicinfoTable.ajax.reload();
                    console.log("success");
                },
                eror: function (err) {
                    console.log(err);
                },
            });
        });
    </script>

@endpush
