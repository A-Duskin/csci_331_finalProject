 function redirectToMain() {
    // Redirect to Login HTML page
    window.location.href = 'index.html';
}

function loginUser() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ApplicationMessage").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "php/login.php", true);
    var formData = new FormData(document.querySelector('form'));
    xhttp.send(formData);
    return false; // Prevents the form from submitting normally
}

function redirectToLogin() {
    // Redirect to Login HTML page
    window.location.href = 'Login.html';
}
