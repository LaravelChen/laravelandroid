<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="//cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container" style="margin-top: 100px">
        <form method="POST" action="{{url('/api/user_login')}}" accept-charset="UTF-8">
{{--            {!! csrf_field() !!}--}}
            {{--<div class="form-group">--}}
                {{--<label for="name" class="control-label">User:</label>--}}
                {{--<input id="name" name="name" type="text" class="form-control" required="required">--}}
            {{--</div>--}}
            <div class="form-group">
                <label for="password" class="control-label">密码:</label>
                <input id="password" name="password" type="password" class="form-control" required="required">
            </div>
            <div class="form-group">
                <label for="email" class="control-label">邮箱:</label>
                <input id="email" name="email" type="email" class="form-control" required="required">
            </div>
            <button type="submit" class="btn btn-success form-control">提交</button>
        </form>
    </div>

    </body>
</html>
