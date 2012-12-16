var step=1,
    avatars,
    menu,
    canvasContainer;
$(function() {
    avatars = $(".avatar");
    menu = $("#menu");
    canvasContainer = $("#canvasContainer");
    
    initCropping();
    
    avatars.click(function() {
        var self = $(this);
        var canvasHover = $("#hover-"+this.id);
        if(self.hasClass("active")) {
            canvasHover.removeClass("active");
            self.removeClass("active");
            menu.fadeOut(300);
        } else {
            if(self.data("picture")!==undefined) {
                menu.find(".picture").show();
            } else {
                menu.find(".picture").hide();
            }
            avatars.filter(".active").removeClass("active");
            canvasContainer.find(".active").removeClass("active");
            self.addClass("active");
            canvasHover.addClass("active");
            menu.show().position({
                my:"center bottom",
                at:"center top",
                of:self,
                offset:"0 -15"
            }).hide().fadeIn(500);
        }
    }).mouseenter(function() {
        $("#hover-"+this.id).addClass("hover");
    }).mouseleave(function() {
        $("#hover-"+this.id).removeClass("hover");
    });
        
    $(".avatar-hover").mouseenter(function() {
        $("#"+this.id.substr(6)).addClass("hover");
    }).mouseleave(function() {
        $("#"+this.id.substr(6)).removeClass("hover");
    }).click(function() {
        var avatar = $("#"+this.id.substr(6));
        avatar.click();
        if(avatar.data("picture")!==undefined) {
            $("#from-pc").click();
        }
    });

    $("#chooseAnotherPic").click(function(e) {
        e.preventDefault();
        closePopup();
        var pic = $("#editPhotoPopup").data("current").data("picture");
        console.log(pic);
        if(pic.indexOf(basePath) >= 0) {
            $("#from-pc").click();
        } else $("#from-fb").click();
    });
    var uploadCallback = function(filename) {
        var current = avatars.filter(".active").data("picture", basePath + "uploads/"+filename);
        //alert("cropping\n"+current.attr('id')+"\n"+filename);
        console.log(current, current.data());
        showCropping(current);
    };

    $("#from-pc").click(function(e) {
        $("#manual-fine-uploader .qq-upload-button input").click();
        e.preventDefault();
    });

    var fbPermissions = false,
        fbFriends,
        fbFriendsImgThumbs = $("#imgThumbs"),
        fbImgThumbs = $("#imgFbThumbs"),
        fbImgSlider = $("#slider");
        fbFriendsThumbExample = fbFriendsImgThumbs.find(".example");
    var showFBPopup = function(str) {
        $("#fbPictureSelector").hide();
        $("#fbFriendSelector").show();
        showPopup("#ajax");
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me/friends', function(response) {
            fbFriends = response.data;
            showPopup("#fbPopup");
            closePopup("#ajax");
            console.log("/me/friends", response);
        });
    };
    $("#friend_field").keyup(function(e) {
        var chars = $(this).val().toLowerCase(),
            i = 0,
            found = new Array();
        fbFriendsImgThumbs.find("figure:not(.example)").remove();
        if(chars.length == 0) return;
            
        $.each(fbFriends, function(index, val) {
            if(val.name.toLowerCase().indexOf(chars) != -1) {
                found.push(val);
                i++;
                if(i >= 8) return false;
            }
        });
    
        
        if(i == 0) return;
        for(var j = 0; j < found.length; j++) {
            var newElem = fbFriendsThumbExample.clone(),
                id = found[j].id,
                name = found[j].name;
            fbFriendsImgThumbs.append(newElem);
            newElem.removeClass("hidden").removeClass("example")
                .data("id", id)
                .data("name", name);
            newElem.find("a").html( highlightString(chars, found[j].name) ).attr("title", name);
            newElem.find("img").attr("src", "https://graph.facebook.com/"+found[j].id+"/picture");
        }
    

    });
    fbFriendsImgThumbs.on("click", "figure", function(e) {
        e.preventDefault();
        var self = $(this);
        if(self.hasClass("selected")) {
            self.removeClass("selected");
        } else {
            fbFriendsImgThumbs.find(".selected").removeClass("selected");
            self.addClass("selected");
        }
        console.log("friend selected", self.data("id"), self.data("name"));
    });
    $("#fbNextStep").click(function(e) {
        // proceed to selecting pictures
        var selected = fbFriendsImgThumbs.find(".selected");
        if(selected.length <= 0) {
            alert($(this).data("error"));
        } else {
            showPopup("#ajax");
            FB.api("/"+selected.data("id")+"/photos", function(response) {
                var fbPics = response.data;
                if(fbPics === undefined || fbPics.length <= 0) {
                    var err = $("#fbFriendSelector .error").slideDown(300);
                    setTimeout(function() {
                        err.slideUp(300);
                    }, 6000);
                } else {
                    closePopup("#ajax");
                    $("#fbFriendSelector").hide();
                    $("#fbPictureSelector").show();
                    var friend = $("#selectedFriend"),
                        example = fbImgThumbs.find(".example");
                    fbImgThumbs.find("#slider figure").remove();
                    
                    for(var i = 0; i < fbPics.length; i++) {
                        var clone = example.clone();
                        clone.removeClass("hidden")
                            .removeClass("example")
                            .attr("title", fbPics[i].name)
                            .data("src", fbPics[i].source)
                            .css('background-image', 'url(' + fbPics[i].source + ')');
                        fbImgSlider.append(clone);
                    }
                    friend.find("img").attr("src", selected.find("img").attr("src"));
                    friend.find("span").html(selected.data("name"));
                }
                console.log("friend's photos response", response);
            });
        }
        e.preventDefault();
    });
    fbImgSlider.on("click", "figure", function(e) {
        e.preventDefault();
        var self = $(this);
        // TOOD Padaryt sekimą kiek draugų iš fb ateina pamatę save pagamintam atviruke.
        if(self.hasClass("selected")) {
            self.removeClass("selected");
        } else {
            fbImgSlider.find(".selected").removeClass("selected");
            self.addClass("selected");
        }
    });
    $("#fbPrevStep").click(function(e) {
        // back to selecting friends
        e.preventDefault();
        $("#friend_field").val("").keyup();
        $("#fbFriendSelector").show();
        $("#fbPictureSelector").hide();
    });
    $("#fbPicChosen").click(function(e) {
        e.preventDefault();
        // proceed to selecting pictures
        var selected = fbImgSlider.find(".selected");
        if(selected.length <= 0) {
            alert($(this).data("error"));
        } else {
            // pic chosen
            var currentAvatar = avatars.filter(".active");
            currentAvatar.data("picture", selected.data("src"));
            showCropping(currentAvatar);
        }
        
    });
        
    
    var showFBError = function() {
        alert($("#fbPopup").data("error"));
    }
    var fbLogin = function() {
        FB.login(function(response) {
            if (response.authResponse) {
                console.log("fb login response", response)
                FB.api('/me/permissions', function (response) {
                    console.log("/me/permissions", response);
                    if(response.data[0].friends_photos === undefined) {
                        // logged in but no permissions
                        showFBError();
                    } else {
                        fbPermissions = true;
                        // logged in with permissions
                        showFBPopup("logged in with permissions");
                    }
                } );
            } else {
                // not logged in
                showFBError();
            }
        }, {scope: 'friends_photos'});
    };
    $("#from-fb").click(function(e) {
        e.preventDefault();
        if(fbPermissions) {
            showFBPopup("was already logged in with permissions");
        } else {
            fbLogin();
        }
    });
    $("#edit-pic").click(function(e) {
        e.preventDefault();
        showCropping(avatars.filter(".active"));
    });
    $("#delete-pic").click(function(e) {
        e.preventDefault();
        var active = avatars.filter(".active");
        active.removeData("picture").click();
        active.find("img").hide();
        active.find(".default-face").show();
        
    });

    


    var ajax = $("#ajax");
        var fineUploader = $('#manual-fine-uploader');
        
    fineUploader.fineUploader({
      request: {
        endpoint: fineUploader.data("url")
      },
      multiple: false,
      validation: {
        allowedExtensions: ['jpeg', 'jpg', 'gif', 'png'],
        sizeLimit: 100* 51200 // 100 * 50 kB = 50 * 1024 bytes
      },
      text: {
        uploadButton: '<i class="icon-plus icon-white"></i> Select Files'
      },
      //text: {
      //  uploadButton: 'Click or Drop'
      //},
      autoUpload: true,
      debug: true
    }).on('submit', function(event, id, fileName) {
        showPopup(ajax);
    }).on('complete', function(event, id, fileName, responseJSON) {
      closePopup();
      if (responseJSON.success) {
        uploadCallback(fileName);
        //$(this).append('<img src="img/success.jpg" alt="' + fileName + '">');
      } else {
        alert($(this).data('error'));
      }
    });
        ajax.ajaxStart(function(){
            showPopup(ajax);
        })
        .ajaxComplete(function(){
            closePopup(ajax);
        });
    
    $("header").on("click", "a.active", function(e) {
        e.preventDefault();
        showStep($(this).data("step"));
    });
    $("#1st-step-done").click(function(e) {
        step = 2;
        e.preventDefault();
        showStep("2nd");
    });
    $("#2nd-step-review").click(function(e) {
        e.preventDefault();
        showStep("1st");
    });
    $("#2nd-step-done").click(function(e) {
        step = 3;
        e.preventDefault();
        
        var form = $("#greetingEdit form");
        $.post(basePath + "update", form.serialize(), function(response) {
            console.log("updated", response);
        });
        form.serialize();
            
        showStep("3rd");
    });
    var emailPopup = $("#emailPopup");
    emailPopup.find("button").click(function(e) {
        e.preventDefault();
        var sentBy = emailPopup.find("#sentBy").val(),
            sentTo = emailPopup.find("#sentTo").val();
        if(sentBy.length <= 0) {
            alert(emailPopup.find("#sentBy").data("error"));
            return;
        } else if(!validateEmail(sentTo)) {
            alert(emailPopup.find("#sentTo").data("error"));
            return;
        }
        var form = emailPopup.find("form");
        
        $.post(
            basePath + "send-email",
            form.serialize(),
            function(response) {
                if(response == '1') {
                    form.slideUp(500);
                    emailPopup.find(".success").slideDown(500);
                } else {
                    form.slideUp(500)
                    emailPopup.find(".error").slideDown(500);
                }
                console.log("email", response);
                setTimeout(function() {
                    closePopup(emailPopup);
                    form.show().find(".email").val("");
                    emailPopup.find(".msg").hide();
                }, 2000);
            }
        );
    });
    
});

