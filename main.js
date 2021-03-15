function sendpost() {
    var hr = new XMLHttpRequest();
    var url = "sendpost.php";
    var fn = document.getElementById("postSubmitArea").value;
       var vars = "post="+fn;
    hr.open("POST", url, true);
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        document.getElementById("status").innerHTML = return_data;
    }
}
hr.send(vars);
document.getElementById("status").innerHTML = "processing...";
}