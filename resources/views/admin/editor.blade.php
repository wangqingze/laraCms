@extends('admin.layouts.admin')

@section('admin-content')
    @include('UEditor::head');
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">面包屑</a></li>
            <li class="active">面包屑</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">后台主页 <small>描述文字</small></h1>
        <!-- end page-header -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="content" type="text/plain">

                    </script>

                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                      var ue = UE.getEditor('container');
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection