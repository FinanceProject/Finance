<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--Bootstrap 3-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Theme style AdminLTE -->
    <link rel="stylesheet" href="{{asset('lib/AdminLTE/dist/css/AdminLTE.min.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <style>
        .panel{
            margin: 100px auto;
            background: #f2f2f2;
            border-radius: 10px;
            max-width: 400px;
        }
        body {
            background: url("{{asset("public/img/login_background.jpg")}}") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .box-body button{
            margin-top: 20px;

        }
        .form-group{
            margin: 0px;
            padding: 0px;
        }
        .text-center p{
            margin: 0px;
        }
        h2{
            color: #188288;
        }


    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div >
            <div class="panel panel-default ">
                <div class="panel-body">
                    <section class="login-form">
                        <div class="text-center">
                            <img src="{{asset("public/img/finance_logo.png")}}">
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="input-group input-group-lg">
                                                <input type="email" class="form-control" placeholder="Email">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            </div>
                                            <button type="button"  class="btn btn-lg btn-primary btn-block">Send</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </section>
                    <div>
                        <a href="login">Back to Login Page</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- jQuery 2.2.3 -->
<script src="{{asset('lib/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!--Bootstrap 3-->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>