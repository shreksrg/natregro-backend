<?php
$header['page_title'] = CLang::page()->title('home');
CView::show('layout/header', $header);
?>
<script>
    $(function () {
        var LocString = String(window.document.location.href);

        function GetQueryString(str) {
            var rs = new RegExp("(^|)" + str + "=([^\&]*)(\&|$)", "gi").exec(LocString), tmp;
            if (tmp = rs)return tmp[2];
            return "没有这个参数";
        }

        //获取参数
        // var a=GetQueryString("page");
        var a =<?=$tag?>;
        if (a == 3) {
            $(".menu_list a.list1").addClass("cur");
            $("#list1box").addClass("show");
        } else if (a == 1) {
            $(".menu_list a.list2").addClass("cur");
            $("#list2box").addClass("show");
        } else if (a == 2) {
            $(".menu_list a.list3").addClass("cur");
            $("#list3box").addClass("show");
        } else {
            $(".menu_list a.list1").addClass("cur");
            $("#list1box").addClass("show");
        }

        $("#nav li.nav2 > a").css("color", "#fff000").css("background", "#0b7d3a");
        $(".menu_list a").click(function () {
            $(".menu_list a").removeClass("cur");
            $(this).addClass("cur");
            $(".menu_cont_box").css("display", "none")
            $("#" + $(this).attr("class").substring(0, 5) + "box").css("display", "block")
            $("body").css("background", "url(<?=WEB_PATH?>/public/img/bg_" + $(this).attr("class").substring(0, 5) + "box.jpg) no-repeat right center fixed")
        });
    });
</script>
<style>
    body {
        background: url(<?=WEB_PATH?>/public/img/bg_list1box.jpg) no-repeat right center fixed;
    }
</style>
<body>
<div class="menu_list">
    <a class="list1" href="#">海亮集团</a>
    <a class="list2" href="#">健康食品</a>
    <a class="list3" href="#">生态农业</a>
    <a class="list4" href="#">社会责任</a>
</div>
<div id="list1box" class="menu_cont_box">
    <h1>海亮集团</h1>

    <div class="pic"><img src="<?=WEB_PATH?>/public/img/menu_cont_box_pic1.jpg" alt=""/></div>
    <div class="dec">
        <p>
            海亮集团创建于1989年，经过24年的发展，逐步确立了以有色金属、地产建设、农业食品、环境保护、基础教育为主体，涉足金融、物流等领域，多元并进、专业化发展的经营格局，成为拥有员工1.2万余人的综合性特大型国际化民营企业集团，旗下拥有浙江海亮股份有限公司（股票代码：002203）和四川金顶（集团)股份有限公司（股票代码：600678）等三家境内外上市公司。</p>

        <p>
            2013年集团实现营业收入1003.51亿元，总资产546.5亿元，2014年一季度实现营业收入298.15亿，综合实力位居中国企业500强第133位，中国民企500强第16位。企业先后荣获“全国文明单位”、“全国五一劳动奖状”、“全国先进基层党组织”、“全国模范劳动关系和谐企业”、“全国企业文化示范基地”等殊荣，是全国民营企业第一家“全国安康杯竞赛优胜奖”9连胜单位。</p>

        <p>日出东方，铸就辉煌。面向未来，海亮将以“铸百年卓越海亮，创国际经典品牌”的宏伟企业愿景，不断做强做大，持续创业创新。</p>

        <p>公司充满着生机活力与发展机遇，期待与您共谋发展、共创辉煌。 </p>
    </div>
    <h3>实力海亮</h3>

    <div class="dec">
        <p>
            海亮人在不懈的努力与追求中，锐意进取，开拓创新，铸造了良好的品牌形象，收获了不绝于耳的赞扬声，
            斩获了一项项令人瞩目的荣耀。 </p>
        <ul class="">
            <li>◆ 中国企业500强第133位</li>
            <li>◆ 中国民营企业500强第16位</li>
            <li>◆ 中国房地产企业100强第35位</li>
            <li>◆ 中国企业效益200佳第159位</li>
            <li>◆ 中国制造业企业500强第53位</li>
            <li>◆ 中国100大跨国公司92位</li>
            <li>◆ 中国最大的民办基础教育集团之一</li>
        </ul>
    </div>
    <h3>荣誉海亮</h3>

    <div class="dec">
        <ul class="">
            <li>◆ 全国文明单位</li>
            <li>◆ 全国五一劳动奖状</li>
            <li>◆ 全国先进基层党组织</li>
            <li>◆ 全国模范劳动关系和谐企业</li>
            <li>◆ 全国企业文化示范基地</li>
            <li>◆ 全国用户满意企业</li>
            <li>◆ 全国守合同重信用企业</li>
            <li>◆ 中国优秀诚信企业</li>
            <li>◆ 中国优秀创新型企业</li>
            <li>◆ 全国安康杯竞赛优胜企业</li>
            <li>◆ 全国质量效益型先进企业</li>

        </ul>
    </div>

