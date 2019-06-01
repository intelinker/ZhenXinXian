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
            <h1 class="h2">订单管理</h1>
        </div>

        <h2>订单列表</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">序号</th>
                    <th scope="col">商品</th>
                    <th scope="col">价格</th>
                    <th scope="col">消费者</th>
                    <th scope="col">供货商</th>
                    <th scope="col">团购</th>
                    <th scope="col">时间</th>
                    {{--<th scope="col" style="min-width: 180px">操作</th>--}}

                </tr>
                </thead>
                <tbody>
                @for($i=0; $i<count($orders); $i++)
                    <?php
                        $order = $orders[$i];
                    ?>
                    <tr>
                        {!! Form::open(array('url'=>'/orders/'.$order->id, 'method'=>'delete')) !!}
                        <th scope="row">{{$i +1}}</th>
                        <td>{{$order->commodity->name}}</td>
                        <td>{{$order->commodity->price}}</td>
                        <td>{{$order->customer->name}}</td>
                        <td>{{$order->distributor->title}}</td>
                        <td>{{$order->activity->name}}</td>
                        <td>
                            <button id="edit_3" type="button" class="btn btn-warning" onclick="edit({{$order->id}})">修改</button>
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