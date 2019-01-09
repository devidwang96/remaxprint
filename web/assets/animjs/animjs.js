var animateNodes;
var charAnimateNodes;
var mouseMoveAnimateNodes;
var scrollMotionAnimateNodes;

//class="animate"
//data-duration="1000" (s)
//data-delay="1000" (s)
//data-sensivity="5"


function animateInit(){
    animateNodes = $('.animate');
    charAnimateNodes = $('.char-animate');
    mouseMoveAnimateNodes = $('.mouse-move-animate');
    scrollMotionAnimateNodes = $('.scroll-motion-animate');
    mouseMoveAnimateNodes.each(function() {
        $(this).attr('data-offset-x', - $(this).offset().left + $(this).width() / 2);
        $(this).attr('data-offset-y', $(this).offset().top + $(this).height() / 2);
    });
    scrollMotionAnimateNodes.each(function() {
        $(this).attr('data-offset-y', $(this).offset().top);
    });
}

function animate(){
    animateNodes.each(function() {
        if(
            ($(window).scrollTop() + $(window).height()) >= $(this).offset().top
            && $(window).scrollTop() - 350 <= $(this).offset().top + $(this).height()
        ) {
            if (!$(this).hasClass('in')) {
                var _this = $(this);
                setTimeout(function() {
                    if (_this.data('duration') !== undefined) {
                        _this.css('transition', 'all '+ _this.data('duration') / 1000 +'s');
                    }
                    _this.addClass('in');
                }, _this.data('delay') !== undefined ? _this.data('delay') : 50);
            }
        } else {
            $(this).removeClass('in');
        }
    });
}
function charAnimate(){
    charAnimateNodes.each(function() {
        if(
            ($(window).scrollTop() + $(window).height()) >= $(this).offset().top
            && $(window).scrollTop() - 350 <= $(this).offset().top + $(this).height()
        ) {
            if (!$(this).hasClass('anim-active')) {
                var animText = $(this).text();
                var speed = $(this).data('speed');
                var _this = $(this);

                $(this).text('');
                Array.prototype.forEach.call(animText, function(el) {
                    if(el === ' '){
                        // _this.append('<span>&#32;</span>');
                        _this.append('<span>&#32;</span>');
                    } else {
                        _this.append('<span>' + el + '</span>');
                    }

                });

                setTimeout(function() {
                    if (_this.data('duration') !== undefined) {
                        _this.find('span').css('transition', 'all '+ _this.data('duration') / 1000 +'s');
                    }
                    _this.find('span').each(function(index) {
                        var __this = $(this);
                        setTimeout(function() {
                            __this.addClass('in');
                        }, (speed !== undefined ? speed : 50) * index);
                    });
                    _this.addClass('anim-active');
                }, _this.data('delay') !== undefined ?
                    _this.data('delay') :
                    0);
            }
        } else {
            $(this).removeClass('anim-active');
        }
    });
}
function scrollMotionAnimate(scrollTop){
    scrollMotionAnimateNodes.each(function(){
        $(this).css('transform', 'translateY('+ ((scrollTop - $(this).data('offset-y')) / $(this).data('sensivity')) +'px)');
    });
}
function mouseMoveAnimate(screenX, screenY){
    mouseMoveAnimateNodes.each(function() {
        $(this).css('transform', 'translateX('+ (screenX - $(this).data('offset-x')) / $(this).data('sensivity') +'px) translateY('+ (screenY - $(this).data('offset-y')) / $(this).data('sensivity') +'px)');
    });
}


$(document).ready(function(){
    animateInit();

    if(window.innerWidth > 1199){
        $('body').off('mousemove');
        $('body').on('mousemove', function(e) {
            mouseMoveAnimate(e.pageX, e.pageY);
        });
        $(window).off('scroll');
        $(window).on('scroll', function() {
            animate();
            charAnimate();
            scrollMotionAnimate($(window).scrollTop());
        });

        charAnimate();


    } else {
        $(window).off('scroll');
        $(window).on('scroll', function() {
            animate();
        });
    }

    animate();

});
