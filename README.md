## +1 CMS - Система управления контентом на базе Yii-framework. Сборка "Интернет-магазин" ##
### Инструкция ###
#### Установка через консоль ####
* Склонировать репозиторий командой **git clone git@github.com:plus1dev/cms-m.git**, либо **git clone https://github.com/plus1dev/cms-m.git**
* Перейти в папку проекта, по умолчанию *cms-m*
* Выполнить команду **composer install** (Притянет yii-framework, создаст файл для локальной конфигурации, расставит права записи на папки *protected/runtime*, *www/assets*, *www/upload/**, распакует дефолтные картинки проекта)
* Ввести доступы к БД: либо командой **php protected/yiic install local --rewrite=1 --host=hostname --dbname=dbname --username=username --password=password** , либо руками в файле */protected/config/local.php*
* Выполнить команду **php protected/yiic install db** (Создаст структуру и данные в БД)
* Административная панель находится по ссылке */manage*. Логин **admin**, пароль **admin**.
