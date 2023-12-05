document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login');

    loginForm.addEventListener('submit', function (event) {
        // event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(loginForm);

        fetch('../php/display.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const applicationMessage = document.querySelector('.ApplicationMessage');

            if (data.success) {
                applicationMessage.innerHTML = `<p class="success">${data.message}</p>`;
            } else {
                applicationMessage.innerHTML = `<p class="error">${data.message}</p>`;
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Add an event listener for the 'create' button
    const createButton = document.getElementById('button create__submit');
    createButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default button click behavior

        // Trigger the 'create' event
        const createEvent = new Event('create');
        document.dispatchEvent(createEvent);
    });

    // Listen for the 'create' event and redirect to index.html
    document.addEventListener('create', function () {
        window.location.href = '../html/create.html';
    });
});
