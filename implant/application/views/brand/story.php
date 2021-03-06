<?php
$header['page_title'] = CLang::page()->title('home');
CView::show('layout/header', $header);
?>

<body>
<div id="heath_travel_wrapper">
    <div id="heath_travel_page">
        <div class="page1">
            <div class="cutline"></div>
            <div class="y_menu"><li><a href="#">我们的果园基地都只建立在无重金属污染的土地上</a></li></div>
        </div>
        <div class="page2">
            <div class="cutline"></div>
            <div class="y_title"><p>从土地<span>未被污染</span>的种植园采购最优质的石榴树苗并栽入基地</p></div>
        </div>
        <div class="page3">
            <div class="cutline"></div>
            <div class="y_menu"><li><a href="#">我们的果园基地都只建立在无重金属污染的土地上</a></li></div>
        </div>
        <div class="page4">
            <div class="cutline"></div>
            <div class="y_menu"><li><a href="#">我们的果园基地都只建立在无重金属污染的土地上</a></li></div>
        </div>
        <div class="page5">
            <div class="cutline"></div>
            <div class="y_menu"></div>
            <div class="y_title"><p>采摘前我们会仔细地<span>逐个检查</span>果实的外观及成熟度</p></div>
        </div>
        <div class="page6">
            <div class="cutline"></div>
            <div class="y_menu"><li><a href="#">我们的果园基地都只建立在无重金属污染的土地上</a></li></div>
        </div>
        <div class="page7">
            <div class="cutline"></div>
            <div class="y_title"><p>每一棵石榴在包装销售前都需通过专业筛选师<span>最严格的质检</span></p></div>
        </div>
        <div class="page8">
            <div class="cutline"></div>
            <div class="y_menu"><li><a href="#">我们的果园基地都只建立在无重金属污染的土地上</a></li></div>
        </div>
        <div class="page9">
            <div class="cutline"></div>
            <div class="y_title"><p>您可以线上下单，<br />并<span>灵活选择</span>送货上门的时间</p></div>
        </div>
        <div class="page10">
            <div class="cutline"></div>
            <div class="y_title"><p>您也可以去各门店的货架上<span>亲自挑选</span>这就是一棵石榴在明康汇的全产业链故事~</p></div>
        </div>
    </div>
</div>
<div class="stepbar">
    <a class="step_icon1 cur" href="#">基地建设</a>
    <a class="step_icon2" href="#">作物成长</a>
    <a class="step_icon3" href="#">果实采摘</a>
    <a class="step_icon4" href="#">包装运输</a>
    <a class="step_icon5" href="#">门店配送</a>
</div>
<?php
CView::show('layout/menu');
CView::show('layout/footer');
?>


<script language="javascript" type="text/javascript">
    var apDiv1 = document.getElementById("heath_travel_wrapper");
    var perWidth = apDiv1.clientWidth / 2;

    var mouse_wheel = function(e){
        var evt = window.event || e;
        if(evt.detail > 0 || evt.wheelDelta < 0)
            apDiv1.scrollLeft += perWidth;
        else
            apDiv1.scrollLeft -= perWidth;
    }

    if(window.addEventListener){
        apDiv1.addEventListener("DOMMouseScroll", mouse_wheel, false);
    }else
        apDiv1.onmousewheel = mouse_wheel;

    $("#heath_travel_wrapper").scroll(function () {
        var scrolled = $(this).scrollLeft();
        if(scrolled >= apDiv1.clientWidth * 0 && scrolled < apDiv1.clientWidth * 2){
            $(".stepbar a").removeClass("cur");
            $(".stepbar a.step_icon1").addClass("cur");
        }else if(scrolled >= apDiv1.clientWidth * 2 && scrolled < apDiv1.clientWidth * 4){
            $(".stepbar a").removeClass("cur");
            $(".stepbar a.step_icon2").addClass("cur");
        }else if(scrolled >= apDiv1.clientWidth * 4 && scrolled < apDiv1.clientWidth * 6){
            $(".stepbar a").removeClass("cur");
            $(".stepbar a.step_icon3").addClass("cur");
        }else if(scrolled >= apDiv1.clientWidth * 6 && scrolled < apDiv1.clientWidth * 8){
            $(".stepbar a").removeClass("cur");
            $(".stepbar a.step_icon4").addClass("cur");
        }else if(scrolled >= apDiv1.clientWidth * 8 && scrolled < apDiv1.clientWidth * 10){
            $(".stepbar a").removeClass("cur");
            $(".stepbar a.step_icon5").addClass("cur");
        }
    });

    $(function(){
        //$(".stepbar a").click(function(){
        //	$(".stepbar a").removeClass("cur");
        //	$(this).addClass("cur");
        //});

        $(".stepbar a.step_icon1").click(function(){
            $("#heath_travel_wrapper").animate({scrollLeft:apDiv1.clientWidth * 0},'slow');
        });
        $(".stepbar a.step_icon2").click(function(){
            $("#heath_travel_wrapper").animate({scrollLeft:apDiv1.clientWidth * 2},'slow');
        });
        $(".stepbar a.step_icon3").click(function(){
            $("#heath_travel_wrapper").animate({scrollLeft:apDiv1.clientWidth * 4},'slow');
        });
        $(".stepbar a.step_icon4").click(function(){
            $("#heath_travel_wrapper").animate({scrollLeft:apDiv1.clientWidth * 6},'slow');
        });
        $(".stepbar a.step_icon5").click(function(){
            $("#heath_travel_wrapper").animate({scrollLeft:apDiv1.clientWidth * 8},'slow');
        });
    });
</script>

<script>

</script>

</body>
</html>
