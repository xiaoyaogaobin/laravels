$(function(){

    // 浏览器滚动








// 鼠标切换
    $('.php_li li').mouseenter(function(){
        var xb = $(this).index();
        $(this).stop().addClass('php_li_a').siblings().removeClass('php_li_a');
        $(this).parents('.phb_dh').siblings('.bn_jh').find('.bn_li').eq(xb).show().siblings().hide();
    })
    $('.bnlims_right_ul li').mouseenter(function(){
        var jsthis = $(this).index();
        $(this).stop().addClass('ms_right_li').siblings().removeClass('ms_right_li');

        $(this).parent('.bnlims_right_ul').siblings('.bn_li_jh').animate({'left':-jsthis*380+'px'},400);
    })
// 下面结束符，不能删除
    $('.ms_right').each(function(){
        var jsThis = $(this)[0];
        var jqThis = $(this);
        jsThis.msright = 0;
        // 定义定时器函数
        jsThis.run = function(){
            jsThis.msright ++;
//				当总管变量大于1回归零
            if(jsThis.msright >1){
                jsThis.msright =0;
            }
            // 叫图片4秒后进行渐变，进行隐藏
            jqThis.find('img').eq(jsThis.msright ).fadeIn(1000).siblings().fadeOut(1000);
            //叫下面小点进行改变
            jqThis.find('.ms_right_ul>li').eq(jsThis.msright ).addClass('ms_right_li').siblings().removeClass('ms_right_li');

        }
        // 定义定时器
        jsThis.time = setInterval(jsThis.run,2000);




    })

    // 鼠标移到小点身上显示对应图片
    $('.ms_right_ul li').mouseenter(function(){
        var jsThis = $(this).parents('.ms_right')[0]
        jsThis.msright = $(this).index();
        // 叫图片4秒后进行渐变，进行隐藏
        $(this).parent().siblings().find('img').eq(jsThis.msright ).fadeIn(1000).siblings().fadeOut(1000);
        //叫下面小点进行改变
        $(this).addClass('ms_right_li').siblings().removeClass('ms_right_li');
    })
    // 图片进行循环

    // 鼠标移到大框清楚定时器，移走回复定时器
    $('.ms_right').hover(function(){
        var jsThis = $(this)[0]
        clearInterval(jsThis.time);
    },function(){
        var jsThis = $(this)[0]
        // 定义定时器
        jsThis.time = setInterval(jsThis.run,2000);
    })

    //最下面鼠标
    var djtwog=0;
    $('.right4').click(function(){

        // 定义全局变量++
        djtwog++;
        if(djtwog>3){
            $(this).siblings('.tstj').css('left','0px');
            djtwog=1;
        }
        $(this).siblings('.tstj').animate({'left':-djtwog*1218+'px'},600)
        console.log(djtwog);
        if(djtwog==3){
            $(this).siblings('.ms_right_ul2').find('li').eq(0).addClass('ms_right_li').siblings().removeClass('ms_right_li');
        }
        $(this).siblings('.ms_right_ul2').find('li').eq(djtwog).addClass('ms_right_li').siblings().removeClass('ms_right_li');
    })
    $('.left4').click(function(){
        // 定义全局变量++
        djtwog--;

        if(djtwog<0){
            $(this).siblings('.tstj').css('left','-3654px');
            djtwog=2;
        }
        $(this).siblings('.tstj').animate({'left':-djtwog*1218+'px'},600)
        $(this).siblings('.ms_right_ul2').find('li').eq(djtwog).addClass('ms_right_li').siblings().removeClass('ms_right_li');
    })
    // 设置排行榜鼠标滑过效果
    $('.ms_right_ul2 li').mouseenter(function(){

        var xb = $(this).index();

        $(this).parents('.ms_right_ul2').siblings('.tstj').animate({'left':-xb*1218+'px'})
        $(this).addClass('ms_right_li').siblings().removeClass('ms_right_li');
    })
    // 小图片进行滑动
    $('.bnlims_right_ul_first li').mouseenter(function(){
        var bnxb = $(this).index();
        $(this).parent().siblings('.lzjx_jh').animate({'left':-bnxb*392+'px'})
        $(this).addClass('ms_right_li').siblings().removeClass('ms_right_li');
    })
    // 幻灯片进行移动
    var hdp=0;
    function run(){
        hdp++;
        if(hdp>5){
            hdp=0;
        }
        $('.ej2_img img').eq(hdp).fadeIn(1000).siblings().fadeOut(1000);
        $('.ej2_ul li').eq(hdp).addClass('ej2_li').siblings().removeClass('ej2_li');
    }
    var timer = setInterval(run,3000);
    // 清除定时器
    $('.ej2').hover(function(){
        clearInterval(timer);
    },function(){
        timer = setInterval(run,3000)
    })
    // 定时器结束

    $('.right').click(function(){
        hdp++;
        if(hdp>5){
            hdp=0;
        }
        $(this).siblings('.ej2_img').find('img').eq(hdp).stop().fadeIn(1000).siblings().fadeOut(1000);
        $('.ej2_ul li').eq(hdp).addClass('ej2_li').siblings().removeClass('ej2_li');

    })
    //点击左边效果
    $('.left').click(function(){
        hdp--;
        $(this).siblings('.ej2_img').find('img').eq(hdp).stop().fadeIn(1000).siblings().fadeOut(1000);
        $('.ej2_ul li').eq(hdp).addClass('ej2_li').siblings().removeClass('ej2_li');
    })
    // 给小点添加效果
    $('.ej2_ul li').mouseenter(function(){
        var xh = $(this).index();
        hdp = xh;
        $(this).parent('.ej2_ul').siblings('.ej2_img').find('img').eq(hdp).fadeIn(1000).siblings().fadeOut(1000);
        $(this).addClass('ej2_li').siblings().removeClass('ej2_li');
        xh =hdp;
    })
//    右边侧边栏点击效果
    $('.cbl').hover(function(){
        $(this).find('.cblc').stop().animate({'width':'790px'},400)
    },function(){
        $(this).find('.cblc').stop().animate({'width':'0px'},400)
    })

    $('#gb1').click(function(){
        $(this).parent('.cblc').animate({'width':'0px'},400)
    })
    // 点击出现效果
    $('.img_tp_jh').each(function(){
        // 获取原生js
        var Jsthis = $(this)[0];
        var jqThis = $(this);
        // 定义对象
        Jsthis.xmdjcx=0;
        Jsthis.runc = function (){
            Jsthis.xmdjcx++;
            if(Jsthis.xmdjcx>3){
                jqThis.find('.img_tp_jh_ul').css('left','0px')
                Jsthis.xmdjcx=1
            }
            if(Jsthis.xmdjcx==3){
                jqThis.find('.ms_right_ul3 li').eq(0).addClass('ms_right_li').siblings().removeClass('ms_right_li')
            }
            // 图片进行滑动
            jqThis.find('.img_tp_jh_ul').stop().animate({'left':-Jsthis.xmdjcx*378+'px'},1000);
            // 小点进行滑动
            jqThis.find('.ms_right_ul3 li').eq(Jsthis.xmdjcx).addClass('ms_right_li').siblings().removeClass('ms_right_li')
        }
        //设置定时器
        Jsthis.timer = setInterval(Jsthis.runc,3000);
    })



    // 清除定时器
    $('.img_tp_jh').hover(function(){
        var Jsthis = $(this)[0];
        clearInterval(Jsthis.timer);
    },function(){
        var Jsthis = $(this)[0];
        Jsthis.timer = setInterval(Jsthis.runc,3000);
    })
    // 点击右边效果
    $('.right5').click(function(){
        var Jsthis = $(this).parent()[0];
        Jsthis.runc();
    })
    // 点击左边边效果
    $('.left5').click(function(){
        var Jsthis = $(this).parent()[0];

        Jsthis.xmdjcx--;

        if(Jsthis.xmdjcx<0){
            Jsthis.xmdjcx=2;
            $(this).siblings('.img_tp_jh_ul').css('left','-1134px');
        }
        $(this).siblings('.img_tp_jh_ul').stop().animate({'left':-Jsthis.xmdjcx*378+'px'},1000);
        // 小点进行滑动
        $(this).siblings('.ms_right_ul3').find('li').eq(Jsthis.xmdjcx).addClass('ms_right_li').siblings().removeClass('ms_right_li')

    })
    //小点效果
    $('.ms_right_ul3 li').mouseenter(function(){
        var Jsthis = $(this).parent()[0];
        Jsthis.xmdjcx = $(this).index();
        $(this).parent('.ms_right_ul3').siblings('.img_tp_jh_ul').stop().animate({'left':-Jsthis.xmdjcx*378+'px'},1000);
        $(this).addClass('ms_right_li').siblings().removeClass('ms_right_li');

    })
    $('.ad_item li a').click(function(){
        var fuzhi = $(this).text();
        $('.ad span').html(fuzhi);
        $(this).addClass('ad_item1_a').parent('li').siblings('li').find('a').removeClass('ad_item1_a');

    })
})
