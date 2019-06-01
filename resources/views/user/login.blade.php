<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>登录</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset("/css/bootstrap.css") }}"/>
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

{!! Form::open(array('url'=>'signin', 'method'=>'post')) !!}
    <h5 class="mb-5 font-weight-normal">
        @if($errors->any())
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

            @if(Session::has('login_failed'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('login_failed') }}
                </div>
            @endif
    </h5>


    <h2 class="h2 mb-5 font-weight-normal">登录真新鲜管理系统</h2>

    {!! Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'手机号', 'required'=>'required', 'autofocus'=>'autofocus']) !!}
    {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'密码', 'required'=>'required']) !!}
    {!! Form::submit('登 录', ['class' => 'btn btn-lg btn-primary btn-block', 'style'=>'margin-top:30px']) !!}
    {!! Form::close() !!}

</body>
</html>