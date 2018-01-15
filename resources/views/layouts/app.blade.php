<!DOCTYPE html>
<html lang="en">
<head>
    <title>@lang('localtext.title')</title>
    <meta charset="utf-8">
    {!! Html::style(mix('/css/app.css')) !!} {{--use laravel mix--}}
    {!! Html::style(mix('/js/app.js')) !!}

    <style>
        body{
            font-family: 'Lato';
        }
        .fa-btn{
            margin-right: 6px;
        }
    </style>
</head>
<body id = "app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ action('TaskController@index')}}">
                    @lang('localtext.tasklist')
                </a>
            </div>
        </div>
    </nav>
    @yield('content')
    <!-- JavaScripts -->
    {!! Html::script(mix('/js/app.js')) !!}

</body>
</html>

