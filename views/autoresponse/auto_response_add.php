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
            <h2>添加数据</h2>
            <form action="index.php?r=autoresponse/add" method="post"  enctype="multipart/form-data">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th>规则名称：</th>
                        <td><div class="txtbox floatL"><input name="m_rule_name" type="text" size="50"></div></td>
                    </tr>
                    <tr>
                        <th>公众号名称</th>
                        <td><div class="txtbox floatL">
                                <select name="pa_id">
                                    <?php  foreach($content as $k =>$v){ ?>
                                        <option value="<?php echo $v['pa_id'] ?>"><?php echo $v['pa_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>回复类型：</th>
                        <td><div class="txtbox floatL">
                                <select name="m_rule_type" id="catid" class="required" >
                                    <option value="基本文字回复" >基本文字回复</option>
                                    <option value="基本混合图文回复" >基本混合图文回复</option>
                                    <option value="基本语音回复" >基本语音回复</option>
                                    <option value="自定义接口回复" >自定义接口回复</option>
                                    <option value="微CMS" >微CMS</option>

                                </select>
                            </div></td>
                    </tr>
                    <tr>
                        <th>触发关键字：</th>
                        <td><div class="txtbox floatL"><input name="m_wd" type="text" size="30"></div></td>
                    </tr>
                    <tr>
                        <th>回复：</th>
                        <td><div class="txtbox floatL"><textarea name="m_content"  cols="30" style="width: 98%;" rows="10"></textarea>
                            </div></td>
                    </tr>

                    <td>
                        <input type="submit" value="提交" />
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!-- /MainForm -->

