<?php
    include_once "common.inc.php";

    if(@$_GET['act'] == 'feed'){
        if(isset($_POST['username']) && isset($_POST['feedbody'])){
            $_SESSION['username'] = $_POST['username'];
            /*
                    Igore
             */
        }
    }
?>

<html>
    <head>
        <title> 留言/反馈</title>
        <link href="static/bootstrap.min.css" rel="stylesheet">
        <script src="static/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script src="static/bootstrap.min.js" type="text/javascript"></script>
        <script src="static/jquery.cookie.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div >
                <h2>留言反馈平台</h2>
            </div>
            <div class="jumbotron">
                <div class="container">
                    <form role="form" id="feedForm">
                        <div class="form-group">
                            <input class="form-control" rows="3" placeholder="用户名" type="text" id="username">
                        </div>
                        <div id="feedBody" class="form-group" style="display: none">
                            <textarea id="content" class="form-control" rows="3" placeholder="反馈内容"></textarea>
                        </div>
                        <input type="button" id="submit" class="btn btn-primary btn-lg btn-block" value="确定">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    $('#submit').click(function(){
        if($("#feedBody").is(":hidden")){
            $('#username').attr('disabled',true);
            $('#feedBody').fadeIn();
            $('#submit').val('提交');
        }else{
            $.post('./index.php?act=feed',{'username':$('#username').val(),'feedbody':$('#content').val()},function(data){
                alert('留言成功');
                $('#feedForm')[0].reset();
                $('#username').attr('disabled',false);
            });
        }
    });
</script>