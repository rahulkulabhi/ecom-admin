@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/tagsinput.css') }}">
@endsection

@section('content')
<h1 class="h3 mb-4 text-gray-800">Attributes</h1>
<p class="mb-4">Edit atrribute.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Attribute</h6>
        </div>
        <div class="card-body">
            
            <form method="POST" action="{{ route('edit-atrribute', $attribute->id) }}">
                @csrf

                <div class="form-group">
                    <label for="attibuteTitle">Title</label>
                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="attibuteTitle" placeholder="Enter Title" name="title" value="{{ old('title') ?? $attribute->title }}">
                    @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="attibuteSlug">Slug</label>
                    <input type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" id="attibuteSlug" placeholder="Enter Slug" name="slug" value="{{ old('slug') ?? $attribute->slug }}">
                    @if ($errors->has('slug'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                    @endif
                </div>

                @php
                    $options_arr = unserialize($attribute->options);
                @endphp
                <div class="form-group">
                    <label for="attibuteOptions">Options</label>
                    <input type="text" name="options" class="form-control" data-role="tagsinput" value="{{ !empty($options_arr) ? implode(',', $options_arr) : '' }}"/>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/tagsinput.js') }}"></script>
<script type="text/javascript">
    $(document).on('blur', 'input#attibuteTitle', function(){
        var slug = $(this).val().toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
        //console.log(slug);
        $("input#attibuteSlug").val(slug);
    });
    $(document).on('keyup', 'input#attibuteSlug', function(){
        var slug = $(this).val().toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
        //console.log(slug);
        $(this).val(slug);
    });
</script>
@endsection

