/**
 *  $('#xxx').gallery_slider({
 *      objs:[{src:'http://xxxx.jpg','txt':'ooxxooxxooxx','title':'title',link:'http://xxx.html'},{},{}],
 *      width:528,
 *      height:285
 *  });
 */
$(function () {
    function gallery_slider(ele, opt) {
        var default_opt = {
            count:6,
            elapsed_time:3000,
            width:528,
            height:285
        };
        $.extend(opt, default_opt, opt);

        $(ele).html('<div class="slider_surround">\
            <div class="slider_wrap">\
            <div class="main_photo_slider" class="csw">\
            <div class="panelContainer">\
            </div></div></div></div>');

        $.each(opt.objs, function (i, obj) {
            $('.panelContainer', ele).append('<div class="panel" title="Panel ' + i + '"><div class="wrapper"><a href="' + obj.link + '"\
            title="' + obj.title + '"> <img src="' + obj.src + '" \
                alt="' + obj.title + '"/> </a>\
                <div class="photo_meta_data"><a \
            href="' + obj.link + '"><strong>' + obj.title + '</strong></a><br/>\
                <span>' + obj.txt + '</span></div>\
            </div></div>');
        });

        $.each(opt.objs, function (i, obj) {
            if (i == 0) {
                $('.slider_wrap', ele).append('<a href="#' + i + '" class="cross_link active_thumb cross_link_0">\
                    <img  src="' + obj.src + '" class="nav_thumb" alt="temp_thumb"/></a>\
                    <div class="movers_row"></div>');
            } else {
                $('.slider_wrap .movers_row', ele).append('<div><a href="#' + i + '" class="cross_link active_thumb">\
                    <img  src="' + obj.src + '" class="nav_thumb" alt="temp_thumb"/></a></div>');
            }
        });

        $(".slider_surround", ele).css({width:opt.width + 'px', height:opt.height + 60 + 'px'});
        $(".slider_surround .slider_wrap", ele).css({width:opt.width + 'px'});
        $(".slider_surround .panel .wrapper img", ele).css({width:opt.width + 'px', height:opt.height});
        $(".slider_surround .stripViewer", ele).css({width:opt.width + 'px'});


        var theInt = null;
        var $crosslink, $navthumb;
        var curclicked = 0;

        theInterval = function (cur) {
            clearInterval(theInt);

            if (typeof cur != 'undefined')
                curclicked = cur;

            $crosslink.removeClass("active_thumb");
            $navthumb.eq(curclicked).parent().addClass("active_thumb");
            $(".stripNav ul li a", ele).eq(curclicked).trigger('click');

            theInt = setInterval(function () {
                $crosslink.removeClass("active_thumb");
                $navthumb.eq(curclicked).parent().addClass("active_thumb");
                $(".stripNav ul li a", ele).eq(curclicked).trigger('click');
                curclicked++;
                if (opt.count == curclicked)
                    curclicked = 0;

            }, opt.elapsed_time);
        };

        $(".main_photo_slider", ele).codaSlider();

        $navthumb = $(".nav_thumb", ele);
        $crosslink = $(".cross_link", ele);

        $navthumb.click(function () {
            var $this = $(this);
            theInterval($this.parent().attr('href').slice(1));
            return false;
        });
        theInterval();
    }


    jQuery.fn.extend({
        gallery_slider:function (opt) {
            return this.each(function () {
                gallery_slider(this, opt)
            });
        }
    });
});