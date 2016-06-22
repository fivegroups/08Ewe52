<?php if(!isset($_COOKIE['u_name']) || empty($_COOKIE['u_name'])){
    echo "<script>location.href='index.php?r=user/index'</script>";
}?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="generator" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <link href="public/css/haiersoft.css" rel="stylesheet" type="text/css" media="screen,print" />
    <link href="public/css/print.css" rel="stylesheet" type="text/css"  media="print" />
    <script src="public/js/jquery-1.10.1.min.js"></script>
    <script src="public/js/side.js" type="text/javascript"></script>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>

<body>
<!-- wrap_left -->
<div class="wrap_left" id="frmTitle" name="fmTitle">
    <!-- Logo -->
    <div id="Logo"><span>人单合一</span></div>
    <!-- /Logo -->

    <!-- menu_list -->
    <script>
        $(function() {
            $(".menu_list dd");
            $(".menu_list dt").click(function(){
                $(this).toggleClass("open").next().slideToggle("fast");
            });
        });
    </script>
    <div class="menu_list">
        <dl>
            <dt><span>公众号管理</span></dt>
            <dd><a href="index.php?r=publicaccount/add" >添加公众号</a>
                <a href="index.php?r=publicaccount/show" >管理公众号</a>
            </dd>

            <dt><span>自定义文字回复</span></dt>
            <dd><a href="index.php?r=autoresponse/add" title="二级分类">添加规则</a>
                <a href="index.php?r=autoresponse/show" title="二级分类">管理规则</a>
            </dd>

            <dt><span>一级分类名称</span></dt>
            <dd><a href="" title="二级分类">二级分类</a>
                <a href="" title="二级分类">二级分类</a>
                <a href="" title="二级分类">二级分类</a>
                <a href="" title="二级分类">二级分类</a></dd>



        </dl>
    </div>
    <!-- /menu_list -->
</div>
<!-- /wrap_left -->

<!-- picBox -->
<div class="picBox" onclick="switchSysBar()" id="switchPoint"></div>
<!-- /picBox -->



<!-- wrap_right -->
<div class="wrap_right">
    <header>
        <!-- Header -->
        <div id="Header">
            <!-- Head -->
            <div id="Head">
                <h1 title="1408phpE五组微E系统管理后台">1408phpE五组微E系统管理后台</h1>
                <script language="javascript">
                    function showmenu(id){id.style.visibility = "visible";}
                    function hidmenu(){UserList.style.visibility = "hidden";}
                    document.onclick = hidmenu;
                </script>
                <div class="user"><a href="javascript:showmenu(UserList)"><?php echo isset($_COOKIE['u_name'])?$_COOKIE['u_name']:""?></a>
                    <div id="UserList"><a href="">修改</a>
                        <!--<a href="">注销</a>-->
                        <a href="index.php?r=user/logout">退出</a>
                    </div>
                </div>
            </div>

    </header>


    <!-- Contents -->
    <div id="Contents">
        <script type="text/javascript">
            $(function(){
                $(".select").each(function(){
                    var s=$(this);
                    var z=parseInt(s.css("z-index"));
                    var dt=$(this).children("dt");
                    var dd=$(this).children("dd");
                    var _show=function(){dd.slideDown(200);dt.addClass("cur");s.css("z-index",z+1);};
                    var _hide=function(){dd.slideUp(200);dt.removeClass("cur");s.css("z-index",z);};
                    dt.click(function(){dd.is(":hidden")?_show():_hide();});
                    dd.find("a").click(function(){dt.html($(this).html());_hide();});
                    $("body").click(function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});})})
        </script>
        <!-- TopMain -->

        <!-- /TopMain -->

<?= $content  ?>


        <!-- PageNum -->
        <ul id="PageNum">
            <li><a href="">首页</a></li>
            <li><a href="">上一页</a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href="">6</a></li>
            <li><a href="">下一页</a></li>
            <li><a href="">尾页</a></li>
        </ul>
        <!-- /PageNum -->
    </div>
    <!-- /Contents -->

    <!-- /footer -->
    <footer>
        <address>电子邮箱：sales@haiersoft.com  技术支持：人单合一平台项目组<br>青岛海尔软件有限公司版权所有  Copyright &copy; 2015 Haiersoft Corporation, All Rights.</address>
    </footer>
    <!-- /footer -->

</div>
<!-- /wrap_right -->
</body>
</html>

