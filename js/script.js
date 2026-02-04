// Бургер-меню
document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.querySelector('.nav__toggle');
    const navList = document.querySelector('.nav__list');

    if (navToggle && navList) {
        navToggle.addEventListener('click', function() {
            navToggle.classList.toggle('active');
            navList.classList.toggle('active');
        });

        // Закрытие меню при клике на ссылку
        const navLinks = document.querySelectorAll('.nav__link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navToggle.classList.remove('active');
                navList.classList.remove('active');
            });
        });
    }

    // Простая валидация формы (заглушка)
    const contactForm = document.getElementById('mainContactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const phone = this.querySelector('#phone').value;
            if (phone.length < 10) {
                alert('Пожалуйста, введите корректный номер телефона.');
                return;
            }
            alert('Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.');
            this.reset();
        });
    }

    // Плавный скролл для якорных ссылок
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;

            if (href.startsWith('#') && document.querySelector(href)) {
                e.preventDefault();
                document.querySelector(href).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});