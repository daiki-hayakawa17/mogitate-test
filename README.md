<h1>mogitate</h1>
<div>
<h2>Dockerビルド</h2>
  <p>1.git clone git@github.com:coachtech-material/laravel-docker-template.git</p>
  <p>2.mv laravel-docker-template mogitate-test</p>
  <p>3.cd mogitate-test</p>
  <p>4.git remote set-url origin daiki-hayakawa17/mogitate-test.git</p>
  <p>5.git add .</p>
  <p>6.git commit -m "リモートリポジトリの変更"</p>
  <p>7.git push origin main</p>
  <p>8.docker-compose up -d --build</p>
</div>
<div>
  <h2>laravel環境構築</h2>
  <p>1.docker-compose exec php bash</p>
  <p>2.composer install</p>
  <p>3.composer require livewire/livewire</p>
  <p>4.php artisan key:generate</p>
  <p>5.php artisan migrate</p>
  <p>6.php artisan db:seed</p>
</div>
<h1>使用技術</h1>
<div>
  <p>・nginx:1.12.1</p>
  <p>・php:7.4.9</p>
  <p>・mysql:8.0.26</p>
</div>
<h2>ER図</h2>
<img src="/src/mogitate.drawio.png">
<h2>URL</h2>
<p>・開発環境:http://localhost/</p>
<p>・phpMyAdmin:http//localhost/8080</p>
