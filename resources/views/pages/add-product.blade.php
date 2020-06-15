@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endsection

@section('content')
<h1 class="h3 mb-4 text-gray-800">Product</h1>
<p class="mb-4">Add new product.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
        </div>
        <div class="card-body">
            
            <form method="POST" action="{{ route('add-product') }}">
                @csrf

                <div class="form-group">
                    <label for="productTitle">Title</label>
                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="productTitle" placeholder="Enter Title" name="title" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="productSlug">Slug</label>
                    <input type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" id="productSlug" placeholder="Enter Slug" name="slug" value="{{ old('slug') }}">
                    @if ($errors->has('slug'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="productDesc">Description</label>
                    <textarea class="form-control" name="description" id="productDesc">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="productType">Type</label>
                    <select class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" id="productType">
                        <option value="">Select Option</option>
                        <option value="simple">Simple</option>
                        <option value="variable">Variable</option>
                    </select>
                    @if ($errors->has('type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group variable-option">
                    <label for="productAttr">Attriutes for variation</label>
                    <select class="selectpicker form-control{{ $errors->has('attributes') ? ' is-invalid' : '' }}" name="attributes" id="productAttr" multiple data-live-search="true">
                        <option value="">Select Attriutes</option>
                        @foreach ($attributes as $attribute)
                        <option value="{{$attribute->id}}">{{ucfirst($attribute->title)}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        $('select#productAttr').selectpicker();
        $(".variable-option").hide();
    });

    $(document).on("change", "#productType", function(){
        //console.log($(this).find("option:selected").val());
        if($(this).find("option:selected").val() == "variable"){
            $(".variable-option").show();
        }else{
            $(".variable-option").hide();
        }
    });

    $(document).on('blur', 'input#productTitle', function(){
        var slug = $(this).val().toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
        //console.log(slug);
        $("input#productSlug").val(slug);
    });

    $(document).on('keyup', 'input#productSlug', function(){
        var slug = $(this).val().toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
        //console.log(slug);
        $(this).val(slug);
    });

</script>
@endsection

