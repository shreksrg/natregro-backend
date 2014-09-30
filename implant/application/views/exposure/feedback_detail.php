<?php
CView::show('layout/header_edit1');
?>
<script type="text/javascript">var catid = 4</script>
<form name="myform" id="myform" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $feedback['id'] ?>"/>

    <div class="addContent">
        <div class="crumbs">当前位置：反馈投诉 > 查看内容</div>

        <a title="展开与关闭" class="r-close" hidefocus="hidefocus" style="outline-style: none; outline-width: medium;"
           id="RopenClose" href="javascript:;"><span class="hidden">展开</span></a>


        <div class="col-auto">
            <div class="col-1">
                <div class="content pad-6">
                    <table width="100%" cellspacing="0" class="table_form">
                        <tbody>

                        <tr>
                            <th width="80"><font color="red">*</font> 姓名</th>
                            <td><input readonly id="title" type="text" style="width:400px;" name="position"
                                       value="<?= $feedback['name'] ?>"
                                       style="color:" class="measure-input">
                            </td>
                        </tr>

                        <tr>
                            <th width="80"><font color="red">*</font> 联系方式</th>
                            <td><input readonly id="department" type='text' name='department' value='<?= $feedback['phone'] ?>'
                                       style='width:280px'
                                       class='input-text'>
                            </td>
                        </tr>
                        <tr>
                            <th width="80"><font color="red">*</font>反馈内容</th>
                            <td><textarea readonly style="width:640px; height: 258px" name="desc" id="content"   boxid="content"><?= $feedback['content'] ?></textarea>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>

    <div class="fixed-bottom">
        <div class="fixed-but text-c">
            <!--<div class="button"><input value="保存并继续发表" type="submit" name="dosubmit_continue" class="cu"
                                       style="width:130px;" title="Alt+X" onclick="refersh_window()"></div>-->
            <div class="button"><input value="关闭(X)" type="button" name="close"
                                       onclick="refersh_window();close_window();" class="cu" style="width:70px;"></div>
        </div>
    </div>
</form>

</body>
</html>


<script>

    function genObject(name) {
        return $('[name=' + name + ']')
    }


    $(function () {
        //列表赋值
        var edu = genObject('edu');
        if (edu.attr('vo').length > 0) {
            edu.val(edu.attr('vo'));
        }

        var j_type = genObject('type');
        if (j_type.attr('vo').length > 0) {
            j_type.val(j_type.attr('vo'));
        }

        var j_status = genObject('status');
        if (j_status.attr('vo').length > 0) {
            j_status.val(j_status.attr('vo'));
        }
    })
</script>

<script type="text/javascript">
    <!--
    //只能放到最下面
    var openClose = $("#RopenClose"), rh = $(".addContent .col-auto").height(), colRight = $(".addContent .col-right"), valClose = getcookie('openClose');
    $(function () {
        if (valClose == 1) {
            colRight.hide();
            openClose.addClass("r-open");
            openClose.removeClass("r-close");
        } else {
            colRight.show();
        }
        openClose.height(rh);
        $.formValidator.initConfig({
            formid: "myform", autotip: true, onerror: function (msg, obj) {
                window.top.art.dialog({
                    id: 'check_content_id',
                    content: msg,
                    lock: true,
                    width: '200',
                    height: '50'
                }, function () {
                    $(obj).focus();
                    boxid = $(obj).attr('id');
                    if ($('#' + boxid).attr('boxid') != undefined) {
                        check_content(boxid);
                    }
                })
            }
        });
        $("#title").formValidator({onshow: "", onfocus: "请输入标题"}).inputValidator({min: 1, max: 80, onerror: "标题不能为空"});
        $("#position").formValidator({onshow: "", onfocus: "请输入职位"}).inputValidator({
            min: 1,
            max: 80,
            onerror: "职位不能为空"
        });
        $("#department").formValidator({onshow: "", onfocus: "请输入部门"}).inputValidator({
            min: 1,
            max: 80,
            onerror: "部门不能为空"
        });
        $("#location").formValidator({onshow: "", onfocus: "请输入工作地点"}).inputValidator({
            min: 1,
            max: 80,
            onerror: "工作地点不能为空"
        });
        $("#years").formValidator({onshow: "", onfocus: "请输入工作年限"}).inputValidator({
            min: 1,
            max: 80,
            onerror: "工作年限不能为空"
        });
        $("#years").formValidator({onshow: "", onfocus: "请输入工作年限"}).inputValidator({
            min: 1,
            max: 80,
            onerror: "工作年限不能为空"
        });


        $("#content").formValidator({onshow: "", onfocus: "内容不能为空"}).functionValidator({
            fun: function (val, elem) {
                var oEditor = CKEDITOR.instances.content;
                var data = oEditor.getData();
                if ($('#islink').attr('checked')) {
                    return true;
                } else if (($('#islink').attr('checked') == false) && (data == '')) {
                    return "内容不能为空";
                } else if (data == '' || $.trim(data) == '') {
                    return "内容不能为空";
                }
                return true;
            }
        });

        /*
         * 加载禁用外边链接
         */

        $('#linkurl').attr('disabled', true);
        $('#islink').attr('checked', false);
        $('.edit_content').hide();
        jQuery(document).bind('keydown', 'Alt+x', function () {
            close_window();
        });
    })
    document.title = '添加内容';
    self.moveTo(-4, -4);
    function refersh_window() {
        setcookie('refersh_time', 1);
    }
    openClose.click(
        function () {
            if (colRight.css("display") == "none") {
                setcookie('openClose', 0, 1);
                openClose.addClass("r-close");
                openClose.removeClass("r-open");
                colRight.show();
            } else {
                openClose.addClass("r-open");
                openClose.removeClass("r-close");
                colRight.hide();
                setcookie('openClose', 1, 1);
            }
        }
    )
    //-->
</script>