function restartAnimation() {
    closePopup("#greetingPopup");
    console.log("restarting");
}

$(function() {
    $("#main").click(function() {
        showPopup("#greetingPopup");
    });
});