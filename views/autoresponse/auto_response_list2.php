
<!-- Contents -->
<div id="Contents">
    <script src="http://ajax.useso.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(function(){
            $(document).on("click",".del",function(){
                alert(123);
            })
        })
    </script>
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
    <!-- /btn_box -->
</div>
<!-- /TopMain -->

<!-- MainForm -->
<div id="MainForm">
    <div class="form_boxA">
        <h2>管理公众号</h2>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>序号</th>
                <th>公众号</th>
                <th>规则名称</th>
                <th>回复类型</th>
                <th>原始触发关键字ID</th>
                <th>回复</th>
                <th>操作</th>
            </tr>



        </table>
    </div>
</div>
<!-- /MainForm -->