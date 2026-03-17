@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('page_title', __('voyager::generic.edit').' '.$dataType->getTranslatedAttribute('display_name_singular'))
@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.edit').' SEO - '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    <div class="pull-right page-title">
        <a href="{{ route('seo.slug',['slug' => $dataType->slug]) }}" class="btn btn-primary">
            <i class="glyphicon glyphicon-arrow-left"></i> <span class="hidden-xs hidden-sm">Back</span>
        </a>
    </div>
@stop
@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <form role="form"
                          class="form-edit-add"
                          action="{{ route('seo.slug.update',['slug' => $dataType->slug, 'id' =>$data->id]) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        {{ method_field("PATCH") }}
                        {{ csrf_field() }}
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group  col-md-12">
                                <label class="control-label">Name - </label>
                                <b>{{$data->title}}</b>
                                <hr/>
                            </div>
                            <div class="form-group  col-md-12">
                                <label class="control-label" for="name">URL/Slug</label>
                                @if($dataType->name == 'pages')
                                    <br/>
                                    <label class="control-label" for="name"
                                           style="border: 1px solid rgba(0,0,0,0.28); width: 100%; padding: 5px">{{$data->slug}}</label>
                                @endif
                                <input @if($dataType->name == 'pages') type="hidden" @else type="text" @endif
                                class="form-control" name="slug" placeholder="URL/Slug"
                                       value="{{$data->slug}}">
                            </div>
                            <div class="form-group  col-md-12">
                                <label class="control-label" for="name">Seo Title</label>
                                <input type="text" class="form-control" name="seo_title" placeholder="Seo Title"
                                       value="{{$data->seo_title}}">
                            </div>
                            <div class="form-group  col-md-12">
                                <label class="control-label" for="name">Meta Description</label>
                                <textarea class="form-control" name="meta_description"
                                          placeholder="Meta Description">{{$data->meta_description}}</textarea>
                            </div>
                            <div class="form-group  col-md-12">
                                <label class="control-label" for="name">Meta Keywords</label>
                                <textarea class="form-control" name="meta_keywords"
                                          placeholder="Meta Keywords">{{$data->meta_keywords}}</textarea>
                            </div>
                            <div class="form-group  col-md-12">
                                <label class="control-label" for="name">Anchor Alt/Title</label>
                                <input type="text" class="form-control" name="alt_title" placeholder="Anchor Alt/Title"
                                       value="{{$data->alt_title}}">
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
@stop