</div>
<div id="list2box" class="menu_cont_box">
    <h1>明康汇健康食品集团</h1>

    <div class="dec">
        <p style="font-weight:bold; font-size:120%;">安全、健康的有机产品和服务</p>

        <p>明康汇健康食品集团，由中国民企500强第15位的海亮集团（海亮集团官网<a href="http://www.hailiang.com/" target="_blank">http://www.hailiang.com/</a>）于2012年创建，是一家集生产、加工、储运、销售为一体的现代食品集团。
        </p>

        <p>明康汇，以提供安全、健康、美味食品，提高国人生活品质为宗旨；以“全产业链经营模式、全程可追溯的信息化管理体系”为核心战略，坚持“诚于心，信于行，健康承诺”。</p>

        <p>为了强化管理，集团委托IBM、富基融通等国际知名企业对全产业链进行ERP项目建设，搭建全产业链产销协同计划体系、产品质量追溯体系、共享服务体系、智慧农业、CRM
            大数据分析等功能平台，总投入数千万，志在树立明康汇的诚信品牌，以企业的力量影响中国食品的安全与健康。
            为了履行责任，集团从源头做起，事必躬亲。明康汇苛求每个细节，全产业链经营模式、全程食品安全防控体系，只为食品更健康；明康汇在意每个眼光，全程可追溯的信息化管理体系，透明、可视的产品身份履历，让每个家庭都安心。</p>

        <p>为了践行诚信，集团自建质量、诚信曝光台，贯穿整个产业链。产品质量安全问题，内部诚信问题，明康汇自己首先曝光，并实施严格的责任问究，不让任何一个非安全健康食品流入大众餐桌。</p>

        <div class="pic"><img src="<?=WEB_PATH?>/public/img/menu_cont_box_pic_21.jpg" alt=""/></div>
    </div>
    <h3>奉献安全美味，共创品质生活</h3>

    <div class="dec">
        <p>明康汇致力于提供最高品质的产品，建立高标准的生态基地，精选非转基因优质品种，遵循最严苛的健康食品安全标准，精心为消费者呈现原汁原味的美食。
            明康汇自营产品，以安全优质生鲜为主打。为全面满足日常生活需求，涉猎了畜类、禽类、水产、豆制品、蔬菜、蛋类、粮食、水果、熟食、烘焙等十大品类。追求“很土，很纯，很新鲜”，“无毒，无害，更自然”，坚决杜绝转基因食品。</p>

        <p>明康汇优选全球名优特色美食，引进上百个国外知名品牌。按照中国食品安全标准、欧盟食品安全标准，精挑细选，原装进口。 </p>
    </div>
    <h3>独有经营模式——自建基地、自有加工、自配物流、自营终端，形成全程封闭的循环式产业链</h3>

    <div class="dec">
        <p>铸食品安全典范，创百年诚信品牌。明康汇采用全产业链经营模式，致力于向市场供应真正安全的产品，开创健康食品全产业链之先河。</p>

        <p>从选地、选种，到种植、养殖；从原料加工到物流配送，从品牌推广到食品销售，形成安全、营养、美味的食品供应全过程。每个自营产品，都由富于责任心的海亮人亲力亲为，力争每个环节都能掌控，每个细节都做到完美。</p>

        <div class="pic"><img src="<?=WEB_PATH?>/public/img/menu_cont_box_pic_22.jpg" alt=""/></div>
    </div>
    <h3>商品品质——层层把控，产品更卓越</h3>

    <div class="dec">
        <p>
            明康汇以全产品链质量管理，让产品更优质。从田园到餐桌，每个环节都严格把控。在上海金山总投资1.5亿，将建立面积约5000平米的国家级检测中心，引入先进的检测设备，通过高于国家标准的苛刻的质量标准体系对生产、加工、运输、销售等环节都进行严格的检测控制。为产品的质量安全提供强大的支撑。</p>

        <p>
            明康汇以先进的加工，让产品更美味。自建肉制品、果蔬、豆制品、烘焙等初、深加工基地，面积达13万㎡，同时还大规模引进了国外先进生产设备。目前是国内规模最大的食品加工中心之一。明康汇以洁净的包装，让产品更安全。拥有10万级洁净包装车间，包装材料无有毒有害物质，严格监控及检测包装安全性、密封性等指标。</p>

        <p>明康汇以发达的物流与冷链，让产品更新鲜。集团将建设具备国际先进水准的全程低温冷链设备，运输过程严格分级，全程冷链、无缝对接，通过城际配送、宅配等运输方式满足长三角乃至全国市场的供给需求。</p>
    </div>
    <h3>优质服务——门店销售与电子商务相结合</h3>

    <div class="dec">
        <p>明康汇健康食品的消费者，关爱家人健康，追求品质生活，对食品的安全、新鲜、美味与营养都要求甚高。我们加倍努力，让消费者与海亮的每一次沟通，都温馨、愉快。
            明康汇建设以自产生鲜为核心的中高端全国连锁超市，聘请全球知名空间设计公司Foodtech，以美国最大的天然食品超市Whole
            Foods(全食)为标杆进行门店规划设计。为消费者提供舒适的购物环境、便捷的购物方式、愉悦的购物体验。</p>

        <p>明康汇还采用O2O模式，将立足线下实体门店和全产业链核心竞争力，打造出集用户分享、品牌传导和产品销售于一体的线上电商，志在成为中国在健康食品领域最大、最好的电子商务平台。</p>
    </div>
    <h3>可追溯大数据平台——让信息更透明</h3>

    <div class="dec">
        <p>明康汇建设“全程记录、透明可视、主动公开”的可追溯的信息化管理体系，用诚意与行动获得消费者的信任。通过二维码、网站等多种方式，让消费者了解美味的诞生历程，使其买得放心，吃得安心。</p>

        <div class="pic"><img src="<?=WEB_PATH?>/public/img/menu_cont_box_pic_24.jpg" alt=""/></div>
    </div>
    <h3>宏图伟业——布局全国，决胜未来</h3>

    <div class="dec">
        <b>2014年底</b><br/>

        <p>在长三角地区开出30家门店，品牌效应初显。
            打通以中高端生鲜为特色的研发、生产、物流、销售全产业链！。</p>
        <b>2020年底</b><br/>

        <p>在长三角、珠三角、京津唐等地区建立数百家门店。
            成为中国健康食品第一品牌！</p>
        <b>2024年底</b><br/>

        <p>在全国力争建立千家门店。
            打造出中国健康食品行业千亿级航母，成为世界健康食品第一品牌。</p>
    </div>

