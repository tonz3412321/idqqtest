<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="_token" content="{!! csrf_token() !!}"/>

    <title>Laravel</title>

    @include('partials._styles')


</head>
<body id="app-layout">

    @include('partials._navigation')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include('partials._title')
                    @include('flash::message')

                    <div class="panel-body">

                      @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myDialog" title="Information Message"><div id="myDialogText"></div></div>
    <div id="myConfirm" title="Confirmation Message"><div id="myConfirmText"></div></div>

    @include('partials._scripts')
</body>
</html>
