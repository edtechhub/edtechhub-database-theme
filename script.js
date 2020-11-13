// Open the full screen search box
function openSearch() {
    document.getElementById("myOverlay").style.display = "block";
    document.forms['searchform'].elements['s'].focus();
}

// Close the full screen search box
function closeSearch() {
    document.getElementById("myOverlay").style.display = "none";
}