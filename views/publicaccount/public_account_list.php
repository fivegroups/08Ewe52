
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
        <div class="form_boxA" id="sc">
            <h2>公众号列表</h2>

        <?php foreach($arr as $k=>$v){?>

        <table cellpadding="0" cellspacing="0">
        <tr id="<?php echo $v['pa_id'] ?>">
            <td><?php echo $v['pa_name']?></td>
            <td>(微信号:<?php echo $v['pa_weixin']?>)</td>
            <td>（所属用户：创始人）</td>
            <td><a href="index.php?r=publicaccount/del&pa_id=<?php echo $v['pa_id']?>" class="del" id="<?php echo $v['pa_id']?>">删除</a> ||
                 <a href="index.php?r=publicaccount/xg&pa_id=<?php echo $v['pa_id']?>" class="upd" >编辑</a>
            </td>
         </tr>
        </table>

        <table cellpadding="0" cellspacing="0">
            <tr><td>API地址:<div class="txtbox floatL">
                        <input name="pat_api_link" id="content" required="required" type="text" size="60" value="<?php echo $v['pat_api_link']?>?hash=<?php echo $v['pat_hash']?>">
                    </div><!--<button id="copy">copy</button>-->
           </td></tr>
        </table>

        <table cellpadding="0" cellspacing="0">
            <tr><td>Token: <div class="txtbox floatL"><input name="pat_token" required="required" type="text" size="60" value="<?php echo $v['pat_token']?>">
              </div><!--<button id="copy">copy</button>-->
             </td></tr>
        </table>
        <hr >
        <?php }?>

            <p class="msg">共找到47条年度预算记录，当前显示从第1条至第10条</p>
        </div>
    </div>
    <!-- /MainForm -->

    <script src="jquery-2.1.4.min.js"></script>
  <!--  <script src="jquery-zclip-master/jquery.zclip.js"></script>

    <script>
        $(function(){
            $("#copy").zclip({
                path: 'web/jquery-zclip-master/ZeroClipboard.swf',
                copy: function(){//复制内容
                    return $('#content').val();
                },
                afterCopy: function(){//复制成功
                    //$("<span id='msg'/>").insertAfter($('#copy')).text('复制成功');
                    alert("success")
                }
            })
        })
    </script>-->


  <!--  <script>
        $('.del').click(function(){
            var id=$(this).attr("id");
            var obj=$(this);
            //alert(id)
            $.post("index.php?r=publicaccount/del",{id:id},function(data){
                if(data==1) {
                    obj.parent().parent().remove();
                }
            })
        })
    </script>
-->