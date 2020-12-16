document.addEventListener("click", function(event) {
    if (event.target.classList.contains("navbar-toggler-icon")) {
      document.getElementById("navbarSupportedContent").classList.toggle("show");
    } else if (event.target.classList.contains("nav-link")) {
      document.getElementById("navbarSupportedContent").classList.remove("show");
    }
  });

function mrBoss(str) {
    var request = new XMLHttpRequest();
    sessionStorage.setItem('page', str);
    request.open('POST', str, true);
    request.onload = function() {
        if (request.status >= 200 && request.status < 400) {
            var resp = request.responseText;
            document.getElementsByClassName('middle')[0].innerHTML = resp;
        }
    };
    request.send();
}

function logout() {
    var request = new XMLHttpRequest();
    request.open('POST', 'server_php/logout.php', true);
    request.onload = function() {};
    request.send();
    document.location.reload(true);
}