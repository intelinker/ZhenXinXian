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
            <h1 class="h2">商品管理</h1>
        </div>

        <h2>商品列表</h2>
        <button type="button" class="btn btn-danger col-sm-1" style="margin-right: 30px; margin-bottom: 20px; float:right" onclick="create()">新建</button>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">序号</th>
                    <th scope="col">名称</th>
                    <th scope="col">价格</th>
                    <th scope="col">描述</th>
                    <th scope="col">图片</th>
                    <th scope="col" style="min-width: 180px">操作</th>

                </tr>
                </thead>
                <tbody>
                @for($i=0; $i<count($commodities); $i++)
                    <?php
                        $commodity = $commodities[$i];
                    ?>
                    <tr>
                        {!! Form::open(array('url'=>'/commodities/'.$commodity->id, 'method'=>'delete')) !!}
                        <th scope="row">{{$i +1}}</th>
                        <td>{{$commodity->name}}</td>
                        <td>{{$commodity->price}}</td>
                        <td>{{$commodity->description}}</td>
                        <td><img src="{{$commodity->avatar}}" width="40px"></td>
                        <td>
                            <button id="edit_3" type="button" class="btn btn-warning" onclick="edit({{$commodity->id}})">修改</button>
                            {!! Form::submit('删除', ['class' => 'btn btn-light', 'style' => 'margin-left:30px']) !!}
                        </td>
                        {!! Form::close() !!}
                    </tr>
                @endfor

                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
<script type="text/javascript" src="/js/jQuery-3.3.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript">
    function create(commodity) {
        $uri = '/commodities/create';
        window.location.assign($uri);
    }
    function edit(commodity) {
        // alert(menu_id);
        $uri = '/commodities/' + commodity +'/edit';
        window.location.assign($uri);
    }
    function delCommodity(commodity) {
        $uri = '/commodities/create';
        window.location.assign($uri);

    }
    
    function search() {
        var search_input = $('#search_input').val();
        if (search_input.length > 0) {
            var uri = '/commoditiesearch/' + search_input + '/' + $('#level1').val() + '/' + $('#level2').val();
            window.location.assign(uri);
        } else {
            alert("请输入搜索关键字");

        }

    }
</script>