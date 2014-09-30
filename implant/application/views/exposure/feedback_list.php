<?php
CView::show('layout/header_list1');
?>
<div class="pad-10">
    <div class="content-menu ib-a blue line-x">
        <a class="add fb" href="javascript:;"
           onclick=javascript:openwinx('<?= APP_URL ?>/invite/append','')><em>添加内容</em></a>　
        <!--  <a href="?m=content&c=content&a=init&catid=4?pc_hash=Lyr5kg" class=on><em>审核通过</em></a><span>|</span>
          <a href="javascript:;" onclick="javascript:$('#searchid').css('display','');"><em>搜索</em></a>-->
    </div>
    <div id="searchid" style="display:none">
        <form name="searchform" action="" method="get">
            <input type="hidden" value="content" name="m">
            <input type="hidden" value="content" name="c">
            <input type="hidden" value="init" name="a">
            <input type="hidden" value="4" name="catid">
            <input type="hidden" value="0" name="steps">
            <input type="hidden" value="1" name="search">
            <input type="hidden" value="Lyr5kg" name="pc_hash">
            <table width="100%" cellspacing="0" class="search-form">
                <tbody>
                <tr>
                    <td>
                        <div class="explain-col">

                            添加时间：
                            <link rel="stylesheet" type="text/css" href="/statics/js/calendar/jscal2.css"/>
                            <link rel="stylesheet" type="text/css" href="/statics/js/calendar/border-radius.css"/>
                            <link rel="stylesheet" type="text/css" href="/statics/js/calendar/win2k.css"/>
                            <script type="text/javascript" src="/statics/js/calendar/calendar.js"></script>
                            <script type="text/javascript" src="/statics/js/calendar/lang/en.js"></script>
                            <input type="text" name="start_time" id="start_time" value="" size="10" class="date"
                                   readonly>&nbsp;
                            <script type="text/javascript">
                                Calendar.setup({
                                    weekNumbers: false,
                                    inputField: "start_time",
                                    trigger: "start_time",
                                    dateFormat: "%Y-%m-%d",
                                    showTime: false,
                                    minuteStep: 1,
                                    onSelect: function () {
                                        this.hide();
                                    }
                                });
                            </script>
                            - &nbsp;<input type="text" name="end_time" id="end_time" value="" size="10" class="date"
                                           readonly>&nbsp;
                            <script type="text/javascript">
                                Calendar.setup({
                                    weekNumbers: false,
                                    inputField: "end_time",
                                    trigger: "end_time",
                                    dateFormat: "%Y-%m-%d",
                                    showTime: false,
                                    minuteStep: 1,
                                    onSelect: function () {
                                        this.hide();
                                    }
                                });
                            </script>
                            <select name="posids">
                                <option value='' selected>全部</option>
                                <option value="1">推荐</option>
                                <option value="2">不推荐</option>
                            </select>
                            <select name="searchtype">
                                <option value='0' selected>标题</option>
                                <option value='1'>简介</option>
                                <option value='2'>用户名</option>
                                <option value='3'>ID</option>
                            </select>

                            <input name="keyword" type="text" value="" class="input-text"/>
                            <input type="submit" name="search" class="button" value="搜索"/>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <form name="myform" id="myform" action="" method="post">
        <div class="table-list">
            <table width="100%">
                <thead>
                <tr>
                    <th width="16"><input type="checkbox" value="" id="check_box" onclick="selectall('ids[]');"></th>
                    <!--<th width="37">排序</th>-->
                    <th width="60">ID</th>
                    <th width="80">姓名</th>
                    <th width="120">联系方式</th>
                    <th>内容</th>
                    <th width="210">提交时间</th>
                    <th width="80">管理操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($feedback) && $feedback) {
                    foreach ($feedback as $item) {
                        ?>
                        <tr>
                            <td align="center"><input class="inputcheckbox " name="ids[]" value="<?= $item['id'] ?>"
                                                      type="checkbox">
                            </td>
                            <!--<td align='center'><input name='listorders[1]' type='text' size='3' value='0'
                                                      class='input-text-c'>-->
                            </td>
                            <td align='center'><?= $item['id'] ?></td>
                            <td align='center'><?= $item['name'] ?></td>
                            <td align='center'><?= $item['phone'] ?></td>
                            <td>
                                <a href="#" target="_blank"><span><?php
                                        $content = $item['content'];
                                        if (mb_strlen($content) > 28) {
                                            $content = mb_substr($content, 0, 48).'...';
                                        }
                                        echo $content;
                                        ?></span></a>
                            </td>
                            <td align='center'><?= date('Y-m-d H:i:s', $item['create_time']) ?></td>
                            <td align='center'><a href="javascript:;"
                                                  onclick="javascript:openwinx('<?= APP_URL ?>/feedback/show?id=<?= $item['id'] ?>','')">查看</a>
                            </td>
                        </tr>
                    <?php
                    }
                } ?>
                </tbody>
            </table>
            <div class="btn"><label for="check_box">全选/取消</label>
                <input type="hidden" value="Lyr5kg" name="pc_hash">
                <!--<input type="button" class="button" value="排序"
                       onclick="myform.action='?m=content&c=content&a=listorder&dosubmit=1&catid=4&steps=0';myform.submit();"/>-->
                <input type="button" class="button" value="删除"
                       onclick="myform.action='';return confirm_delete()"/>
                <!--<input type="button" class="button" value="推送" onclick="push();"/>-->
                <!--<input type="button" class="button" value="批量移动"
                       onclick="myform.action='?m=content&c=content&a=remove&catid=4';myform.submit();"/>-->
            </div>
            <div id="pages"></div>
        </div>
    </form>
