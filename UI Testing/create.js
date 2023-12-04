document.addEventListener('DOMContentLoaded', function () {
    const loginButton = document.getElementById('button login__submit');

    loginButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default button click behavior

        // Redirect to Login.html
        window.location.href = 'Login.html';
    });
});
