document.getElementById("body").onkeyup = function(e) {
    if (e.keyCode === 13) {
        document.getElementById("form").submit();
    }
    return true;
};
