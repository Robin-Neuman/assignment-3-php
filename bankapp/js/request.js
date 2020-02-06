document.addEventListener("DOMContentLoaded", function () {
    var container = document.getElementById("accContainer");
    var accountNumber = document.getElementById("accountNumber").value;
    
    var req = new XMLHttpRequest();
    req.open('GET', '../getUsers.php', true);
    req.onload = function() {
        var response = JSON.parse(req.responseText);
        if (response.users != null || undefined) {
            renderHTML(`<ul>`)
            for (var i = 0; i < response.users.length; i++) {
                if (response.users[i].accountNumber != accountNumber) {
                    renderHTML(`<form action="/transRedirectPage.php" method="POST">
                    <li>
                        <div id="userAccounts">
                        <input value="${response.users[i].accountNumber}" name="accountNumber" hidden>
                        <p><span class="boldType">Name:</span> ${response.users[i].firstName} ${response.users[i].lastName}</p>
                        <p><span class="boldType">Account number:</span> ${response.users[i].accountNumber} <button type="submit">Make transfer</button></p>
                    </div>
                    </li>
                    </form>`);
                }                
            }         
            renderHTML(`</ul>`)   
        } else {
            renderHTML(`<h1>Could not load users</h1>`)
        }
    }
    req.send();

    function renderHTML(data) {
        container.insertAdjacentHTML('afterbegin', data);
    }
})

