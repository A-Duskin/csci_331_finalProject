document.addEventListener('DOMContentLoaded', function () {
    const loginButton = document.getElementById('button login__submit');

    loginButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default button click behavior

        // Redirect to Login.html
        window.location.href = '../html/Login.html';
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const versionButton = document.getElementById('button version__select');

    versionButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default button click behavior

        // Redirect to index.html
        window.location.href = '../../index.html';
    });
});
