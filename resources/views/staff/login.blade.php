<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap 3-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Theme style AdminLTE -->
    <link rel="stylesheet" href="{{asset('lib/AdminLTE/dist/css/AdminLTE.min.css')}}">
    <title>Login</title>
    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            outline: none;
        }
        body {
            background: url("{{asset("public/img/login_background.jpg")}}") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .login-form {
            font: 16px/2em Lato, serif;
            margin: 100px auto;
            max-width: 400px;
        }

        form[role=login] {
            color: #5d5d5d;
            background: #f2f2f2;
            padding: 26px;
            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
        }
        form[role=login] img {
            display: block;
            margin: 0 auto;
            margin-bottom: 20px;
        }
        form[role=login] input,
        form[role=login] button {
            font-size: 18px;
            margin: 16px 0;
        }
        form[role=login] > div {
            text-align: center;
            text-decoration: underline;
        }
        h2{
            color: #188288;
        }
        /*.form-links {*/
            /*text-align: center;*/
            /*margin-top: 1em;*/
            /*margin-bottom: 50px;*/
        /*}*/
        /*.form-links a {*/
            /*color: #fff;*/
        /*}*/
    </style>
</head>
<body >
    <section class="container">
        <section class="login-form">
            <form method="post" action="" role="login">
                <img src="{{asset("public/img/finance_logo.png")}}"  class="img-responsive" alt="" />
                <h2 class="text-center">Login</h2>
                <input type="email" name="email" placeholder="Email" required class="form-control input-lg" />
                <input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
                <button type="button" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
                <div>
                    <a href="forgot-password">Forgot password</a>
                </div>
            </form>
            {{--<div class="form-links">--}}
                {{--<a href="">www.website.com</a>--}}
            {{--</div>--}}
        </section>
    </section>
    <!-- jQuery 2.2.3 -->
    <script src="{{asset('lib/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!--Bootstrap 3-->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>