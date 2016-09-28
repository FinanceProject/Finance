<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <!--AdminLTE-->
    <link rel="stylesheet" href="{{asset("lib/AdminLTE/dist/css/AdminLTE.min.css")}}">

    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Lãi Suất Ngân hàng</title>
    <style>
        body {
            padding-top: 90px;
        }
        .panel-interest-rate {
            border-color: #ccc;
            -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
            -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
            box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
        }
        .panel-interest-rate>.panel-heading {
            color: #00415d;
            background-color: #fff;
            border-color: #fff;
            text-align:center;
        }
        .panel-interest-rate>.panel-heading a{
            text-decoration: none;
            color: #666;
            font-weight: bold;
            font-size: 15px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }
        .panel-interest-rate>.panel-heading #borrow-form-link.active {
            color: #1CB94E;
            font-size: 18px;
        }
        .panel-interest-rate>.panel-heading #saving-form-link.active {
            color: #59B2E0;
            font-size: 18px;
        }
        .panel-interest-rate>.panel-heading hr{
            margin-top: 10px;
            margin-bottom: 0px;
            clear: both;
            border: 0;
            height: 1px;
            background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
            background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
            background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
            background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
        }
        .panel-interest-rate input[type="text"],.panel-interest-rate input[type="email"],.panel-interest-rate input[type="password"] {
            height: 45px;
            border: 1px solid #ddd;
            font-size: 16px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }
        .panel-interest-rate input:hover,
        .panel-interest-rate input:focus {
            outline:none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            border-color: #ccc;
        }
        .btn-saving {
            background-color: #59B2E0;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #59B2E6;
        }
        .btn-saving:hover,
        .btn-saving:focus {
            color: #fff;
            background-color: #53A3CD;
            border-color: #53A3CD;
        }
        .forgot-password {
            text-decoration: underline;
            color: #888;
        }
        .forgot-password:hover,
        .forgot-password:focus {
            text-decoration: underline;
            color: #666;
        }

        .btn-borrow {
            background-color: #1CB94E;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #1CB94A;
        }
        .btn-borrow:hover,
        .btn-borrow:focus {
            color: #fff;
            background-color: #1CA347;
            border-color: #1CA347;
        }
        .input-group{

            padding: 0px;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-interest-rate">
                <div class="panel-heading">

                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="saving-form-link">Lãi suất tiết kiệm</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="borrow-form-link">Lãi suất vay vốn</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--Lãi suất tiết kiệm-->
                            <form id="saving-form" action="" method="post" role="form" style="display: block;">
                                <div class=" form-group col-md-12">
                                    <div class="input-group">
                                        <input type="text" name="saving_money" id="saving_money" class="form-control text-center" placeholder="Nhập số tiền muốn gửi">
                                        <span class="input-group-addon ">VNĐ</span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control " id="slt_term" title="Kỳ hạn">
                                        <option selected disabled class="text-center">Kỳ hạn</option>
                                        <option  >1 tháng</option>
                                        <option>3 tháng</option>
                                        <option>6 tháng</option>
                                        <option>12 tháng</option>
                                        <option>18 tháng</option>
                                        <option>24 tháng</option>
                                        <option>36 tháng</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control text-center" id="slt_receive_method" title="Phương thức nhận lãi">
                                        <option selected disabled >Phương thức nhận lãi suất</option>
                                        <option>Nhận lãi trước</option>
                                        <option>Nhận lãi hàng tháng</option>
                                        <option>Nhận lãi cuối kỳ</option>
                                        <option>Rút gốc linh hoạt</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <select class="form-control text-center" id="slt_bank" title="Ngân hàng">
                                        <option selected disabled>Lựa chọn một ngân hàng</option>
                                        <option>ABBank - Ngân hàng TMCP An Bình</option>
                                        <option>ACB - Ngân hàng Á Châu</option>
                                        <option>AgriBank - Ngân hàng Nông nghiệp và Phát triển nông thôn</option>
                                        <option>BIDV - Ngân hàng đầu tư và phát triển Việt Nam </option>
                                        <option>MBBank - Ngân hàng Quân đội</option>
                                        <option>SacomBank - Ngân hàng TMCP Sài Gòn Thương Tín </option>
                                        <option>TechcomBank - Ngân hàng TMCP Kỹ thương Việt Nam </option>
                                        <option>VietcomBank - Ngân hàng TMCP Ngoại thương Việt Nam </option>
                                        <option>DongA Bank - Ngân hàng TMCP Đông Á </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="saving-submit" id="login-submit" tabindex="4" class="form-control btn btn-saving" value="Tính toán">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--Lãi suất vay-->
                            <form id="borrow-form" action="#" method="post" role="form" style="display: none;">
                                <div class=" form-group col-md-12">
                                    <div class="input-group">
                                        <input type="text" name="borrow_money" id="borrow_money" class="form-control text-center" placeholder="Nhập số tiền muốn vay">
                                        <span class="input-group-addon ">VNĐ</span>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <select class="form-control " id="slt_borrow_method" title="Hình thức vay">
                                        <option selected disabled class="text-center">Hình thức vay</option>
                                        <option>Vay tín dụng</option>
                                        <option>Vay thế chấp</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control text-center" id="slt_intent" title="Mục đích vay">
                                        <option selected disabled>Mục đích vay</option>
                                        <option>Vay mua bất động sản </option>
                                        <option>Vay mua xe</option>
                                        <option>Vay mua nhà</option>
                                        <option>Vay tiêu dùng</option>
                                        <option>Vay kinh doanh</option>
                                        <option>Vay xây dựng- sửa nhà</option>
                                        <option>Vay sản xuất nông nghiệp</option>
                                        <option>Vay du học</option>
                                        <option>Vay mua ô tô cũ</option>
                                        <option>Vay chứng khoán</option>
                                        <option>Vay cầm cố chứng từ có giá trị</option>
                                        <option>Cho vay mua nhà ở xã hội</option>
                                        <option>Cho vay cầm cố chứng khoán niêm yết</option>
                                        <option>Thấu chi có đảm bảo</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <select class="form-control text-center" id="slt_bank" title="Ngân hàng">
                                        <option selected disabled>Lựa chọn một ngân hàng</option>
                                        <option>ABBank - Ngân hàng TMCP An Bình</option>
                                        <option>ACB - Ngân hàng Á Châu</option>
                                        <option>AgriBank - Ngân hàng Nông nghiệp và Phát triển nông thôn</option>
                                        <option>BIDV - Ngân hàng đầu tư và phát triển Việt Nam </option>
                                        <option>MBBank - Ngân hàng Quân đội</option>
                                        <option>SacomBank - Ngân hàng TMCP Sài Gòn Thương Tín </option>
                                        <option>TechcomBank - Ngân hàng TMCP Kỹ thương Việt Nam </option>
                                        <option>VietcomBank - Ngân hàng TMCP Ngoại thương Việt Nam </option>
                                        <option>DongA Bank - Ngân hàng TMCP Đông Á </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="borrow-submit" id="borrow-submit" tabindex="4" class="form-control btn btn-borrow" value="Tính toán">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- jQuery 2.2.3 -->
    <script src="{{asset("lib/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js")}}"></script>
    <!--Bootstrap 3-->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#saving-form-link').click(function(e) {
            $("#saving-form").delay(100).fadeIn(100);
            $("#borrow-form").fadeOut(100);
            $('#borrow-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#borrow-form-link').click(function(e) {
            $("#borrow-form").delay(100).fadeIn(100);
            $("#saving-form").fadeOut(100);
            $('#saving-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });
</script>
</body>
</html>
{{-- <ul class="nav nav-tabs col-md-8 col-md-offset-2">
                <li class="active"><a data-toggle="tab" href="#saving">Lãi suất gửi Tiết Kiệm</a></li>
                <li><a data-toggle="tab" href="#borrow">Lãi suất Vay Vốn</a></li>
            </ul>
            <div class="tab-content">
                <div id="saving" class="tab-pane fade in active col-md-8 col-md-offset-2">
                    <form action="">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Số tiền gửi</label>
                            <input type="text" name="money" value="" placeholder="1,000,000,000">
                        </div>
                    </form>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <form action="">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Số tiền cần vay: </label>
                            <input type="text" name="money" value="" placeholder="1,000,000,000">
                        </div>
                    </form>
                </div>
            </div>--}}