var form = document.querySelector('.AgeGate form');

// Klick auf Submit-Buttons abfangen
form.querySelectorAll('input[type="submit"], button[type="submit"]').forEach(function(btn) {
    btn.addEventListener('click', function () {
        if (btn.name) {
            var hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = btn.name;
            hidden.value = btn.value;
            form.appendChild(hidden);
        }
    });
});

// Form-Submit abfangen
form.addEventListener('submit', function (e) {
    e.preventDefault();

    var formData = new FormData(form);

    fetch(form.getAttribute('action'), {
        method: form.getAttribute('method'),
        body: formData
    })
        .then(function(response) { return response.text(); })
        .then(function(responseText) {
            var result = JSON.parse(responseText);

            if (result.success) {
                // jQuery fadeOut Ersatz (ohne Animation)
                document.querySelector('.AgeGate').style.display = 'none';
            } else {
                if (!result.redirect && result.message) {
                    document.querySelector('.AgeGate .content').insertAdjacentHTML('beforeend', result.message);
                } else {
                    window.location = result.redirect;
                }
            }
        });
});
