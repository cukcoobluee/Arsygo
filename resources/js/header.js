document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const navLogo = document.querySelector('.nav-logo'); // tulisan Arsygo

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }

    window.addEventListener("scroll", function() {
        const navbar = document.getElementById("navbar");
        const links = navbar.querySelectorAll("a.nav-link");

        if (window.scrollY > 50) {
            navbar.classList.remove("navbar-transparent");
            navbar.classList.add("navbar-solid");

            links.forEach(link => {
                // jangan ganggu link aktif
                if (!link.classList.contains("active-link")) {
                    link.classList.remove("nav-link-transparent");
                    link.classList.add("nav-link-solid");
                }
            });

            // Ubah warna teks Arsygo jadi hitam
            if (navLogo) {
                navLogo.classList.add("text-black");
                navLogo.classList.remove("text-white");
            }
        } else {
            navbar.classList.remove("navbar-solid");
            navbar.classList.add("navbar-transparent");

            links.forEach(link => {
                // jangan ganggu link aktif
                if (!link.classList.contains("active-link")) {
                    link.classList.remove("nav-link-solid");
                    link.classList.add("nav-link-transparent");
                }
            });

            // Balikin warna Arsygo jadi putih
            if (navLogo) {
                navLogo.classList.add("text-white");
                navLogo.classList.remove("text-black");
            }
        }
    });
});
