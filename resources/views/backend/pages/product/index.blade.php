@extends('backend.layout.master')

@section('title','products')

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
                            <!-- Satic modal button -->
                            <div class="mb-1">
                                <!-- Satic modal -->
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"
                                >
                                    Add Product
                                </button>
                            </div>
                            <!-- Satic modal button end-->
                            <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                                <table
                                    id="productTable"
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
                                        <th>Product Image</th>
                                        <th>Category Name</th>
                                        <th>Sub-Category Name</th>
                                        <th>Brand Name</th>
                                        <th>Product Name</th>
                                        <th>Product Qty</th>
                                        <th>Product Size</th>
                                        <th>Product Weight</th>
                                        <th>Product color</th>
                                        <th>Product New Price</th>
                                        <th>Product Old Price</th>
                                        <th>Product Short Desc</th>
                                        <th>Product Long Desc</th>
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
                        style="--bs-modal-width: 1000px;"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="staticBackdropLabel"
                                    >
                                        Add Product
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
                                                        id="productAddForm"
                                                        class="needs-validation"
                                                        novalidate
                                                    >
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="category_id">
                                                                        Category Id
                                                                    </label>
                                                                    <select
                                                                        name="category_id"
                                                                        id="category_id"
                                                                        class="form-control"
                                                                        required >
                                                                        @foreach($categories as $category)
                                                                            <option value="{{ $category->id }}">
                                                                                {{ $category->category_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="subcategory_id"
                                                                    >Sub-Category
                                                                        Id</label
                                                                    >
                                                                    <select
                                                                        name="subcategory_id"
                                                                        id="subcategory_id"
                                                                        class="form-control"
                                                                        required >
                                                                        @foreach($subcategories as $subcategory)
                                                                            <option value="{{ $subcategory->id }}">
                                                                                {{ $subcategory->subcategory_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="brand_id"
                                                                    >Brand
                                                                        Id</label
                                                                    >
                                                                    <select
                                                                        name="brand_id"
                                                                        id="brand_id"
                                                                        class="form-control"
                                                                        required >
                                                                        @foreach($brands as $brand)
                                                                            <option value="{{ $brand->id }}">
                                                                                {{ $brand->brand_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product
                                                                        Name</label
                                                                    >
                                                                    <input
                                                                        name="product_name"
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
                                                                    >Product
                                                                        Qty</label
                                                                    >
                                                                    <input
                                                                        name="product_qty"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="example-email-input"
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
                                                                    >Product
                                                                        Size</label
                                                                    >
                                                                    <select
                                                                        name="product_size[]"
                                                                        id="product_size"
                                                                        class="form-control"
                                                                        required
                                                                        multiple>
                                                                        @foreach($sizes as $size)
                                                                            <option value="{{ $size->size_name }}">
                                                                                {{ $size->size_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product
                                                                        Weight</label
                                                                    >
                                                                    <input
                                                                        name="product_weight"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id=""
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product
                                                                        Color</label
                                                                    >
                                                                    <select
                                                                        name="product_color[]"
                                                                        id="product_color"
                                                                        class="form-control"
                                                                        required
                                                                        multiple>
                                                                        @foreach($colors as $color)
                                                                            <option value="{{ $color->color_name }}">
                                                                                {{ $color->color_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product New
                                                                        Price</label
                                                                    >
                                                                    <input
                                                                        name="product_new_price"
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
                                                                    >Product Old
                                                                        Price</label
                                                                    >
                                                                    <input
                                                                        name="product_old_price"
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
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product
                                                                        Short
                                                                        Desc</label
                                                                    >
                                                                    <input
                                                                        name="product_short_desc"
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
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product
                                                                        Long
                                                                        Desc</label
                                                                    >
                                                                    <input
                                                                        name="product_long_desc"
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
                                                                        Product
                                                                        Images</label
                                                                    >
                                                                    <input
                                                                        name="product_imgs[]"
                                                                        type="file"
                                                                        class="form-control"
                                                                        id="inputGroupFile02"
                                                                        multiple
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
                                                                        Thumbnail
                                                                        Image</label
                                                                    >
                                                                    <input
                                                                        name="product_thumb"
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
                                        Edit Product
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
                                                        id="productFormUpdate"
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
                                                                                {{ $category->category_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="subcategory_id"
                                                                    >Sub-Category
                                                                        Id</label
                                                                    >
                                                                    <select
                                                                        name="subcategory_id"
                                                                        id="subcategory_id"
                                                                        class="form-control"
                                                                        required >
                                                                        @foreach($subcategories as $subcategory)
                                                                            <option value="{{ $subcategory->id }}">
                                                                                {{ $subcategory->subcategory_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="form-label"
                                                                        for="brand_id"
                                                                    >Brand
                                                                        Id</label
                                                                    >
                                                                    <select
                                                                        name="brand_id"
                                                                        id="brand_id"
                                                                        class="form-control"
                                                                        required >
                                                                        @foreach($brands as $brand)
                                                                            <option value="{{ $brand->id }}">
                                                                                {{ $brand->brand_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product
                                                                        Name</label
                                                                    >
                                                                    <input
                                                                        name="product_name"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="product_name"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product
                                                                        Qty</label
                                                                    >
                                                                    <input
                                                                        name="product_qty"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="product_qty"
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
                                                                    >Product
                                                                        Size</label
                                                                    >
                                                                    <select
                                                                        name="product_size[]"
                                                                        id="product_size"
                                                                        class="form-control"
                                                                        multiple
                                                                        required >
                                                                        @foreach($sizes as $size)
                                                                            <option value="{{ $size->size_name }}">
                                                                                {{ $size->size_name }}
                                                                            </option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product
                                                                        Weight</label
                                                                    >
                                                                    <input
                                                                        name="product_weight"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="product_weight"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product
                                                                        Color</label
                                                                    >
                                                                    <select
                                                                        name="product_color[]"
                                                                        id="product_color"
                                                                        class="form-control"
                                                                        required
                                                                        multiple>
                                                                        @foreach($colors as $color)
                                                                            <option value="{{ $color->color_name }}">
                                                                                {{ $color->color_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product New
                                                                        Price</label
                                                                    >
                                                                    <input
                                                                        name="product_new_price"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="product_new_price"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="example-email-input"
                                                                        class="form-label"
                                                                    >Product Old
                                                                        Price</label
                                                                    >
                                                                    <input
                                                                        name="product_old_price"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="product_old_price"
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
                                                                    >Product
                                                                        Short
                                                                        Desc</label
                                                                    >
                                                                    <input
                                                                        name="product_short_desc"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="product_short_desc"
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
                                                                    >Product
                                                                        Long
                                                                        Desc</label
                                                                    >
                                                                    <input
                                                                        name="product_long_desc"
                                                                        class="form-control"
                                                                        type="text"
                                                                        id="product_long_desc"
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
                                                                        Product
                                                                        Images</label
                                                                    >
                                                                    <input
                                                                        name="product_imgs[]"
                                                                        type="file"
                                                                        class="form-control"
                                                                        id="inputGroupFile02"
                                                                    />
                                                                    <img
                                                                        src=""
                                                                        alt=""
                                                                        width="40px"
                                                                        height="40px"
                                                                        id="product_img"
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
                                                                        Thumbnail
                                                                        Images</label
                                                                    >
                                                                    <input
                                                                        name="product_thumb"
                                                                        type="file"
                                                                        class="form-control"
                                                                        id="inputGroupFile02"
                                                                    />
                                                                    <img
                                                                        src=""
                                                                        alt=""
                                                                        width="40px"
                                                                        height="40px"
                                                                        id="product_thumb"
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
    <script>
        // render datatables

        var token = $("input[name='_token']").val();

        let productTable = $("#productTable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get-product-data') }}",
            // ✅ Enable horizontal scrolling
            scrollX: true,
            autoWidth: false,
            responsive: true,

            columns: [
                {
                    data: "id",
                },
                {
                    data: "product_thumb",
                },
                {
                    data: "category",
                    render: function(data) {
                        return data ? `${data.category_name}` : 'N/A';
                    }
                },
                {
                    data: "subcategory",
                    render: function(data) {
                        return data ? `${data.subcategory_name}` : 'N/A';
                    }
                },
                {
                    data: "brand",
                    render: function(data) {
                        return data ? `${data.brand_name}` : 'N/A';
                    }
                },
                {
                    data: "product_name",
                },
                {
                    data: "product_qty",
                },
                // {
                //     data: "product_size",
                //     render: function(data) {
                //         // Decode HTML entities before parsing the JSON
                //         if (data) {
                //             var parser = new DOMParser();
                //             var decodedData = parser.parseFromString(data, 'text/html').body.textContent;  // Decode HTML entities
                //             const sizes = JSON.parse(decodedData);  // Parse the decoded string into JSON
                //             return sizes.join(", ");  // Join the sizes array into a comma-separated string
                //         }
                //         return 'N/A';  // If no sizes, return 'N/A'
                //     }
                // },
                {
                    data: 'product_size'
                },
                {
                    data: "product_weight",
                },
                {
                    data: "product_color",
                },
                {
                    data: "product_new_price",
                },
                {
                    data: "product_old_price",
                },
                {
                    data: "product_short_desc",
                },
                {
                    data: "product_long_desc",
                },
                {
                    data: "action",
                    name: "Action",
                    orderable: false,
                    searchable: false,
                },
            ],

        });

        // add product

        $("#productAddForm").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('product.store') }}",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log("success");

                    $("#productAddForm")[0].reset();
                    $(".addModal").modal("hide");
                    productTable.ajax.reload();
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // read product
        let asset_path = "{{ asset('') }}";
        $(document).on("click", ".edit-btn", function () {
            let id = $(this).data("id");
            console.log(id);

            // $('#id').val(id);

            $.ajax({
                url: "{{ url('admin/products') }}/" + id + "/edit",
                type: "GET",
                data: {
                    id: id,
                },
                processData: false,
                contentType: false,
                success: function (res) {
                    $("#edit_id").val(res.data.id);
                    if (res.data.product_imgs.length > 0) {
                        let firstImage = res.data.product_imgs[0]; // Get first image from array
                        $("#product_img").attr("src", "{{ asset('') }}" + firstImage);
                    }
                    $("#product_thumb").attr("src", asset_path + res.data.product_thumb);
                    $("#category_id").val(res.data.category_id);
                    $("#subcategory_id").val(res.data.subcategory_id);
                    $("#brand_id").val(res.data.brand_id);
                    $("#product_name").val(res.data.product_name);
                    $("#product_qty").val(res.data.product_qty);
                    $("#product_size").val(res.data.product_size);
                    $("#product_weight").val(res.data.product_weight);
                    $("#product_color").val(res.data.product_color);
                    $("#product_new_price").val(res.data.product_new_price);
                    $("#product_old_price").val(res.data.product_old_price);
                    $("#product_short_desc").val(res.data.product_short_desc);
                    $("#product_long_desc").val(res.data.product_long_desc);
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // update product

        $("#productFormUpdate").submit(function (e) {
            e.preventDefault();
            let id = $("#edit_id").val();

            $.ajax({
                url: "{{ url('admin/products') }}/" + id,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log("success");

                    $("#productFormUpdate")[0].reset();
                    $("#editModal").modal("hide");
                    productTable.ajax.reload();
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });

        // Delete product

        $(document).on("click", "#deleteProductBtn", function () {
            let id = $(this).data("id");
            console.log(id);

            $.ajax({
                url: "{{ url('admin/products') }}/" + id,
                data: {
                    _token: token,
                },
                type: "DELETE",
                // headers: {
                //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                // },
                success: function (res) {
                    productTable.ajax.reload();
                    console.log("success");
                },
                eror: function (err) {
                    console.log(err);
                },
            });
        });
    </script>
@endpush
