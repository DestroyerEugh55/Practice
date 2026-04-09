<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Портфолио | StudioHomeArt</title>
    <link rel="stylesheet" href="style/style.css">
    <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(m,e,t,r,i,k,a){
        m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
    })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=108460822', 'ym');

    ym(108460822, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", referrer: document.referrer, url: location.href, accurateTrackBounce:true, trackLinks:true});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/108460822" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body>
    <header class="header">
        <div class="container header__container">
            <a href="index.html" class="logo">
                <img src="images/5474501075559119392.jpg" alt="Логотип StudioHomeArt" class="logo__img">
                <span class="logo__text">StudioHomeArt</span>
            </a>
            <nav class="nav">
                <button class="nav__toggle" aria-label="Открыть меню">
                    <span></span>
                </button>
                <ul class="nav__list">
                    <li class="nav__item"><a href="index.php" class="nav__link">Главная</a></li>
                    <li class="nav__item"><a href="portfolio.php" class="nav__link nav__link--active">Портфолио</a></li>
                    <li class="nav__item"><a href="index.php#services" class="nav__link">Услуги</a></li>
                    <li class="nav__item"><a href="index.php#contacts" class="nav__link">Контакты</a></li>
                </ul>
            </nav>
            <a href="index.php#contact-form" class="btn btn--primary header__btn">Заказать звонок</a>
        </div>
    </header>

    <main class="main-inner">
        <section class="portfolio-page">
            <div class="container">
                <h1 class="page-title">Наше портфолио</h1>
                <p class="page-subtitle">Реализованные проекты за последние 3 года.</p>

                <!-- Фильтры (псевдо-работа на CSS) -->
                <div class="portfolio-filters">
                    <button class="filter-btn active" data-filter="all">Все</button>
                    <button class="filter-btn" data-filter="flat">Квартиры</button>
                    <button class="filter-btn" data-filter="house">Дома</button>
                    <button class="filter-btn" data-filter="commercial">Коммерция</button>
                </div>

                <!-- Сетка проектов -->
                <div class="portfolio-grid">
                    <!-- Проект 1 -->
                    <article class="portfolio-item" data-category="flat">
                        <a href="portfolio-item.html" class="portfolio-item__link">
                            <img src="images/img (1).jpg" alt="Современная квартира" class="portfolio-item__img">
                            <div class="portfolio-item__info">
                                <h3 class="portfolio-item__title">Современная квартира на Ленинском</h3>
                                <p class="portfolio-item__desc">Капитальный ремонт с перепланировкой в стиле contemporary. Площадь 95 м².</p>
                                <span class="portfolio-item__year">2023</span>
                            </div>
                        </a>
                    </article>
                    <!-- Проект 2 -->
                    <article class="portfolio-item" data-category="house">
                        <a href="portfolio-item.html" class="portfolio-item__link">
                            <img src="images/0cab225834d5e831d7f106f28432ee2e.jpg" alt="Дом из клееного бруса" class="portfolio-item__img">
                            <div class="portfolio-item__info">
                                <h3 class="portfolio-item__title">Дом из клееного бруса в Иркутской области</h3>
                                <p class="portfolio-item__desc">Строительство под ключ с внутренней отделкой и ландшафтным дизайном.</p>
                                <span class="portfolio-item__year">2022</span>
                            </div>
                        </a>
                    </article>
                    <!-- Проект 3 -->
                    <article class="portfolio-item" data-category="commercial">
                        <a href="portfolio-item.html" class="portfolio-item__link">
                            <img src="images/butik.jpg" alt="Бутик одежды" class="portfolio-item__img">
                            <div class="portfolio-item__info">
                                <h3 class="portfolio-item__title">Бутик одежды в ТРК</h3>
                                <p class="portfolio-item__desc">Дизайн-проект и комплексная отделка торгового пространства.</p>
                                <span class="portfolio-item__year">2023</span>
                            </div>
                        </a>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <!-- Тот же футер, что и на главной -->
            <p>© StudioHomeArt, 2026</p>
            <p><a href="index.php">Вернуться на главную</a></p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>