document.getElementById("contactForm").onsubmit = function (e) {
    let email = document.querySelector('input[name="gmail"]').value.trim().toLowerCase();
    if (!email.endsWith('@gmail.com')) {
        document.getElementById('msg').textContent = 'Please use a Gmail address!(gmail.com)';
        e.preventDefault();
    }
};