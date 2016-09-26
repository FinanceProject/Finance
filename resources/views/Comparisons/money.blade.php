<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <!--AdminLTE-->
    <link rel="stylesheet" href="{{asset("lib/AdminLTE/dist/css/AdminLTE.min.css")}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset("lib/AdminLTE/plugins/datatables/dataTables.bootstrap.css")}}">
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>So sánh Tiền tệ</title>
    <style>
        #panel_table{
            left: 0;
            padding: 0;
        }
        .panel-heading{
            background: #00a7d0;!important;
        }
        {{--#container {--}}
            {{--width: 100px;--}}
            {{--height: 100px;--}}
            {{--position: relative;--}}
        {{--}--}}
        /*#tb_money,*/
        /*#progress*/
        /*{*/

            /*position: absolute;*/
            /*top: 0;*/
            /*left: 0;*/
        /*}*/
        /*#progress {*/
            /*z-index: 10;*/
        /*}*/
    </style>
</head>
<body>
    <div class="container">
        <div class="row col-md-offset-2">
            <div class="col-md-4" style="padding: 0;">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <select class="form-control" id="slt_TypeMoney" title="Type Money">
                        <option>USD (Áp dụng đối với mệnh giá 50-100)</option>
                        <option>EUR</option>
                        <option>GBP</option>
                        <option>SGD</option>
                        <option>HKD</option>
                </select>
            </div>
            <span id="progress" class="col-md-4" style=" margin-top: 5px">
                <img id="img_progress" src="{{asset("public/img/slide.gif")}}" >
            </span>
        </div>

        <div id="panel_table" class="panel panel-info col-md-8 col-md-offset-2">
            <div class="panel-heading text-center">Bảng So Sánh Tỷ Giá Ngoại tệ</div>
            <div class="panel-body">
                <table id="tb_money" class="table table-bordered table-hover" >
                    <thead>
                        <th>Ngân hàng</th>
                        <th>Mua Tiền Mặt</th>
                        <th>Mua Chuyển Khoản</th>
                        <th>Bán Chuyển khoản</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- jQuery 2.2.3 -->
    <script src="{{asset("lib/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js")}}"></script>
    <!--Bootstrap 3-->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="{{asset("lib/AdminLTE/plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("lib/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
    <script type="text/javascript">

        var type ='';
        var _token = $('#_token').val();
        $('#slt_TypeMoney').prop('disabled', 'disabled');
        var table = $('#tb_money').DataTable({
            "lengthMenu": [[3, 5, 7, -1], [3, 5, 7, "All"]],
            'ajax': {
                "url": "exchange",
                "type": "get",
                "data":{
                    "type":type,
                    "_token": _token
                },
                dataSrc: function (json) {
                    $('#progress').hide();
                    $('#slt_TypeMoney').prop('disabled', false);
                    return json.data;
                }

            }
        });

        $(document).ready(function () {

            $("#slt_TypeMoney" ).change(function() {
                
                 $('#progress').show();
                $('#slt_TypeMoney').prop('disabled', 'disabled');
                 table.clear().draw();
                var type =$("#slt_TypeMoney").find("option:selected" ).text();
                $.ajax({
                    url: "exchange",
                    type: "get",
                    dataType:'json',
                    data:{
                        "type":function(){
                            var text = $('.dataTables_empty');
                            text.text("Loading...");
                            return type;
                        },
                        "_token": _token
                    },
                    success: function (result) {
                      
                       for(var i=0; i<Object.keys(result['data']).length; i++){
                           table.row.add(result['data'][i]).draw(false);

                       }
                        $('#progress').hide();
                        $('#slt_TypeMoney').prop('disabled', false);

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }


                });
            });
        });

    </script>
</body>
</html>