function showCropping(currentAvatar) {
    console.log("showing cropping for "+currentAvatar.attr("id"), currentAvatar);
    closePopup();

    var popup = $("#editPhotoPopup");
    var img = $("#editPhotoContainer img");
    img[0].src = currentAvatar.data("picture");
    img.data("deg", 0);
    img.data("scale", 1);
    img.css({
        transform:'',
        left:'',
        top:''
    });
    popup.find(".point").css({ left:'' })
    
    showPopup(popup);
}
function initCropping() {
    var setTransform = function(elem, degree, scale) {
        var cos = Math.cos(degToRad(-degree)),
            sin = Math.sin(degToRad(-degree));
        /*elem.style["zoom"] = scale;*/
        elem.style["filter"] =
                "progid:DXImageTransform.Microsoft.Matrix(sizingMethod='auto expand',"+
                "M11="+cos+", M12=-"+sin+", M21="+sin+", M22="+cos+")"; /* IE6,IE7 */
        elem.style["-ms-filter"] = elem.style["filter"]; /* IE8 */
        elem.style["-moz-transform"] = "rotate("+degree+"deg) scale("+scale+")";  /* FF3.5/3.6 */
        elem.style["-o-transform"] = "rotate("+degree+"deg) scale("+scale+")";  /* Opera 10.5 */
        elem.style["-webkit-transform"] = "rotate("+degree+"deg) scale("+scale+")";  /* Saf3.1+ */
        elem.style["transform"] = "rotate("+degree+"deg) scale("+scale+")";  /* Newer browsers (incl IE9) */
    }
    
    var cropper = $("#editPhotoPopup");
    var $image = cropper.find("#editPhotoContainer img");
    var image = $image[0];
    $image.data("deg", 0);
    $image.data("scale", 1);
    var sliders = cropper.find(".slider");
    sliders.click(function(e) {
        var point = $(this).find(".point");
        point.css("left", e.offsetX - (point.width()/2));
        this.update(e.offsetX);
    });
    sliders.filter(".zoom")[0].update =  function(left) {
        var scale = (30+left)/180;
        $image.data("scale", scale)
        setTransform(image, $image.data("deg"), scale);
    };
    sliders.filter(".rotate")[0].update = function(left) {
        deg = (left-150)*1.2;
        $image.data("deg", deg);
        setTransform(image, deg, $image.data("scale"));
    };

    var dragOpts = {
        axis: "x",
        containment: "parent",
        drag: function( event, ui ) {
            var slider = $(this).parent();
            var func = slider[0].update;
            func(ui.position.left);
        }
    };
    cropper.find( ".point" ).draggable(dragOpts);
    
    $image.draggable({
        cursor:"move"
    });
    cropper.find("#cropButton").click(function(e) {
         e.preventDefault();
            
         var active = avatars.filter(".active"),
            img = active.find("img"),
            left = parseInt($image.css("left")) - 172,
            top = parseInt($image.css("top")) - 127,
            src = active.data("picture"),
            deg = $image.data("deg"),
            scale = $image.data("scale");
         
         active.find(".default-face").hide();
         img[0].src = src;
         img.css({
             transform:$image.css("transform"),
             left: left+"px",
             top: top+"px"
         }).show();
     
         spawnCroppedFace(active, src, left, top, scale, deg);
         
         closePopup();
         active.click();
    });
}

