@extends('backend.layout.master')

@section('title','sliders')

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
                                <li class="breadcrumb-item active">Sliders</li>
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
                                    Add sliders
                                </button>
                            </div>
                            <!-- Satic modal button end-->
                            <table
                                id="sliderTable"
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
                                    <th>Slider Image</th>
                                    <th>Title 1</th>
                                    <th>Title 2</th>
                                    <th>Slider Slug</th>
                                    <th>Btn Text</th>
                                    <th>Btn Link</th>
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
                                        Add Slider
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
                                                        id="sliderAddForm"
                                                        class="needs-validation"
                                                        novalidate
                                                    >
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Title
                                                                        1</label
                                                                    >
                                                                    <input
                                                                        name="slider_title_1"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="validationCustom01"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Title
                                                                        2</label
                                                                    >
                                                                    <input
                                                                        name="slider_title_2"
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
                                                                    >Btn
                                                                        Text</label
                                                                    >
                                                                    <input
                                                                        name="slider_btn_text"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Btn
                                                                        Link</label
                                                                    >
                                                                    <input
                                                                        name="slider_btn_link"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="example-email-input"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="input-group-text"
                                                                        for="inputGroupFile02"
                                                                    >Upload
                                                                        Slider
                                                                        Image</label
                                                                    >
                                                                    <input
                                                                        name="slider_img"
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
                                        Edit Slider
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
                                                        id="sliderFormUpdate"
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
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Title
                                                                        1</label
                                                                    >
                                                                    <input
                                                                        name="slider_title_1"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="slider_title_1"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="validationCustom01"
                                                                    >Title
                                                                        2</label
                                                                    >
                                                                    <input
                                                                        name="slider_title_2"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="slider_title_2"
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
                                                                    >Btn
                                                                        Text</label
                                                                    >
                                                                    <input
                                                                        name="slider_btn_text"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="slider_btn_text"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Btn
                                                                        Link</label
                                                                    >
                                                                    <input
                                                                        name="slider_btn_link"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="slider_btn_link"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="input-group-text"
                                                                        for="inputGroupFile02"
                                                                    >Upload
                                                                        Slider
                                                                        Image</label
                                                                    >
                                                                    <input
                                                                        name="slider_img"
                                                                        type="file"
                                                                        class="form-control"
                                                                        id="inputGroupFile02"
                                                                    />
                                                                    <img
                                                                        src=""
                                                                        alt=""
                                                                        width="40px"
                                                                        height="40px"
                                                                        id="slider_img"
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

        let sliderTable = $("#sliderTable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get-slider-data') }}",

            columns: [
                {
                    data: "id",
                },
                {
                    data: "slider_img",
                },
                {
                    data: "slider_title_1",
                },
                {
                    data: "slider_title_2",
                },
                {
                    data: "slider_slug",
                },
                {
                    data: "slider_btn_text",
                },
                {
                    data: "slider_btn_link",
                },
                {
                    data: "action",
                    name: "Action",
                    orderable: false,
                    searchable: false,
                },
            ],
        });

        // add slider

        $("#sliderAddForm").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('slider.store') }}",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log("success");

                    $("#sliderAddForm")[0].reset();
                    $(".addModal").modal("hide");
                    sliderTable.ajax.reload();
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // read slider
        let asset_path = "{{ asset('') }}";
        $(document).on("click", ".edit-btn", function () {
            let id = $(this).data("id");
            console.log(id);

            // $('#id').val(id);

            $.ajax({
                url: "{{ url('admin/sliders') }}/" + id + "/edit",
                type: "GET",
                data: {
                    id: id,
                },
                processData: false,
                contentType: false,
                success: function (res) {
                    $("#edit_id").val(res.data.id);
                    $("#slider_img").attr("src", asset_path + res.data.slider_img);
                    $("#slider_title_1").val(res.data.slider_title_1);
                    $("#slider_title_2").val(res.data.slider_title_2);
                    $("#slider_slug").val(res.data.slider_slug);
                    $("#slider_btn_text").val(res.data.slider_btn_text);
                    $("#slider_btn_link").val(res.data.slider_btn_link);
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // update slider

        $("#sliderFormUpdate").submit(function (e) {
            e.preventDefault();
            let id = $("#edit_id").val();

            $.ajax({
                url: "{{ url('admin/sliders') }}/" + id,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log("success");

                    $("#sliderFormUpdate")[0].reset();
                    $("#editModal").modal("hide");
                    sliderTable.ajax.reload();
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // Delete slider

        $(document).on("click", "#deleteSliderBtn", function () {
            let id = $(this).data("id");
            console.log(id);

            $.ajax({
                url: "{{ url('admin/sliders') }}/" + id,
                data: {
                    _token: token,
                },
                type: "DELETE",
                // headers: {
                //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                // },
                success: function (res) {
                    sliderTable.ajax.reload();
                    console.log("success");
                },
                eror: function (err) {
                    console.log(err);
                },
            });
        });
    </script>
@endpush
