document.addEventListener('DOMContentLoaded', function () {
    const loginButton = document.getElementById('button secure');

    loginButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default button click behavior

        // Redirect to Secure create.html
        window.location.href = './Secure/html/create.html';
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const loginButton = document.getElementById('button unsecure');

    loginButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default button click behavior

        
        //Redirect to Unsecure Create.html
        alert("Currently Unavailable");
    });
});
