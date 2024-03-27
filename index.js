// Ambil elemen input password dan ikon mata
const passwordInput = document.getElementById('password');
const togglePassword = document.getElementById('togglePassword');

// Tambahkan event listener untuk mengubah jenis input saat ikon mata diklik
togglePassword.addEventListener('click', function() {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    // Ubah ikon mata sesuai dengan jenis input
    this.classList.toggle('fa-eye-slash');
});
// TOGGLE CHATBOX
const popup = document.querySelector('.pop-up')
const Message = document.querySelector('.wrapper')

popup.addEventListener('click', function () {
	Message.classList.toggle('show')
});