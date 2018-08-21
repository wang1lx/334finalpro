function eshowHint() {
var email = document.getElementById("inputEmail").value;  
if (email != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 var msg = this.responseText;
                 document.getElementById("repeat").innerHTML = msg;
}};
        xmlhttp.open("GET", "validemail.php?email=" + email, true);
        xmlhttp.send();
} }
