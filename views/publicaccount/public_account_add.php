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


    <!-- MainForm -->
    <div id="MainForm">
        <div class="form_boxA">
            <h2>添加公众号</h2>
            <form action="index.php?r=publicaccount/add" method="post">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th>公众号名称：</th>
                        <td><div class="txtbox floatL"><input name="pa_name" required="required" type="text" size="60" placeholder="您可以给此公众号起一个名字, 方便下次修改和查看"></div></td>
                    </tr>
                    <tr>
                        <th>公众号类型：</th>
                        <td><div class="txtbox floatL">
                                <select name="pa_type" id="catid" class="required" >
                                    <option value="微信公众平台" >微信公众平台</option>
                                    <option value="易信公众平台" >易信公众平台</option>
                                </select>
                            </div></td>
                    </tr>

                    <tr>
                        <th>公众号appid：</th>
                        <td><div class="txtbox floatL"><input name="pa_appid" required="required" type="text" size="60" placeholder="请填写微信公众平台后台的AppId"></div></td>

                    </tr>

                    <tr>
                        <th>公众号AppSecret：</th>
                        <td><div class="txtbox floatL"><input name="pa_appsecret" required="required" type="text" size="60" placeholder="请填写微信公众平台后台的AppSecret, 只有填写这两项才能管理自定义菜单"></div></td>
                    </tr>
                    <tr>
                        <th>微信号：</th>
                        <td><div class="txtbox floatL"><input name="pa_weixin" required="required" type="text" size="60" placeholder="您的微信帐号，本平台支持管理多个微信公众号"></div></td>
                    </tr>
                    <tr>
                        <th>原始帐号：</th>
                        <td><div class="txtbox floatL"><input name="pa_wx_account" required="required" type="text" size="60" placeholder="微信公众帐号的原ID串"></div></td>
                    </tr>

                    <td>
                        <input type="submit" value="提交" />
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
