function restartAnimation() {
    closePopup("#greetingPopup");
    console.log("restarting");
}

$(function() {
    $("#greetingMain").click(function() {
        showPopup("#greetingPopup");
    });
});