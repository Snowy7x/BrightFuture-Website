// Hide navbar on scroll
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";

    } else {
        document.getElementById("navbar").style.top = "-100px";
        if (document.getElementById("navbarTogglerDemo01").classList.contains("show")) {
            document.getElementById("navbarTogglerDemo01").classList.remove("show");
        }
    }
    prevScrollpos = currentScrollPos;
}