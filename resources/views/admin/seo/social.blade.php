@extends('voyager::master')
@section('page_title', __('voyager::generic.edit'). ' Social Media')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-facebook"></i> Edit Social Media
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
                              action="{{ route('social.update') }}"
                              method="POST">
                            @csrf
                            <div class="panel-body">
                                @if($mediaList->isNotEmpty())
                                    @foreach($mediaList as $media)
                                        <div class="form-group col-md-12"
                                             style="border: 1px solid #A3D9D9; padding: 10px">
                                            <div style="display: flex; gap: 10px; align-items: center">

                                                <div style="flex-grow: 4">
                                                    <label class="control-label"
                                                           for="{{$media->key}}">{{$media->display_name}}</label>
                                                    <input type="text" class="form-control" name="{{$media->id}}"
                                                           id="{{$media->key}}"
                                                           placeholder="{{$media->display_name}} Link"
                                                           value="{{$media->value}}">
                                                </div>
                                                <div style="flex-grow: 1">
                                                    <?php $option = json_decode($media->details);?>
                                                    <label class="control-label"
                                                           for="no-follow">No Follow</label>
                                                    <select class="form-control" name="{{$media->id}}_option">
                                                        <option value="YES"
                                                                @if($option->nofollow && $option->nofollow == 'YES') selected @endif>
                                                            Yes
                                                        </option>
                                                        <option value="NO"
                                                                @if($option->nofollow && $option->nofollow == 'NO') selected @endif>
                                                            No
                                                        </option>
                                                    </select>
                                                </div>

                                                <div
                                                    style="margin-top: 25px;">
                                                    <a href="{{ route('voyager.settings.move_up', $media->id) }}">
                                                        <i class="glyphicon glyphicon-arrow-up"></i>
                                                    </a>
                                                    <a href="{{ route('voyager.settings.move_down', $media->id) }}">
                                                        <i class="glyphicon glyphicon-arrow-down"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center">
                                        <i class="voyager-settings"></i>
                                        <br/>
                                        <b>No media settings found.</b>
                                    </div>
                                @endif
                            </div>
                            @if($mediaList->isNotEmpty())
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-primary save">Save</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


