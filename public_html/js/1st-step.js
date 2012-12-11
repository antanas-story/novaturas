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
    $("#from-pc").click(function(e) {
        
        console.log(e);
        e.preventDefault();
        console.log($("#manual-fine-uploader .qq-upload-button input").click());
    });


    var ajax = $("#ajax");
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
    }).on('submit', function(event, id, fileName) {
        showPopup(ajax);
    }).on('complete', function(event, id, fileName, responseJSON) {
      if (responseJSON.success) {
        var current = avatars.filter(".active").data("picture", fileName);
        alert("cropping\n"+current.attr('id')+"\n"+fileName);
        console.log(fileName);
        closePopup();
        //$(this).append('<img src="img/success.jpg" alt="' + fileName + '">');
      }
    });

    
        ajax.ajaxStart(function(){
            showPopup(ajax);
        })
        .ajaxComplete(function(){
            closePopup();
        });


});


