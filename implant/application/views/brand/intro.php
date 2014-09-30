<?php
$header['page_title'] = CLang::page()->title('home');
CView::show('layout/header', $header);
?>
<style>
    body {
        background: url(<?=WEB_PATH?>/public/img/bg_brand.jpg) no-repeat center 0;
        background-size: 2000px 1000px;
    }
</style>
<body>
<div class="newscont  newscont_fix2">
    <ul class="mtab2">
        <li><a href="<?=APP_URL?>/news/brands?tag=value">品牌价值</a></li>
        <li id="mtab2_current2"><a href="<?=APP_URL?>/news/brands?tag=intro">品牌诠释</a></li>
        <li><a href="<?=APP_URL?>/news/brands?tag=vision">品牌愿景</a></li>
        <li><a href="<?=APP_URL?>/news/brands?tag=logo">图形诠释</a></li>
    </ul>
    <div class="left_title">
        <h2>品牌诠释</h2>

        <p>汇聚明天的健康！为明天的健康努力！</p>
    </div>
    <div class="middle_txt">
        <h3>明康汇：明白的好食品！</h3>
        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="brand_tb">
            <tr>
                <td style="background:#009740;">明天，明白，明悟自然。源于对自然之道的领悟，
                    对明天生活的期许，我们回归源头，破解食物的
                    密码。尊重每寸土地的生态，遵循动植物生长规
                    律。不仅提供安全美食，更向人们明白地呈现食
                    材从田园到餐桌的美味历程。
                </td>
                <td style="background:#ecc252;">健康，安康，康品人间。我们把对个体健康的
                    关怀、对社会安康的希望，融入到生态农业与
                    健康食品事业中。用心耕耘的品味，让每个家
                    庭买得放心、吃得安心、用得舒心。
                </td>
                <td style="background:#6b3f22;">汇粹，汇聚，汇融天下。汇天时、地利、人和，
                    融安全、健康、美味。我们的理想是传递自然
                    的馈赠与时光的味道，用门店向人们展现以生
                    鲜为核心的世界美食地图。
                </td>
            </tr>
        </table>

        <p>认清昨天的来处，心系明天的去向。
            明康汇，从源头做起，自建遍布全国的农业基地，用生态沃土诠释产品出身。通过全程可追溯的可视化系统，让消费者明晰每个产品的身份履历。我们承诺做到：安全看得见，美味尝得到，营养算得出。
            明康汇，用健康食品塑造幸福中国！</p>
    </div>

</div>

<?php
CView::show('layout/menu');
CView::show('layout/footer');
?>
<script type="text/javascript">
    //计算idslider2的宽度开始
    var kuan1 = 0;
    var kuand = document.getElementById('idSlider2')
    var kuan = document.getElementById('idSlider2').getElementsByTagName("li");
    var tpz = kuan.length;//图片总个数
    for (var i = 0; i < kuan.length; i++) {
        kuan1 += 300;
    }
    kuand.style.width = kuan1 + 'px';
    //计算结束

    var keVar = function (id) {
        return "string" == typeof id ? document.getElementById(id) : id;
    };

    var Class = {
        create: function () {
            return function () {
                this.initialize.apply(this, arguments);
            }
        }
    }

    Object.extend = function (destination, source) {
        for (var property in source) {
            destination[property] = source[property];
        }
        return destination;
    }

    var TransformView = Class.create();
    TransformView.prototype = {
        //容器对象,滑动对象,切换参数,切换数量
        initialize: function (container, slider, parameter, count, options) {
            if (parameter <= 0 || count <= 0) return;
            var oContainer = keVar(container), oSlider = keVar(slider), oThis = this;

            this.Index = 0;//当前索引

            this._timer = null;//定时器
            this._slider = oSlider;//滑动对象
            this._parameter = parameter;//切换参数
            this._count = count || 0;//切换数量
            this._target = 0;//目标参数

            this.SetOptions(options);

            this.Up = !!this.options.Up;
            this.Step = Math.abs(this.options.Step);
            this.Time = Math.abs(this.options.Time);
            this.Auto = !!this.options.Auto;
            this.Pause = Math.abs(this.options.Pause);
            this.onStart = this.options.onStart;
            this.onFinish = this.options.onFinish;

            oContainer.style.overflow = "hidden";
            oContainer.style.position = "relative";

            oSlider.style.position = "absolute";
            oSlider.style.top = oSlider.style.left = 0;
        },
        //设置默认属性
        SetOptions: function (options) {
            this.options = {//默认值
                Up: true,//是否向上(否则向左)
                Step: 5,//滑动变化率
                Time: 10,//滑动延时
                Auto: true,//是否自动转换
                Pause: 2000,//停顿时间(Auto为true时有效)
                onStart: function () {
                },//开始转换时执行
                onFinish: function () {
                }//完成转换时执行
            };
            Object.extend(this.options, options || {});
        },
        //开始切换设置
        Start: function () {
            if (this.Index < 0) {
                this.Index = this._count - 1;
            } else if (this.Index >= this._count) {
                this.Index = 0;
            }

            this._target = -1 * this._parameter * this.Index;
            this.onStart();
            this.Move();
        },
        //移动
        Move: function () {
            clearTimeout(this._timer);
            var oThis = this, style = this.Up ? "top" : "left", iNow = parseInt(this._slider.style[style]) || 0, iStep = this.GetStep(this._target, iNow);

            if (iStep != 0) {
                this._slider.style[style] = (iNow + iStep) + "px";
                this._timer = setTimeout(function () {
                    oThis.Move();
                }, this.Time);
            } else {
                this._slider.style[style] = this._target + "px";
                this.onFinish();
                if (this.Auto) {
                    this._timer = setTimeout(function () {
                        oThis.Index++;
                        oThis.Start();
                    }, this.Pause);
                }
            }
        },
        //获取步长
        GetStep: function (iTarget, iNow) {
            var iStep = (iTarget - iNow) / this.Step;
            if (iStep == 0) return 0;
            if (Math.abs(iStep) < 1) return (iStep > 0 ? 1 : -1);
            return iStep;
        },
        //停止
        Stop: function (iTarget, iNow) {
            clearTimeout(this._timer);
            this._slider.style[this.Up ? "top" : "left"] = this._target + "px";
        }
    };

    window.onload = function () {
        function Each(list, fun) {
            for (var i = 0, len = list.length; i < len; i++) {
                fun(list[i], i);
            }
        };

        var objs2 = keVar("idNum2").getElementsByTagName("li");
        var tv2 = new TransformView("idTransformView2", "idSlider2", 300, tpz, {
            onStart: function () {
                Each(objs2, function (o, i) {
                    o.className = tv2.Index == i ? "on" : "";
                })
            },//按钮样式
            Up: false
        });//6是轮播总数
        tv2.Start();
        Each(objs2, function (o, i) {
            o.onmouseover = function () {
                o.className = "on";
                tv2.Auto = false;
                tv2.Index = i;
                tv2.Start();
            }
            o.onmouseout = function () {
                o.className = "";
                tv2.Auto = true;
                tv2.Start();
            }
        })


    }
</script>

</body>
</html>
