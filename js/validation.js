function showHint() {
var email = document.getElementById("inputEmail").value;
var pwd = document.getElementById("inputPassword").value;  
if (pwd != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 var msg = this.responseText;
                 document.getElementById("txtHint").innerHTML = msg;
}};
        xmlhttp.open("GET", "getinfo.php?email=" + email+"&pwd="+pwd, true);
        xmlhttp.send();
} }
