function showHint(item) {
if (item != "Default select") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 var msg = this.responseText;
                 document.getElementById("txtHint").innerHTML = msg;
}};
        xmlhttp.open("GET", "validroom.php?item=" + item, true);
        xmlhttp.send();
} }
