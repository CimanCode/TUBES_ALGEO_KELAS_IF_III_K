1. Untuk Menjalankan Project ini pertama harus di clone dulu source codenya dengan cara :
   -git clone (masukan url yang sudah di copy dari repository githubnya)

2. Setelah project berhasil di clone :
   -Buka file project di text editor masing masing
   -Buka terminal dan jalankan command (composer install)
   -Buat file .env untuk configurasi connect ke database
   -Buka terminal lalu jalankan command (php artisan key:generate) untuk generate link di file .env
   -Karena di project ini terdapat file gambar yang disimpan di storage maka harus menjalankan command (php artisan storage:link)
    agar gambar yang di upload bisa ke detek dan tersimpan di storage
    
