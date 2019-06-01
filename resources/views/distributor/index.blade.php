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
            <h1 class="h2">商家管理</h1>
        </div>

        <h2>商家列表</h2>
        <button type="button" class="btn btn-danger col-sm-1" style="margin-right: 30px; margin-bottom: 20px; float:right" onclick="create()">新建</button>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">序号</th>
                    <th scope="col">微信</th>
                    <th scope="col">电话</th>
                    <th scope="col">微信</th>
                    <th scope="col">商铺</th>
                    <th scope="col">地址</th>
                    <th scope="col">头像</th>
                    <th scope="col" style="min-width: 180px">操作</th>

                </tr>
                </thead>
                <tbody>
                @for($i=0; $i<count($distributors); $i++)
                    <?php
                        $distributor = $distributors[$i];
                    ?>
                    <tr>
                        {!! Form::open(array('url'=>'/distributors/'.$distributor->id, 'method'=>'delete')) !!}
                        <th scope="row">{{$i +1}}</th>
                        <td>{{$distributor->name}}</td>
                        <td>{{$distributor->phone}}</td>
                        <td>{{$distributor->wxid}}</td>
                        <td>{{$distributor->title}}</td>
                        <td>{{$distributor->address}}</td>
                        <td><img src="{{$distributor->avatar}}" width="40px"></td>
                        <td>
                            <button id="edit_3" type="button" class="btn btn-warning" onclick="edit({{$distributor->id}})">修改</button>
                            <button id={{"visible_".$distributor->id}} type="button"
                                    @if($distributor->visible == 0)
                                    class="btn btn-light"
                                    @else
                                    class="btn btn-primary"
                                    @endif
                                    style="margin-left: 30px" onclick="resetVisible({{$distributor->id}})">
                                @if($distributor->visible == 0)
                                    不显示
                                @else
                                    显示
                                @endif
                            </button>
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
    function create(distributor) {
        $uri = '/distributors/create';
        window.location.assign($uri);
    }
    function edit(distributor) {
        // alert(distributor_id);
        $uri = '/distributors/' + distributor +'/edit';
        window.location.assign($uri);
    }

    function resetVisible(distributor_id) {
        var viButton = $('#visible_' + distributor_id)[0];
        var visible;
        if (viButton.className == 'btn btn-primary') {
            visible = 0;
            viButton.className = 'btn btn-light';
            viButton.textContent = '不显示';
        } else {
            viButton.className = 'btn btn-primary';
            viButton.textContent = '显示';
            visible = 1;
        }
        $uri = 'distributorvisible/' + distributor_id + '/' + visible;
        $.get($uri, function(res) {
            console.log(res);
        });
    }
</script>