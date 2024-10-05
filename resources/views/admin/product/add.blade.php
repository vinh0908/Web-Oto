@extends('admin.layout')

@section('admin.content')

    <div class="container-fluid">
        <div class="row">

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div style="display: flex; justify-content: space-between;">
                    <h2>Section title</h2>
                </div>

                <div class="table-responsive">
                    <div class="col-md-12">
                        <form role="form" method="post" action="{{ route('product.save') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="brand" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-control">
                                        <option value="">---Please Select---</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option selected value="{{ $productCategory->id }}">
                                                {{ $productCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                                <div class="col-sm-10">
                                    <select name="brand_id" class="form-control">
                                        <option value="">---Please Select---</option>
                                        @foreach ($productBrands as $productBrand)
                                            <option selected value="{{ $productBrand->id }}">
                                                {{ $productBrand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputFile" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('name') }}" name="name"
                                        class="form-control @error('name') {{ 'is-invalid' }} @enderror" id="name"
                                        placeholder="Tên sản phẩm">
                                    @error('name')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('slug') }}" name="slug"
                                        class="form-control @error('slug') {{ 'is-invalid' }} @enderror" id="slug"
                                        placeholder="Tên sản phẩm">
                                    @error('slug')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <textarea name="des" class="ckeditor form-control @error('des') {{ 'is-invalid' }} @enderror">{{ old('des') }}</textarea>
                                    @error('des')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="price"
                                        placeholder="Giá sản phẩm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="qty"
                                        placeholder="Số lượng">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="weight"
                                        placeholder="Trọng lượng (kg)">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection



@section('my-script')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#name').keyup(function() {
                var title = $("#name").val();
                // console.log(title);
                $.ajax({
                    type: 'POST', //method of form
                    url: "{{ route('product.get_slug') }}", // action of from
                    data: {
                        title: title,
                        _token: "{{ csrf_token() }}"
                    }, // data of form
                    success: function(data) {
                        // console.log(data);
                        $('#slug').val(data.slug);
                    },
                });
            });

            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