function spawnCroppedFace(active, src, left, top, scale, deg) {
    var canvas = $("#cropped-"+active[0].id);
    var img = new Image();
        img.src = src;
    
    var ctx = canvas[0].getContext("2d");
    ctx.clearRect(0, 0, canvas[0].width, canvas[0].height);
    ctx.save();
    ctx.beginPath();
    ctx.moveTo(106, 58.5);
    ctx.bezierCurveTo(106, 90.5, 84.6, 116, 58.0, 116);
    ctx.bezierCurveTo(31.4, 116, 9.8, 90.5, 9.8, 58.5);
    ctx.bezierCurveTo(9.8, 26.5, 31.4, 0, 58.0, 0);
    ctx.bezierCurveTo(84.6, 0, 106.2, 26.5, 106.2, 58.5);
    ctx.closePath();
    ctx.clip();
    
    ctx.rotate(degToRad(deg));
    ctx.scale(scale, scale);
    ctx.drawImage(img, left, top);
    
    ctx.restore();
    canvas.show();
}

function showStep(step) {
    $(".step.container").hide();
    $("#"+step+"-step").show();
    $("header a.step."+step).addClass("active").attr("href","#");
    $(window).resize();            
}
function highlightString(needle, haystack) {
     var regex = new RegExp('(' + needle+ ')', 'gi');
     return haystack.replace(regex, "<b>$1</b>");
}
function validateEmail(email) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
    if( email!=undefined && email!="" && emailPattern.test(email) ) {
        return true;
    } else {
        return false;
    }
}
function degToRad (d) {
    return (d * (Math.PI / 180));
}       