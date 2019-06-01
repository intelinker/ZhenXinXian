@extends('layouts.headercontent')

<body>
<nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">真新鲜后台管理系统</a>
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
            <h1 class="h2">顾客信息管理</h1>
        </div>

        <h2>顾客列表</h2>
        {!! Form::open(array('url'=>'customersearch')) !!}

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">序号</th>
                    <th scope="col">名字</th>
                    <th scope="col">电话</th>
                    <th scope="col">头像</th>
                    <th scope="col">推荐人</th>
                    {{--<th scope="col">操作</th>--}}
                </tr>
                </thead>
                <tbody>
                @for($i=0; $i<count($customers); $i++)
                    <?php
                        $customer = $customers[$i];
                    ?>
                    <tr>
                        {!! Form::open(array('url'=>'/customers/'.$customer->id, 'method'=>'delete')) !!}
                        <th scope="row">{{$i + 1}}</th>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phone}}</td>
                        <td><img src="{{$customer['avatar']}}" width="40px"></td>
                        <td>{{$customer->recommender->name}}</td>
                        {{--<td>--}}
                            {{--{!! Form::submit('删除', ['class' => 'btn btn-light']) !!}--}}
                        {{--</td>--}}
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

<script type="text/javascript">
    function delProduct(product) {
        $uri = '/products/create';
        window.location.assign($uri);
    }
</script>
