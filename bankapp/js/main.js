document.addEventListener("DOMContentLoaded", function () {
    var container = document.getElementById("accContainer");
    
    var req = new XMLHttpRequest();
    req.open('GET', '../getUsers.php', true);
    req.onload = function() {
        renderHTML(req.responseText)
    }
    req.send();

    function renderHTML(data) {
        container.insertAdjacentHTML('afterbegin', data);
    }
})

