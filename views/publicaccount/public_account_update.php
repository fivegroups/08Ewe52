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
            <form action="index.php?r=publicaccount/zx_update" method="post">
                <table cellpadding="0" cellspacing="0">
                    <?php foreach($arr as $k=>$v){?>
                        <input type="hidden" name="pa_id" value="<?php echo $v['pa_id']?>"/>
                        <tr>
                            <th>公众号名称：</th>
                            <td><div class="txtbox floatL"><input name="pa_name" required="required" type="text" size="60" value="<?php echo $v['pa_name']?>"></div></td>
                        </tr>
                        <tr>
                            <th>公众号类型：</th>
                            <td><div class="txtbox floatL">
                                    <select name="pa_type" id="catid" class="required" >
                                    <?php if($v['pa_type'] == "微信公众平台"){?>
                        <option value="微信公众平台" selected>微信公众平台</option>
                        <option value="易信公众平台" >易信公众平台</option>
                    <?php }else{?>
                        <option value="微信公众平台" >微信公众平台</option>
                        <option value="易信公众平台" selected>易信公众平台</option>
                    <?php }?>
                                    </select>
                                </div></td>
                        </tr>
                        <?php foreach($str as $key=>$val){?>
                        <tr>
                            <th>API地址：</th>
                            <td><div class="txtbox floatL"><input name="pat_api_link" required="required" type="text" size="60" value="<?php echo $val['pat_api_link'].'?hash='.$val['pat_hash']?>"></div></td>
                        </tr>
                        <tr>
                            <th>Token</th>
                            <td><div class="txtbox floatL"><input name="pat_token" required="required" type="text" size="60" value="<?php echo $val['pat_token']?>"></div></td>
                        </tr>
                    <?php }?>
                        <tr>
                            <th>公众号appid：</th>
                            <td><div class="txtbox floatL"><input name="pa_appid" required="required" type="text" size="60" value="<?php echo $v['pa_appid']?>"></div></td>
                        </tr>
                        <tr>
                            <th>公众号AppSecret：</th>
                            <td><div class="txtbox floatL"><input name="pa_appsecret" required="required" type="text" size="60" value="<?php echo $v['pa_appsecret']?>"></div></td>
                        </tr>
                        <tr>
                            <th>微信号：</th>
                            <td><div class="txtbox floatL"><input name="pa_weixin" required="required" type="text" size="60" value="<?php echo $v['pa_weixin']?>"></div></td>
                        </tr>
                        <tr>
                            <th>原始帐号：</th>
                            <td><div class="txtbox floatL"><input name="pa_wx_account" required="required" type="text" size="60" value="<?php echo $v['pa_wx_account']?>"></div></td>
                        </tr>
                        <td>
                            <input type="submit" value="修改" />
                            <button><a style="color: #000000" href="index.php?r=publicaccount/show">返回公众号列表</a></button>
                        </td>
                        </tr>
                        <?php }?>
                </table>
            </form>
        </div>
    </div>
    <!-- /MainForm -->
