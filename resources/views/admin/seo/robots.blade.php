@extends('voyager::master')
@section('page_title', __('voyager::generic.edit'). ' Robots File')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-github"></i> Edit Robots File
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <form role="form"
                              class="form-edit-add"
                              action="{{ route('robots.update') }}"
                              method="POST">
                            @csrf
                            <div class="panel-body">
                                <div class="form-group  col-md-12">
                                    <label class="control-label" for="name">Content</label>
                                    <textarea class="form-control" name="content" rows="7"
                                              placeholder="Content">{{$content}}</textarea>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary save">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
