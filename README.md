# Тестове завдання: Сторінка з слайдером

## Опис

Проєкт створює веб-сторінку із слайдером зображень, які отримуються з JSON-джерела через PHP (API: `https://picsum.photos/v2/list`).  
Парсинг JSON виконується у класі `Slider`, формування зображень — у класі `Renderer`.  
Слайдер реалізовано на чистому CSS і JavaScript.

## Структура проєкту

/index.php ← точка входу, відображення HTML
/app/Image/Renderer.php ← клас для виводу тегу <img>
/app/Image/Slider.php ← клас для парсингу JSON і генерації слайдера
/assets/style.css ← стилі слайдера
/assets/slider.js ← логіка перемикання слайдів
/composer.json ← конфігурація Composer (PSR-4 автозавантаження)
/README.md ← інструкція по запуску

bash
Копіювати код

## Встановлення та запуск

1. Клонувати репозиторій:
   ```bash
   git clone https://github.com/<твоє_ім’я_користувача>/<назва_репозиторію>.git
Перейти в папку проєкту:

bash
Копіювати код
cd <назва_репозиторію>
Встановити залежності Composer:

bash
Копіювати код
composer install
Запустити локальний PHP-сервер (наприклад, через вбудований сервер PHP):

bash
Копіювати код
php -S localhost:8000
Відкрити у браузері:

bash
Копіювати код
http://localhost:8000/index.php
Використання
PHP отримує JSON з API і парсить його.

Клас Renderer виводить зображення через HTML-теги.

Клас Slider генерує структуру слайдера.

JavaScript у slider.js забезпечує перемикання між зображеннями.

CSS у style.css відповідає за зовнішній вигляд.

Додатково
При помилках отримання JSON у лог записується повідомлення через error_log().

Код відповідає стандартам PSR-12 та принципу SRP.

HTML, CSS і JS винесені у окремі файли.

Проєкт використовує Composer для автозавантаження (PSR-4).

Завантаження на GitHub
bash
Копіювати код
git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin https://github.com/<твоє_ім’я_користувача>/<назва_репозиторію>.git
git push -u origin main
