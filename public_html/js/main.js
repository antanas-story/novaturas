var audio;

$(function() {
   $(window).resize();
    $("#overlay").click(function() {
        if($(".popup:visible:not(.wait-forever)").length > 0)
            closePopup();
    });
    if($(".popup.show-at-once").length>0) {
        $("#overlay").show();
    }
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // esc
            closePopup();
            
            if( $("#languageSelect").hasClass("active") )
                $("#languageSelect").click();
            
            $(".avatar.active").click();
        }
    });
    init_nav_header();
});
$(window).resize(function() {
    //fit to window
    var smallWidth = 1100,
        smallHeight = 820,
        win = $(window),
        fitElement = $("#container"),
        resizeElement = $("#main"),
        winWidth = win.width(),
        winHeight = win.height();
    if(winWidth < smallWidth || winHeight < smallHeight) fitElement.addClass("small");
    else fitElement.removeClass("small");
    
    //var goodRatio = 1.75, // 1246 / 713
    var goodRatio = 1.75, // 1169 / 66
        currentRatio = winWidth / winHeight,
        heightOffset = fitElement.height() - resizeElement.height(),
        widthOffset = 10 + fitElement.width() - resizeElement.width(),
        newW, newH;  

    if(true || currentRatio > goodRatio) {
            newH = (winHeight - heightOffset);
            newW = newH * goodRatio; 
    } else {
            newW = (winWidth - widthOffset);
            newH = newW / goodRatio;
    }

    if(newW < 860) return;
    
    resizeElement[0].style.width = newW + "px";
    resizeElement[0].style.height = newH + "px";
    resizeElement[0].style.top = ((winHeight - newH) / 2)-15 + "px";
    fitElement[0].style.width = newW + "px";
    console.log("resize", newW, newH, winWidth, winHeight);
});

function showPopup(selector) {
    var s = $(selector);
    console.log(s);
    
    if(!s.hasClass("popup")) s = s.closest("popup");
    console.log(s);
    if(s.is(":hidden")) {
        console.log(s);
        s.show();
        if(s.hasClass("with-overlay"))
            $("#overlay").show();
    }
}

function closePopup() {
    var s = $(".popup:visible");
    s.hide();
    $("#overlay").hide();
}

function init_nav_header() {
        
    $("#languageSelect").click(function() {
        var icon = $(this);
        var dropdown = $("#languageDropdown");
        if(dropdown.is(":visible")) {
            icon.removeClass("active");
            dropdown.hide();
        } else {
            icon.addClass("active");
            dropdown.show();
            dropdown.position({
               my:"center top",
               at:"center bottom",
               of:icon,
               offset:"0 14"
            });
        }
    });
    
    audio = document.getElementById("audio");//me;
    audio.volume = 0.6;
    if($.cookie("volume")!==null) {
        audio.volume = $.cookie("volume");
        $("#volumeControl .loudness").css("width", (49*audio.volume)+"px");
    }
    $("#mute").click(function() {
        var self = $(this);
        if(self.hasClass("muted")) {
            audio.play();
            audio.muted = false;
            self.removeClass("muted");
        } else {
            audio.muted = true;
            self.addClass("muted");
        }
        $.cookie("muted", (audio.muted ? "true":"false"));
    });//.click();
    if($.cookie("muted")==="true") $("#mute").click();
    else { audio.play(); }
    
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