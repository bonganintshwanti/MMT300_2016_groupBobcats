function detectPage() {
    if ($("div#main-content div").hasClass('detect-home')) {
        $("a.on-home").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-about')) {
        $("a.on-about").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-mission')) {
        $("a.on-sub").css('color','#b1b1b1');
        $("a.on-mission").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-vision')) {
        $("a.on-sub").css('color','#b1b1b1');
        $("a.on-vision").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-history')) {
        $("a.on-sub").css('color','#b1b1b1');
        $("a.on-history").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-needs')) {
        $("a.on-needs").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-services')) {
        $("a.on-services").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-gallery')) {
        $("a.on-gallery").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-newsletter')) {
        $("a.on-newsletter").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-contact')) {
        $("a.on-contact").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-register')) {
        $("a.on-register").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-login')) {
        $("a.on-login").css('color','#b1b1b1');
    } else if ($("div#main-content div").hasClass('detect-donate')) {
        $("button.on-donate").css('color','#b1b1b1');
    } 
}

$(document).ready(function() {
    var currentImg;
    
    detectPage();
    
    $("a#hamburger").on("click", function() {
        $("nav#mobile-menu").toggleClass('toggle-menu');
        $("body").toggleClass('freeze-body');
    });
    
    $("img.gallery-img,img#gallery-img1").on("click", function() {      
        currentImg = this.id;
        
        if ($(window).width() > 990) {
            var elem = $("img#gallery-img1");
            var offset = elem.offset();

            $(this).addClass('enlarge-gallery-img');
            if ($(this).hasClass('last-row')) {
                $(this).offset({ top: offset.top, left: offset.left-8});
                $(this).removeClass('last-row');      
            } else {
                $(this).offset({ top: offset.top, left: offset.left});
            }

            $(this).next('p').show();
            $(this).next('p').addClass('enlarge-gallery-img');
            $(this).next('p').offset({ top: offset.top+$(this).height(), left: offset.left});
            
            $("button#gallery-close-btn,button#gallery-prev-btn,button#gallery-next-btn").show();
            if ($(window).width() > 1199) {
                $("footer").css('margin-top','160px');
            }
        }
    });
    
    $("button#gallery-prev-btn,button#gallery-next-btn").on("click", function() {
        var index = currentImg.substr(11,2);
        var name = currentImg.substr(0,11);
        
        if (index.substr(1,1) === "") {
            index = currentImg.substr(11,1);
        }
        
        if (this.id === 'gallery-prev-btn') {
            index = parseInt(index) - 1;
            var newImg = name + index;
            if (index === 0) {
                newImg = 'gallery-img12';
            }
        } else {
            index = parseInt(index) + 1;
            var newImg = name + index;
            if (index === 13) {
                newImg = 'gallery-img1';
            }
        }
                
        var elem = $("img#gallery-img1");
        var offset = elem.offset();

        $("img#"+currentImg).removeClass('enlarge-gallery-img');
        $("p.gallery-pgraph").hide();

        $("img#"+newImg).addClass('enlarge-gallery-img');
        if ($("img#"+newImg).hasClass('last-row')) {
            $("img#"+newImg).offset({ top: offset.top, left: offset.left-8});
            $("img#"+newImg).removeClass('last-row');
        } else {
            $("img#"+newImg).offset({ top: offset.top, left: offset.left});
        }

        $("img#"+newImg).next('p').show();
        $("img#"+newImg).next('p').addClass('enlarge-gallery-img');
        $("img#"+newImg).next('p').offset({ top: offset.top+$("img#"+newImg).height(), left: offset.left});
        
        currentImg = newImg;
    });
    
    $("button#gallery-close-btn").on("click", function() {
        $("button#gallery-close-btn,button#gallery-prev-btn,button#gallery-next-btn,p.gallery-pgraph").hide();
        
        $("img#gallery-img1").removeClass('enlarge-gallery-img');
        
        $("img.gallery-img").each(function(){
            $(this).removeClass('enlarge-gallery-img');
        });
        $("footer").css('margin-top','120px');
    });
    
    window.addEventListener("resize", function() {
        var width = $(window).innerWidth();
        var height = $(window).innerHeight();
    
	if (width < height) {
            $("p.gallery-pgraph").show();
        }
    }, false);
    
    $("input,textarea").focus(function(){
        $("form#contact-form ul,form#login-form ul,form#register-form ul").css("display", "none");
    });
    
});