# アプリケーション名

お問い合わせフォーム

# Dockerビルド

git@github.com:aiina-yya/otoiawase.git
docker-compose up -d --build

# Laravel環境構築
・docker-compose up -d --build
・docker-compose exec php bash
・composer install
・cp .env.example.env,環境構築を適宜変更
・php artisan key:generate
・php artisan migrate
・php artisan db:seed

#　使用技術
・mysql:8.0.26
・nginx:1.21.1


![alt text](index.drawio.png)
