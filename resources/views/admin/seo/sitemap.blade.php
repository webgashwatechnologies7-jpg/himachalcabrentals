@extends('voyager::master')
@section('page_title', __('voyager::generic.edit'). ' Sitemap')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-file-code"></i> Sitemap
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-warning" href="{{route('sitemap.generate')}}"><i
                        class="glyphicon glyphicon-refresh"></i> Create/Update Sitemap
                </a>
                <a class="btn btn-danger" href="{{route('sitemap.remove')}}"><i class="glyphicon glyphicon-trash"></i>
                    Remove Sitemap</a>
                <a class="btn btn-info" href="{{url('/sitemap.xml')}}" target="_blank"><i
                        class="glyphicon glyphicon-ok-circle"></i> Check Sitemap</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>URL</th>
                                    <th>Last Modified</th>
                                    <th>Priority</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($map as $key => $item)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$item['loc']}}</td>
                                        <td>{{$item['lastmod']}}</td>
                                        <td>{{$item['priority']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


