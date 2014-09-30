<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="addbg">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <title></title>
    <link href="/statics/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="/statics/css/zh-cn-system.css" rel="stylesheet" type="text/css"/>
    <link href="/statics/css/table_form.css" rel="stylesheet" type="text/css"/>
    <link href="/statics/css/dialog.css" rel="stylesheet" type="text/css"/>
    <script language="javascript" type="text/javascript" src="/statics/js/dialog.js"></script>
    <link rel="stylesheet" type="text/css" href="/statics/css/style/zh-cn-styles1.css" title="styles1" media="screen"/>
    <link rel="alternate stylesheet" type="text/css" href="/statics/css/style/zh-cn-styles2.css" title="styles2"
          media="screen"/>
    <link rel="alternate stylesheet" type="text/css" href="/statics/css/style/zh-cn-styles3.css" title="styles3"
          media="screen"/>
    <link rel="alternate stylesheet" type="text/css" href="/statics/css/style/zh-cn-styles4.css" title="styles4"
          media="screen"/>
    <script language="javascript" type="text/javascript" src="/statics/js/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="/statics/js/admin_common.js"></script>
    <script language="javascript" type="text/javascript" src="/statics/js/styleswitch.js"></script>
    <script language="javascript" type="text/javascript" src="/statics/js/formvalidator.js" charset="UTF-8"></script>
    <script language="javascript" type="text/javascript" src="/statics/js/formvalidatorregex.js"
            charset="UTF-8"></script>
    <script type="text/javascript">
        window.focus();
        var pc_hash = 'Lyr5kg';
        window.onload = function () {
            var html_a = document.getElementsByTagName('a');
            var num = html_a.length;
            for (var i = 0; i < num; i++) {
                var href = html_a[i].href;
                if (href && href.indexOf('javascript:') == -1) {
                    if (href.indexOf('?') != -1) {
                        html_a[i].href = href + '&pc_hash=' + pc_hash;
                    } else {
                        html_a[i].href = href + '?pc_hash=' + pc_hash;
                    }
                }
            }

            var html_form = document.forms;
            var num = html_form.length;
            for (var i = 0; i < num; i++) {
                var newNode = document.createElement("input");
                newNode.name = 'pc_hash';
                newNode.type = 'hidden';
                newNode.value = pc_hash;
                html_form[i].appendChild(newNode);
            }
        }
    </script>
</head>
<body>
<style type="text/css">
    html {
        _overflow-y: scroll
    }
</style>
<script type="text/javascript">
    <!--
    var charset = 'utf-8';
    var uploadurl = '/uploadfile/';
    //-->
</script>
<script language="javascript" type="text/javascript" src="/statics/js/content_addtop.js"></script>
<script language="javascript" type="text/javascript" src="/statics/js/colorpicker.js"></script>
<script language="javascript" type="text/javascript" src="/statics/js/hotkeys.js"></script>
<script language="javascript" type="text/javascript" src="/statics/js/cookie.js"></script>
<script type="text/javascript">var catid = 4</script>
<form name="myform" id="myform" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $job['id'] ?>"/>

<div class="addContent">
<div class="crumbs">当前位置：内容 > 内容发布管理 > 添加内容</div>
<div class="col-right" style="display: none">
    <div class="col-1">
        <div class="content pad-6">
            <h6> 缩略图</h6>

            <div class='upload-pic img-wrap'><input type='hidden' name='info[thumb]' id='thumb' value=''>
                <a href='javascript:void(0);'
                   onclick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,0','content','4','d82d328b0ac53c2731ce14fc33c48b5b');return false;">
                    <img src='/statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113'
                         style='cursor:hand'/></a><input type="button" style="width: 66px;" class="button"
                                                         onclick="crop_cut_thumb($('#thumb').val());return false;"
                                                         value="裁切图片"><input type="button" style="width: 66px;"
                                                                             class="button"
                                                                             onclick="$('#thumb_preview').attr('src','/statics/images/icon/upload-pic.png');$('#thumb').val(' ');return false;"
                                                                             value="取消图片">
                <script type="text/javascript">function crop_cut_thumb(id) {
                        if (id == '') {
                            alert('请先上传缩略图');
                            return false;
                        }
                        window.top.art.dialog({
                            title: '裁切图片',
                            id: 'crop',
                            iframe: 'index.php?m=content&c=content&a=public_crop&module=content&catid=' + catid + '&picurl=' + encodeURIComponent(id) + '&input=thumb&preview=thumb_preview',
                            width: '680px',
                            height: '480px'
                        }, function () {
                            var d = window.top.art.dialog({id: 'crop'}).data.iframe;
                            d.uploadfile();
                            return false;
                        }, function () {
                            window.top.art.dialog({id: 'crop'}).close()
                        });
                    }
                    ;</script>
            </div>
            <h6> 相关组图</h6>
            <input type='hidden' name='info[relation]' id='relation' value='' style='50'>
            <ul class="list-dot" id="relation_text"></ul>
            <div>
                <input type='button' value="添加相关"
                       onclick="omnipotent('selectid','?m=content&c=content&a=public_relationlist&modelid=3','添加相关文章',1)"
                       class="button" style="width:66px;">
