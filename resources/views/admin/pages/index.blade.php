@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' Static Pages')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-file-text"></i> Static Pages
        </h1>
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Page Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @stop
        @section('javascript')
            <script>
                $(document).ready(function () {
                    $("#dataTable").DataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "{{route('staticPage.browse')}}",
                            "dataType": "json",
                            "type": "POST",
                            "data": {_token: "{{csrf_token()}}"}
                        },
                        "columns": [
                            {"data": "title"},
                            {"data": "page_type"},
                            {'data': 'status'},
                            {"data": "options", "className": "actions dt-not-orderable"}
                        ],
                        "columnDefs": [{
                            "targets": 2,
                            "orderable": false
                        }],
                    })
                    $('.dataTables_filter input').removeClass('input-sm');
                    $('.dataTables_filter input').addClass('input-lg');
                });

            </script>
@stop




