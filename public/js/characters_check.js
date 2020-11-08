function checkLength(which) {
    var maxChars = 255;
    if (which.value.length > maxChars)
        which.value = which.value.substring(0,maxChars);
    var curr = maxChars - which.value.length;
    document.getElementById("chLeft").innerHTML = curr.toString();
}