@extends('layouts.headercontent')

<body>
    <nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">真新鲜后台管理系统</a>
        {{--<input class="form-control form-control w-100" type="text" placeholder="搜索" aria-label="Search">--}}
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="/logout">退出登录</a>
            </li>
        </ul>
    </nav>
    @csrf
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')
        </div>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">团购管理</h1>
            </div>

            <h2>团购列表</h2>
            <button type="button" class="btn btn-danger col-sm-1" style="margin-right: 30px; margin-bottom: 20px; float:right" onclick="create()">新建</button>
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <th scope="col">序号</th>
                        <th scope="col">标题</th>
                        <th scope="col">更新日期</th>
                        <th scope="col">描述</th>
                        <th scope="col">图片</th>
                        <th scope="col" style="min-width: 200px">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=0; $i < count($activities); $i++)
                        <?php $activity = $activities[$i] ?>
                        <tr>
                            {!! Form::open(array('url'=>'/activities/'.$activity->id, 'method'=>'delete')) !!}
                            <th scope="row">{{$i + 1}}</th>
                            <td>{{$activity->title}}</td>
                            <td>{{$activity->updated_at}}</td>
                            <td>{{$activity->description}}</td>
                            <td><img src="{{$activity['avatar']}}" width="40px"></td>
                            <td>
                                <button id="edit_1" type="button" class="btn btn-warning" href="/activity/{{$activity->id}}/edit" onclick="edit({{$activity->id}})">修改</button>
                                <button id={{"status_".$activity->id}} type="button"
                                        @if($activity->status == 0)
                                            class="btn btn-light"
                                        @else
                                            class="btn btn-primary"
                                        @endif
                                        style="margin-left: 30px" onclick="resetStatus({{$activity->id}})">
                                    @if($activity->status == 0)
                                        结束
                                    @else
                                        开启
                                    @endif
                                </button>
                                {!! Form::submit('删除', ['class' => 'btn btn-light', 'style' => 'margin-left:30px']) !!}
                            </td>
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
    function create(product) {
        $uri = '/activities/create';
        window.location.assign($uri);
    }

    function edit(activity) {
        // alert(activity_id);
        $uri = '/activities/' + activity +'/edit';
        window.location.assign($uri);
    }

    function resetStatus(activity_id) {
        // alert($('#status_' + activity_id)[0]);
        var viButton = $('#status_' + activity_id)[0];
        var status;
        if (viButton.className == 'btn btn-primary') {
            status = 0;
            viButton.className = 'btn btn-light';
            viButton.textContent = '结束';
        } else {
            viButton.className = 'btn btn-primary';
            viButton.textContent = '开启';
            status = 1;
        }
        $uri = 'activitystatus/' + activity_id + '/' + status;
        $.get($uri, function(res) {
            console.log($uri);
        });
    }
</script>