document.addEventListener('DOMContentLoaded', function() {
    // Mengambil semua elemen anchor di dalam elemen dengan kelas 'user-list'
    const userLinks = document.querySelectorAll('.user-list a');

    // Menambahkan event listener untuk setiap anchor
    userLinks.forEach(function(userLink) {
        userLink.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah tindakan default dari anchor
            
            // Mendapatkan nama pengguna dari teks di dalam elemen span dengan kelas 'details'
            const username = userLink.querySelector('.details span').innerText;

            // Redirect ke halaman chat.php dengan parameter 'user' yang berisi nama pengguna
            window.location.href = 'chat.php?user=' + encodeURIComponent(username);
        });
    });
});
