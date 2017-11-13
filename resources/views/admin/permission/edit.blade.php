@extends('admin.layouts.admin')

@section('admin-css')
    <link href="{{ asset('asset_admin/assets/plugins/parsley/src/parsley.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
@endsection

@section('admin-content')
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Form Stuff</a></li>
            <li class="active">Form Validation</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">修改权限 <small>header small text goes here...</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Basic Form Validation</h4>
                    </div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body panel-form">
                        <form class="form-horizontal form-bordered" data-parsley-validate="true" action="{{ url('admin/permission/'.$permission['id']) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="icon">上级菜单 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control selectpicker"
                                            data-live-search="true"
                                            data-style="btn-white"
                                            data-parsley-required="true"
                                            data-parsley-errors-container="#pid_error"
                                            data-parsley-required-message="请选择上级菜单"
                                            name="pid">
                                        <option value="">-- 请选择 --</option>
                                        <option value="0" @if($permission['pid'] == 0) selected="selected" @endif>顶级菜单</option>
                                        @foreach($topNodes as $value)
                                            <option value="{{ $value->id }}" @if($value->id == $permission['pid']) selected="selected" @endif>{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    <p id="pid_error"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="display_name">名称 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="display_name" placeholder="名称" data-parsley-required="true" data-parsley-required-message="请输入名称" value="{{ $permission['display_name'] }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="name">权限 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="name" placeholder="权限" data-parsley-required="true"
                                           data-toggle="tooltip" data-trigger="hover" data-original-title="不可重复，不可链接输入'#'"
                                           data-parsley-required-message="请输入权限标识" value="{{ $permission['name'] }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="icon">图标 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="icon" placeholder="图标" value="{{ $permission['icon'] }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="is_menu">是否菜单 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="radio" name="is_menu"  value="1" {{ $permission['is_menu'] ? 'checked' : '' }}  />
                                    <label>是</label>&nbsp;&nbsp;
                                    <input type="radio" name="is_menu"  value="0" {{ $permission['is_menu'] ? '' : 'checked' }}  />
                                    <label>否</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="sort">排序 * :</label>
                                <div class="col-md-2 col-sm-2">
                                    <input class="form-control" type="text" name="sort" placeholder="排序" value="{{ $permission['sort'] }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="description">权限描述 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="description" placeholder="权限描述" data-parsley-required="true" data-parsley-required-message="请输入权限描述" value="{{ $permission['description'] }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4"></label>
                                <div class="col-md-6 col-sm-6">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-6 -->
        </div>
        <!-- end row -->
    </div>
@endsection

@section('admin-js')
    <script src="{{ asset('asset_admin/assets/plugins/parsley/dist/parsley.js') }}"></script>
@endsection