</div>
<script language="javascript" type="text/javascript" src="/statics/js/cookie.js"></script>
<script type="text/javascript">
    <!--
    function push() {
        var str = 0;
        var id = tag = '';
        $("input[name='ids[]']").each(function () {
            if ($(this).attr('checked') == 'checked') {
                str = 1;
                id += tag + $(this).val();
                tag = '|';
            }
        });
        if (str == 0) {
            alert('您没有勾选信息');
            return false;
        }
        window.top.art.dialog({id: 'push'}).close();
        window.top.art.dialog({
            title: '推送：',
            id: 'push',
            iframe: '?m=content&c=push&action=position_list&catid=4&modelid=3&id=' + id,
            width: '800',
            height: '500'
        }, function () {
            var d = window.top.art.dialog({id: 'push'}).data.iframe;// 使用内置接口获取iframe对象
            var form = d.document.getElementById('dosubmit');
            form.click();
            return false;
        }, function () {
            window.top.art.dialog({id: 'push'}).close()
        });
    }
    function confirm_delete() {
        if (confirm('确认删除吗？')) {
            var url = '<?= APP_URL ?>/feedback/drop';
            /*var ids = $('[name^=ids]:checked').each(function (e) {
             console.log(e.val());
             });*/
            var ids = new Array();
            $('[name^=ids]:checked').each(function (e) {
                ids.unshift($(this).val())
            })

            $.post(url, {id: ids}, function (r) {
                if (r.code == 0) {
                    location.reload();
                } else {
                    alert('删除失败')
                }
            }, 'json')
            // $('#myform').submit();
            return false;
        }
    }
    function view_comment(id, name) {
        window.top.art.dialog({id: 'view_comment'}).close();
        window.top.art.dialog({
            yesText: '关闭',
            title: '查看评论：' + name,
            id: 'view_comment',
            iframe: 'index.php?m=comment&c=comment_admin&a=lists&show_center_id=1&commentid=' + id,
            width: '800',
            height: '500'
        }, function () {
            window.top.art.dialog({id: 'edit'}).close()
        });
    }
    function reject_check(type) {
        if (type == 1) {
            var str = 0;
            $("input[name='ids[]']").each(function () {
                if ($(this).attr('checked') == 'checked') {
                    str = 1;
                }
            });
            if (str == 0) {
                alert('您没有勾选信息');
                return false;
            }
            document.getElementById('myform').action = '?m=content&c=content&a=pass&catid=4&steps=0&reject=1';
            document.getElementById('myform').submit();
        } else {
            $('#reject_content').css('display', '');
            return false;
        }
    }
    setcookie('refersh_time', 0);
    function refersh_window() {
        var refersh_time = getcookie('refersh_time');
        if (refersh_time == 1) {
            window.location.reload();
        }
    }
    setInterval("refersh_window()", 3000);
    //-->
</script>
</body>
</html>