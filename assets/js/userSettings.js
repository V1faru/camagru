function mrSmallBoss(str) {
    var request = new XMLHttpRequest();
    sessionStorage.setItem('page', str);
    request.open('POST', str, true);
    request.onload = function() {
        if (request.status >= 200 && request.status < 400) {
            var resp = request.responseText;
            document.getElementsByClassName('edit-forms')[0].innerHTML = resp;
            var elem = document.getElementById("ele");
            elem.scrollIntoView();
        }
    };
    request.send();
}