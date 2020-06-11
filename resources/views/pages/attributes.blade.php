@extends('layouts.admin')

@section('styles')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<h1 class="h3 mb-4 text-gray-800">Attributes</h1>
<p class="mb-4">Showing all atrributes and edit to add/remove options.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Attributes</h6>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Last updated</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Last updated</th>
                            <td></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($attributes as $attribute)
                        <tr>
                            <td><a href="{{ route('edit-atrribute', ['id' => $attribute->id]) }}">{{$attribute->title}}</a></td>
                            <td>{{$attribute->slug}}</td>
                            <td>{{$attribute->updated_at->format('d-m-Y H:i:s')}}</td>
                            <td>
                                <a class="delete-item" data-route="{{ route('delete-atrribute', ['id' => $attribute->id]) }}" href="#" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-times text-danger"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete attribute?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Delete attribute will lost for ever.</div>
                <div class="modal-footer">
                    <form id="delete-form" action="#" method="POST">
                        @csrf
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

<script type="text/javascript">
    $(document).on("click", "a.delete-item", function(){
        var route = $(this).data('route');
        $("form#delete-form").attr("action", route);
    })
</script>
@endsection

