@extends('layouts.headercontent')

<body>
<nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">真新鲜后台管理系统</a>
    {{--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="/logout">退出登录</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
    </div>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2"团购管理</h1>
        </div>

        <h2>创建团购</h2>
        {!! Form::open(array('url'=>'/activities', 'files'=>true)) !!}

        <p style="margin-top: 30px">
            <label for="title" class="col-sm-2">标题：</label>
            {!! Form::text('title', null, ['class'=>'col-sm-3', 'id'=>'title', 'required'=>'required', 'autofocus'=>'autofocus']) !!}
        </p>

        <p>
            <label for="description" class="col-sm-2">介绍：</label>
            {!! Form::textarea('description', null, ['class'=>'col-sm-8', 'id'=>'intro']) !!}
        </p>

        <p>
            <label for="avatar" class="col-sm-2">图片：</label>
            {!! Form::file('avatar', array('class'=>'col-md-3', 'id'=>'avatar')) !!}
            <img id="avatar_image" width="100"/>
        </p>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">选择商品</th>
                    <th scope="col">名称</th>
                    <th scope="col">价格</th>
                    <th scope="col">描述</th>
                    <th scope="col">图片</th>
                </tr>
                </thead>
                <tbody>
                @for($i=0; $i<count($commodities); $i++)
                    <?php
                    $commodity = $commodities[$i];
                    ?>
                    <tr>
                        <th scope="row">
                            {!! Form::checkbox("check_$commodity->id", "$commodity->id", false) !!}
                        </th>
                        <td>{{$commodity->name}}</td>
                        <td>{{$commodity->price}}</td>
                        <td>{{$commodity->description}}</td>
                        <td><img src="{{$commodity->avatar}}" width="40px"></td>
                    </tr>
                @endfor

                </tbody>
            </table>
        </div>

        <p>
            {!! Form::submit('保存', ['class' => 'btn btn-primary', 'style' => 'margin-left:30px']) !!}
            <button type="button" class="btn btn-light" style="margin-left: 250px" onclick="javascript:history.back(-1);">取消</button>
        </p>
    </main>
</div>
</body>
<script type="text/javascript" src="/js/jQuery-3.3.1.min.js"></script>
<script type="text/javascript">
    document.getElementById("avatar").onchange = function () {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("avatar_image").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
</script>