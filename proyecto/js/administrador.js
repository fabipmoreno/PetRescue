function toggleAdminLogin(switchAdmin) {
    let admin = false;
    let adminLoginForm = document.getElementById('adminLoginForm');
    let normalContainer = document.getElementsByClassName('login-container')[0];
    if (switchAdmin) {
        adminLoginForm.style.display = 'block';
        normalContainer.style.display = 'none';
    } else {
        adminLoginForm.style.display = 'none';
        normalContainer.style.display = 'block';
    }
}