</div>
<div id="list3box" class="menu_cont_box"
     style="background:#fff url(<?=WEB_PATH?>/public/img/menu_cont_box_pic_bg31.jpg) center bottom no-repeat;">
    <h1>海亮生态农业有限公司</h1>

    <div class="dec">
        <p style="font-weight:bold; font-size:120%;">全过程安全健康产品</p>

        <p>成立于2012年10月23日，2013年5月27日经工商管理部门批准升级为海亮生态农业集团有限公司，是一家由中国民企500强第15位的海亮集团（海亮集团官网<a
                href="http://www.hailiang.com/" target="_blank">http://www.hailiang.com/</a>）投资设立的集科研、种植、养殖、加工、仓储配送、销售为一体的生态农业全产业链企业。集团注册资本5亿元，集团总部位于浙江诸暨市店口镇。
        </p>

        <p>
            当前，环境健康和食品安全已成为中国面临的最大的社会问题之一，海亮生态农业以保护和改善生态环境，帮助农民增加收入为己任，致力于为社会公众提供安全、健康的有机产品和服务，<b>实现动植物、生态环境和人类健康的和谐统一。</b>
        </p>

        <p>
            海亮生态农业集团在国内严格甄选了适合动植物生长、繁育，环境优美的地区开展种植、养殖业务，我们将以东北、西北、华北、华东为粮油、饲料的主要种植和禽畜养殖基地，在全国特色农产品地区建立100个以上优质单品农产品基地，以及二类水质标准以上的特大型湖泊水库建立生态水产养殖基地，同时，还规划建设以旅游观光、休闲体验、会议及展示推广为主的生态农业科技示范基地和现代农业园。</p>

        <p>
            此外，我们还配套建设有机饲料、有机肥料加工厂，食品的初加工、深加工中心及大型的仓储配送中心，并建设自有的安全、健康、生态食品专卖店和电子商务平台，实现自生产、自加工、自储运、自销售的全封闭、内循环、可追溯的全过程安全健康产品质量管理。</p>
    </div>

