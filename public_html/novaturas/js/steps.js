var step = 1;
$(function() {
    var avatars = $(".avatar"),
        menu = $("#menu");
        
    avatars.click(function() {
        var self = $(this);
        if(self.hasClass("active")) {
            self.removeClass("active");
            menu.hide();
        } else {
            if(self.data("picture")!==undefined) {
                menu.find(".picture").show();
            } else {
                menu.find(".picture").hide();
            }
            avatars.filter(".active").removeClass("active");
            self.addClass("active");
            menu.show().position({
                my:"center bottom",
                at:"center top",
                of:self,
                offset:"0 -15"
            });
        }
    });

    var showCropping = function(currentAvatar) {
        console.log("showing cropping for "+currentAvatar.attr("id"), currentAvatar);
        closePopup();
        var popup = $("#editPhotoPopup");
        $("#editPhotoContainer img")[0].src = currentAvatar.data("picture");
        showPopup(popup);
    };
    var uploadCallback = function(filename) {
        var current = avatars.filter(".active").data("picture", basePath + "uploads/"+filename);
        //alert("cropping\n"+current.attr('id')+"\n"+filename);
        console.log(current, current.data());
        showCropping(current);
        menu.hide();
        current.removeClass("active");
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
            var newElem = fbFriendsThumbExample.clone();
            fbFriendsImgThumbs.append(newElem);
            newElem.removeClass("hidden").removeClass("example")
                .data("id", found[j].id)
                .data("name", found[j].name);
            newElem.find("a").html(found[j].name).attr("title", found[j].name);
            newElem.find("img").attr("src", "https://graph.facebook.com/"+found[j].id+"/picture");
        }
    
        /*filtered.find("b").contents().unwrap();
        if(val.length > 0) {
                filtered.find('.name').each(function() {
                        $(this).html( highlightString($(this).text(), val) );
                });
        }*/

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
        avatars.filter(".active").removeData("picture").removeClass("active");
        menu.hide();
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
      if (responseJSON.success) {
        uploadCallback(fileName);
        //$(this).append('<img src="img/success.jpg" alt="' + fileName + '">');
      } else {
        alert($(this).data('error'));
      }
      closePopup();
    });

    
        ajax.ajaxStart(function(){
            showPopup(ajax);
        })
        .ajaxComplete(function(){
            closePopup();
        });
    $("#1st-step-done").click(function(e) {
        step = 2;
        e.preventDefault();
        $("#1st-step").hide();
        $("#2nd-step").show();
        $("header .step.active").removeClass("active").next().addClass("active");
        $(window).resize();
    });
    $("#2nd-step-done").click(function(e) {
        step = 3;
        e.preventDefault();
        $("#2nd-step").hide();
        $("#3rd-step").show();
        $("header .step.active").removeClass("active").next().addClass("active");
        $(window).resize();
    });
    $("#backTo1st").click(function(e) {
        e.preventDefault();
        if(step > 1) {
            $(".step.container").hide();
            $("#1st-step").show();
            $("header .step.active").removeClass("active")
            $(this).addClass("active");
            $(window).resize();
        }
    });
    $("#backTo2nd").click(function(e) {
        e.preventDefault();
        if(step > 2) {
            $(".step.container").hide();
            $("#2nd-step").show();
            $("header .step.active").removeClass("active")
            $(this).addClass("active");
            $(window).resize();
        }
    });
});
