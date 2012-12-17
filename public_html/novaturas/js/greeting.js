function restartAnimation() {
    closePopup("#greetingPopup");
    console.log("restarting");
}

$(function() {
    $("#greetingMain").click(function() {
        showPopup("#greetingPopup");
    });
    initCanvas();
});

function initCanvas() {
    var greetingMain = $("#greetingMain"),
	canvas = $("#canvas"),
	ctx = canvas[0].getContext("2d");

    greetingMain.find("img").each(function() {
	var self = $(this),
	    img = new Image();
	img.onload = function() {
	    var scale =  scale = self.data("scale") / this.width;
	    ctx.save();
	    ctx.translate(self.data("x"), self.data("y"))
	    ctx.scale(scale, scale);
	    ctx.drawImage(img, 0,0);
	    ctx.restore();
	};
	img.src = this.src;
    });
	
}