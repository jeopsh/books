<?php
/**
 * Custom for displaying about pages
 */

get_header(); ?>



<article class="post type-post status-publish format-standard hentry category-recommend">
    <header class="entry-header about">

        <h1 class="entry-title">关于新语</h1>

    </header><!-- .entry-header -->

    <div class="entry-content about">
        <p>“新语”一词，灵感来自《世说新语》而取其“新语”二字。说到《世说新语》，这里可不得不谈谈它。</p>
        <p>《世说新语》是魏晋南北朝时期“笔记小说”的代表作，内容大多记载东汉至东晋间的高士名流的言行风貌和轶文趣事，由南朝宋刘义庆召集门下食客共同编撰。全书分上、中、下三卷，依内容分有：“德行”、“言语”、“政事”、“文学”、“方正”、“雅量”、“识鉴”等等，共三十六类（门），每类收有若干则，全书共一千多则，每则文字长短不一，有的数行，有的三言两语，由此可见志人小说“随手而记”的特性。</p>
        <p>《世说新语》善用对照、比喻、夸张与描绘的文学技巧，不仅使它保留下许多脍炙人口的佳言名句，更为全书增添了无限光彩。如今，《世说新语》除了文学欣赏的价值外，人物事迹、文学典故等也多为后世作者所取材、引用，对后来的小说发展影响尤其大。</p>
        <p>所以，取“新语”一词，也意即回归经典，更广泛的说是回归阅读，从阅读中发现新事物。同时也可以说，“语”即“书语”，即“读书赋予新生命”之意。</p>
        <p>新语图书就是这样的一个阅读小站，提供好书资讯好文章给读者，注重读者阅读体验，致力于提供最好的阅读服务。希望新语图书小站能以此方式培养读者阅读兴趣，让我们一起爱上阅读。</p>
        <p>如果你喜欢本站，欢迎捐助本站。</p>
        <div class="donate">
            <a class="donate-button" onclick="display_donate()">立即捐助</a>
            <div class="donate-info">
                <div class="donate-content">
                    <div class="donate-close" onclick="close_donate()"></div>
                    <div class="donate-alipay">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/images/alipay.png' ?>" alt="支付宝扫码付款捐助">
                        <p>支付宝扫码付款捐助</p>
                    </div>
                    <div class="donate-wechat" >
                        <img src="<?php echo get_stylesheet_directory_uri() . '/images/wechat.png' ?>" alt="微信扫码付款捐助">
                        <p>微信扫码付款捐助</p>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- .entry-content -->

    <footer class="entry-meta">

    </footer><!-- .entry-meta -->
</article>

<?php get_footer(); ?>

<script>
    // $(document).ready(function(){
    //     $(".user-icon").hover(function() {
    //         $(".user-menu").css("display","block");
    //     }, function() {
    //         $(".user-menu").css("display","none");
    //     });
    //     $(".user-menu").hover(function() {
    //         $(this).css('display','block');
    //     }, function() {
    //         $(this).css('display','none')
    //     })
    // });

    function display_donate() {
        $(".donate-info").css("display","block");
    }

    function close_donate() {
        $(".donate-info").css("display","none");
    }

    $(document).mouseup(function (e) {
        let con = $(".donate-content");   // 设置目标区域
        if (!con.is(e.target) && con.has(e.target).length === 0) {
            $(".donate-info").css("display","none");
        }
    });

</script>