</div>
<div id="list4box" class="menu_cont_box">
    <h1>追求社会贡献最大化</h1>

    <div class="dec">
        <p style="font-weight:bold; font-size:120%;">国家之责大于企业之利</p>

        <p>
            海亮深知“企业越大，社会责任越大”，一直努力做一个有社会责任的企业。多年来，海亮通过多种方式和途径开展慈善公益活动，从省内到省外，从国内到国外，海亮的每一次捐助，都代表中国企业向世界传达了中国的人道主义精神与责任感。</p>

        <p style="font-weight:bold; ">
            据统计，截至目前，海亮已累计为社会各类慈善公益事业捐赠达3亿多元。 </p>

        <div class="listbox_pictxt" style="margin-top:40px;">
            <img src="<?=WEB_PATH?>/public/img/menu_cont_box_pic_41.jpg" alt=""/>
            <h4>浙江海亮慈善基金会</h4>

            <p>善行天下。长期以来，海亮一直热衷慈善公益事业。2007年8月25日，经浙江省民政厅批准，浙江省首批非公募基金会——浙江海亮慈善基金会正式成立。
                截至目前，浙江海亮慈善基金会共有基金7600万元，由海亮集团独家全额捐赠。</p>
        </div>
        <div class="listbox_pictxt">
            <img src="<?=WEB_PATH?>/public/img/menu_cont_box_pic_42.jpg" alt=""/>
            <h4>救急帮困工程</h4>

            <p>多年来，海亮胸怀大爱，帮困济贫，重点救助因特发事件、重大疾病致困的人群，帮助困难群众度过生活难关，累计捐款达1000余万元；累计向汶川地震、玉树地震灾区捐款1300余万元。</p>
        </div>
        <div class="listbox_pictxt">
            <img src="<?=WEB_PATH?>/public/img/menu_cont_box_pic_43.jpg" alt=""/>
            <h4>励志助学工程</h4>

            <p>
                多年来，海亮集团关注民生、关心教育、关爱学子，1997年以来累计资助“双特”（特困、特优）学生700余人，资助金额2000余万元；2008年出资550万元捐建青川县乐安寺乡一所希望小学免费接收28名青川学生来海亮学校就读。</p>
        </div>
        <div class="/public/listbox_pictxt">
            <img src="img/menu_cont_box_pic_44.jpg" alt=""/>
            <h4>温暖关爱工程</h4>

            <p>
                多年来，海亮坚持实施温暖关爱工程，向需要帮扶的人传递温暖和关爱，出资108万赞助全国第八届残疾人运动会出资600余万元慰问当地1000多户贫困户和孤寡老人，每年向浙江省妇女儿童基金会、浙江省残疾人福利基金会捐款。</p>
        </div>
        <div class="/public/listbox_pictxt">
            <img src="img/menu_cont_box_pic_45.jpg" alt=""/>
            <h4>幸福院工程</h4>

            <p>
                回报社会，造福桑梓。海亮集团发扬尊老爱幼的中华民族优良传统，于2009年捐赠2500余万元兴建海亮幸福院。2011年9月，免费接收21名孤寡老人入住海亮幸福院。2013年，在全国范围内领养50余名孤儿到海亮幸福院生活，由海亮抚养其成年并全额资助其学成就业</p>
            。
        </div>
    </div>
</div>
<?php
CView::show('layout/menu');
CView::show('layout/footer');
?>


</body>
</html>
