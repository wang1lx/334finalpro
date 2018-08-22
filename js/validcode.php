function CodeHint() {
var code = document.getElementById("inputcode").value;
if (code != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 var msg = this.responseText;
                 document.getElementById("codeHint").innerHTML = msg;
}};
        xmlhttp.open("GET", "validcode.php?code=" + code, true);
        xmlhttp.send();
} }