<span class="edit_content">
<input type='button' value="显示已有" onclick="show_relation(3,0)" class="button" style="width:66px;">
</span>
            </div>
            <h6> 发布时间</h6>
            <link rel="stylesheet" type="text/css" href="/statics/js/calendar/jscal2.css"/>
            <link rel="stylesheet" type="text/css" href="/statics/js/calendar/border-radius.css"/>
            <link rel="stylesheet" type="text/css" href="/statics/js/calendar/win2k.css"/>
            <script type="text/javascript" src="/statics/js/calendar/calendar.js"></script>
            <script type="text/javascript" src="/statics/js/calendar/lang/en.js"></script>
            <input type="text" name="info[inputtime]" id="inputtime" value="2014-09-28 18:32:43" size="21"
                   class="date" readonly>&nbsp;
            <script type="text/javascript">
                Calendar.setup({
                    weekNumbers: true,
                    inputField: "inputtime",
                    trigger: "inputtime",
                    dateFormat: "%Y-%m-%d %H:%M:%S",
                    showTime: true,
                    minuteStep: 1,
                    onSelect: function () {
                        this.hide();
                    }
                });
            </script>
            <h6> 转向链接</h6>
            <input type="hidden" name="info[islink]" value="0"><input type="text" name="linkurl" id="linkurl"
                                                                      value="" size="25" maxlength="255"
                                                                      disabled class="input-text"> <input
                name="info[islink]" type="checkbox" id="islink" value="1" onclick="ruselinkurl();"> <font
                color="red">转向链接</font>
            <h6> 内容页模板</h6>
            <select name="info[template]" id="template">
                <option value='' selected>请选择</option>
                <option value="show">show.html</option>
                <option value="show_cxbg_yjfk">诚信曝光-意见反馈(show_cxbg_yjfk.html)</option>
                <option value="show_download">show_download.html</option>
                <option value="show_mksjfs_app">明康汇社交方式-APP(show_mksjfs_app.html)</option>
                <option value="show_mksjfs_wx">明康汇社交方式-微信(show_mksjfs_wx.html)</option>
                <option value="show_picture">show_picture.html</option>
                <option value="show_video">show_video.html</option>
                <option value="show_videolist">show_videolist.html</option>
            </select>
            <h6> 允许评论</h6>
            <label class="ib" style="width:88px"><input type="radio" name='info[allow_comment]'
                                                        id="allow_comment_1" checked value="1">
                允许评论</label><label class="ib" style="width:88px"><input type="radio" name='info[allow_comment]'
                                                                        id="allow_comment_0" value="0">
                不允许评论</label>
            <h6> 阅读收费</h6>
            <input type="text" name="info[readpoint]" value="" size="5"><input type="radio" name="info[paytype]"
                                                                               value="0" checked> 点 <input
                type="radio" name="info[paytype]" value="1">元
            <h6>状态</h6>
                    <span class="ib" style="width:90px"><label><input type="radio" name="status" value="99" checked/> 发布
                        </label></span>
        </div>
    </div>
</div>
<a title="展开与关闭" class="r-close" hidefocus="hidefocus" style="outline-style: none; outline-width: medium;"
   id="RopenClose" href="javascript:;"><span class="hidden">展开</span></a>


