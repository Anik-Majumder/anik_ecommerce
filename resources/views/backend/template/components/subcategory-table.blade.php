@extends('backend.template.index') @section('content')

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
                            <li class="breadcrumb-item active">
                                Sub-Categories
                            </li>
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
                                Add Sub-Categories
                            </button>
                        </div>
                        <!-- Satic modal button end-->
                        <table
                            id="subcategoryTable"
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
                                    <th>Category ID</th>
                                    <th>Sub-Category Image</th>
                                    <th>Sub-Category Name</th>
                                    <th>Sub-Category Slug</th>
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
                                    Add Sub-Category
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
                                                    id="subcategoryAddForm"
                                                    class="needs-validation"
                                                    novalidate
                                                >
                                                    @csrf
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="category_id">
                                                                    Category
                                                                </label>
                                                                <select
                                                                    name="category_id"
                                                                    id="category_id"
                                                                    class="form-control"
                                                                    required >
                                                                    @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->id }} - {{ $category->category_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label"
                                                                    for="validationCustom01"
                                                                    >Sub-Category
                                                                    Name</label
                                                                >
                                                                <input
                                                                    name="subcategory_name"
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
                                                                    >Sub-Category
                                                                    Slug</label
                                                                >
                                                                <input
                                                                    name="subcategory_name"
                                                                    class="form-control"
                                                                    type="text"
                                                                    id="example-email-input"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-12">
                                                            <label
                                                                class="input-group-text"
                                                                for="inputGroupFile02"
                                                                >Upload
                                                                Sub-Category
                                                                Image</label
                                                            >
                                                            <input
                                                                name="subcategory_image"
                                                                type="file"
                                                                class="form-control"
                                                                id="inputGroupFile02"
                                                            />
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
                                    Edit Sub-Category
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
                                                    id="subcategoryFormUpdate"
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
                                                                <label for="category_id">
                                                                    Category
                                                                </label>
                                                                <select
                                                                    name="category_id"
                                                                    id="category_id"
                                                                    class="form-control"
                                                                    required >
                                                                    @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->id }} - {{ $category->category_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label"
                                                                    for="validationCustom01"
                                                                    >Sub-Category
                                                                    Name</label
                                                                >
                                                                <input
                                                                    name="subcategory_name"
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="subcategory_name"
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
                                                                    >Sub-Category
                                                                    Slug</label
                                                                >
                                                                <input
                                                                    name="subcategory_slug"
                                                                    class="form-control"
                                                                    type="text"
                                                                    id="subcategory_slug"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-12">
                                                            <label
                                                                class="input-group-text"
                                                                for="inputGroupFile02"
                                                                >Upload
                                                                Sub-Category
                                                                Image</label
                                                            >
                                                            <input
                                                                name="subcategory_image"
                                                                type="file"
                                                                class="form-control"
                                                                id="inputGroupFile02"
                                                            />
                                                            <img
                                                                src=""
                                                                alt=""
                                                                width="40px"
                                                                height="40px"
                                                                id="subcategory_image"
                                                            />
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

    let subcategoryTable = $("#subcategoryTable").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('get-subcategory-data') }}",

        columns: [
            {
                data: "id",
            },
            {
                data: "category_id",
            },
            {
                data: "subcategory_image",
            },
            {
                data: "subcategory_name",
            },
            {
                data: "subcategory_slug",
            },
            {
                data: "action",
                name: "Action",
                orderable: false,
                searchable: false,
            },
        ],
    });

    // add sub-category

    $("#subcategoryAddForm").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('subcategory.store') }}",
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                console.log("success");

                $("#subcategoryAddForm")[0].reset();
                $(".addModal").modal("hide");
                subcategoryTable.ajax.reload();
            },
            error: function (err) {
                console.log(err);
            },
        });
    });

    // read subcategory

    $(document).on("click", ".edit-btn", function () {
        let id = $(this).data("id");
        console.log(id);

        // $('#id').val(id);

        $.ajax({
            url: "{{ url('subcategories') }}/" + id + "/edit",
            type: "GET",
            data: {
                id: id,
            },
            processData: false,
            contentType: false,
            success: function (res) {
                $("#edit_id").val(res.data.id);
                $("#subcategory_image").attr("src", res.data.subcategory_image);
                $("#category_id").val(res.data.category_id);
                $("#subcategory_name").val(res.data.subcategory_name);
                $("#subcategory_slug").val(res.data.subcategory_slug);
            },
            error: function (err) {
                console.log(err);
            },
        });
    });

    // update subcategory

    $("#subcategoryFormUpdate").submit(function (e) {
        e.preventDefault();
        let id = $("#edit_id").val();

        $.ajax({
            url: "{{ url('subcategories') }}/" + id,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                console.log("success");

                $("#subcategoryFormUpdate")[0].reset();
                $("#editModal").modal("hide");
                subcategoryTable.ajax.reload();
            },
            error: function (err) {
                console.log(err);
            },
        });
    });

    // Delete subcategory

    $(document).on("click", "#deleteSubcategoryBtn", function () {
        let id = $(this).data("id");
        console.log(id);

        $.ajax({
            url: "{{ url('subcategories') }}/" + id,
            data: {
                _token: token,
            },
            type: "DELETE",
            // headers: {
            //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            // },
            success: function (res) {
                subcategoryTable.ajax.reload();
                console.log("success");
            },
            eror: function (err) {
                console.log(err);
            },
        });
    });
</script>

@endsection
