$(function() {
    
    var avatars = $(".avatar");
    avatars.click(function() {
        var self = $(this);
        var menu = $("#menu");
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

    $('#manual-fine-uploader').fineUploader({
      request: {
        endpoint: 'upload'
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
    }).on('complete', function(event, id, fileName, responseJSON) {
      if (responseJSON.success) {
        $(this).append('<img src="img/success.jpg" alt="' + fileName + '">');
      }
    });
    $("form#imageUpload").submit(function(e) {
        e.preventDefault();
        var current = $(".avatar.active");
        $.ajaxFileUpload({
            url:'upload', 
            secureuri:false,
            fileElementId:'image',
            dataType: 'json',
            data: {
                which: current.attr("id")
            },
            success: function (data, status) {
                if(data.error != "") {                                                                
                    alert(data.data);
                    console.error(data.error);
                } else {
                    current.data("picture", full_path);
                    alert("cropping");
                    console.log(data.data);
                    // Refresh image list
                }
            },
            error: function (data, status, e) {
                console.log(e);
            }
        });
    });

    var ajax = $("#ajax");
        ajax.ajaxStart(function(){
            showPopup(ajax);
        })
        .ajaxComplete(function(){
            closePopup();
        });


});