<div class="col-auto" >
    <div class="col-1">
        <div class="content pad-6">
            <table width="100%" cellspacing="0" class="table_form">
                <tbody>
                <tr>
                    <th width="80"><font color="red">*</font> 栏目</th>
                    <td><input type="hidden" name="info[catid]" value="4">招贤纳士 <a href='javascript:;'
                                                                                  onclick="omnipotent('selectid','?m=content&c=content&a=add_othors&siteid=1','同时发布到其他栏目',1);return false;"
                                                                                  style='color:#B5BFBB'>[同时发布到其他栏目]</a>
                        <ul class='list-dot-othors' id='add_othors_text'></ul>
                    </td>
                </tr>
                <tr>
                    <th width="80"><font color="red">*</font> 职位名称</th>
                    <td><input id="title" type="text" style="width:400px;" name="position"
                               value="<?= $job['position'] ?>"
                               style="color:" class="measure-input">
                    </td>
                </tr>
                <tr>
                    <th width="80"><font color="red">*</font> 学历</th>
                    <td><select name="edu" vo="<?= $job['edu'] ?>">
                            <?php
                            $jobLang = CLang::load('job');
                            $edu = $jobLang['edu'];
                            foreach ($edu as $key => $item) {
                                echo '<option value="' . $key . '">' . $item . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="80"><font color="red">*</font> 招聘部门</th>
                    <td><input id="department" type='text' name='department' value='<?= $job['department'] ?>'
                               style='width:280px'
                               class='input-text'>
                    </td>
                </tr>
                <tr>
                    <th width="80"><font color="red">*</font>工作地点</th>
                    <td><input id="location" type='text' name='location' value='<?= $job['location'] ?>'
                               style='width: 400px;'
                               class='input-text'></td>
                </tr>
                <tr>
                    <th width="80"><font color="red">*</font> 招聘人数</th>
                    <td><input type='text' name='num' value='<?= $job['num'] ?>' style='width: 400px;'
                               class='input-text'></td>
                </tr>

                <tr>
                    <th width="80"><font color="red">*</font> 工作年限</th>
                    <td><input id="years" type='text' name='years' value='<?= $job['years'] ?>' style='width: 400px;'
                               class='input-text'></td>
                </tr>

                <tr>
                    <th width="80"><font color="red">*</font> 招聘内容</th>
                    <td>
                        <div id='content_tip'></div>
                        <textarea name="desc" id="content" boxid="content"><?= $job['desc'] ?></textarea>
                        <script type="text/javascript" src="/statics/js/ckeditor/ckeditor.js"></script>
                        <script type="text/javascript">
                            CKEDITOR.replace('content', {
                                height: 300,
                                pages: false,
                                subtitle: false,
                                textareaid: 'content',
                                module: 'content',
                                catid: '4',
                                flashupload: true,
                                alowuploadexts: '',
                                allowbrowser: '1',
                                allowuploadnum: '10',
                                authkey: '8bcf31d26689f30c389b6496ba323a67',
                                filebrowserUploadUrl: '/index.php?m=attachment&c=attachments&a=upload&module=content&catid=4&dosubmit=1',
                                toolbar: [
                                    ['Source', '-', 'Templates'],
                                    ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Print'],
                                    ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'], ['ShowBlocks'], ['Image', 'Capture', 'Flash', 'MyVideo'], ['Maximize'],
                                    '/',
                                    ['Bold', 'Italic', 'Underline', 'Strike', '-'],
                                    ['Subscript', 'Superscript', '-'],
                                    ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
                                    ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                                    ['Link', 'Unlink', 'Anchor'],
                                    ['Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
                                    '/',
                                    ['Styles', 'Format', 'Font', 'FontSize'],
                                    ['TextColor', 'BGColor'],

                                ]
                            });
                        </script>
                        <div class='editor_bottom'>
                            <script type="text/javascript" src="/statics/js/swfupload/swf2ckeditor.js"></script>
                            <div id='page_title_div'>
                                <table cellpadding='0' cellspacing='1' border='0'>
                                    <tr>
                                        <td class='title'>子标题<span id='msg_page_title_value'></span></td>
                                        <td>
                                            <a class='close' href='javascript:;'
                                               onclick='javascript:$("#page_title_div").hide();'><span>×</span></a>
                                        </td>
                                    <tr>
                                        <td colspan='2'><input name='page_title_value' id='page_title_value'
                                                               class='input-text' value=''
                                                               size='30'>&nbsp;<input type='button'
                                                                                      class='button' value='提交'
                                                                                      onclick=insert_page_title("content",1)>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </td>
                </tr>


                <tr>
                    <th width="80"> 招聘类型</th>
                    <td><select name="type" vo="<?= $job['type'] ?>">
                            <option value="0">社会招聘</option>
                            <option value="1">校园招聘</option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <th width="80"> 发布状态</th>
                    <td><select name="status" vo="<?= $job['status'] ?>">
                            <option value="1">发布</option>
                            <option value="0">关闭</option>
                        </select>
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
        <div class="button"><input value="保存后自动关闭" type="submit" name="dosubmit" class="cu" style="width:145px;"
                                   onclick="refersh_window()"></div>
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