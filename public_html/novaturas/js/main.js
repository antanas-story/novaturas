var audio, basePath;

$(function() {
    basePath = $("#basePath").val();
    var winResize = function() {
        //Make avatars square
        var avatars = $(".avatar:visible");
        if(avatars.length > 0) {
            avatars.css("height", avatars.first().width()+"px");
        }

        var minWidth = 860,
            fitElement = $("#container").first(),
            resizeElement = fitElement.find(".main:visible"),
            win = $(window),
            winHeight = win.height(),
            goodRatio = 1.75, // 1246 / 713
            heightOffset = fitElement.outerHeight() - resizeElement.innerHeight(),
            //widthOffset = fitElement.outerWidth() - resizeElement.width(),
            newW, newH;

        newH = winHeight - heightOffset;
        newW = goodRatio * newH;
        /*if() {

        }
        if( currentRatio > goodRatio) {
                newH = (winHeight - heightOffset);
                newW = newH * goodRatio; 
        } else {
                newW = (winWidth - widthOffset);
                newH = newW / goodRatio;
        }*/

        if(newW < minWidth) {
            fitElement.center();
            return;
        }


        resizeElement[0].style.width = newW + "px";
        resizeElement[0].style.height = newH + "px";
        //resizeElement[0].style.top = ((winHeight - newH) / 2)-15 + "px";
        //fitElement[0].style.width = newW + "px";
        fitElement.center();
        //fitElement[0].style["margin-left"] = - Math.ceil(newW/2) + "px";
        //console.log("resize", newW, newH, winWidth, winHeight);
    }
    $(window).resize(winResize).resize().resize();
    
    // binding overlay functions
    $("#overlay").click(function() {
        if($(".popup:visible:not(.wait-forever)").length > 0)
            closePopup();
    });
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // esc
            closePopup();
            
            if( $("#languageSelect").hasClass("active") )
                $("#languageSelect").click();
            
            $(".avatar.active").click();
        }
    });
    /*if($(".popup.show-at-once").length>0) {
        $("#overlay").show();
    }*/
    init_nav_header();
    showPopup(".show-at-once");
});

function showPopup(selector) {
    var s = $(selector);
    
    if(!s.hasClass("popup")) s = s.closest("popup");
    if(s.is(":hidden")) {
        s.center(true);
        s.show();
        if(s.hasClass("with-overlay"))
            $("#overlay").show().addClass(s.attr("id"));
    }
}

function closePopup(selector) {
    var overlay = $("#overlay");
    if(selector!==undefined) {
        var id = $(selector).hide().attr("id");
        overlay.removeClass(id);
    } else {
        $(".popup:visible:not(.permanent)").each(function() {
            $(this).hide();
            overlay.removeClass($(this).attr("id"));
        });
    }
    if($(".popup:visible:not(.permanent)").length <= 0)
        $("#overlay").hide();
}

function init_nav_header() {
        
    var langMouseOutTimeout;
    var langIcon = $("#languageSelect");
    var langDropdown = $("#languageDropdown");
    var langTimeout = function() {
	langMouseOutTimeout = setTimeout(function() {
	    langDropdown.slideUp(300);
	    langIcon.removeClass("active");
	}, 1000);
    };
    langIcon.hover(function() {
	clearTimeout(langMouseOutTimeout);
        if(langDropdown.is(":visible")) {
            /*langIcon.removeClass("active");
            langDropdown.hide();*/
        } else {
            langIcon.addClass("active");
            langDropdown.show();
            langDropdown.position({
               my:"center top",
               at:"center bottom",
               of:langIcon,
               offset:"0 14"
            });
        }
    }, langTimeout);
    langDropdown.hover(function() {
	clearTimeout(langMouseOutTimeout);
    }, langTimeout);
    
    audio = document.getElementById("audio");//me;
    audio.volume = 0.6;
    if($.cookie("volume")!==null) {
        audio.volume = $.cookie("volume");
        $("#volumeControl .loudness").css("width", (49*audio.volume)+"px");
    }
    $("#mute").click(function() {
        var self = $(this);
        if(self.hasClass("muted")) {
            if(!$.browser.msie) audio.play();
            audio.muted = false;
            self.removeClass("muted");
        } else {
            audio.muted = true;
            self.addClass("muted");
        }
        $.cookie("muted", (audio.muted ? "true":"false"));
    });//.click();
    if($.cookie("muted")==="true") $("#mute").click();
    else { if(!$.browser.msie) audio.play(); }
    
    $("#volumeControl").click(function(e) {
        $(this).find(".loudness").css("width", e.offsetX+"px");
        audio.volume = Math.ceil(100*e.offsetX / $(this).width())/100;
        $.cookie("volume", audio.volume);
        console.log(audio.volume);
        e.preventDefault();
        
    });
    
    $("#faqIcon").click(function() {
        console.log("yo");
        showPopup("#faqPopup");
    });
}