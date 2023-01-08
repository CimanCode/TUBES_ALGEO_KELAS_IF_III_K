
## 1. Untuk Menjalankan Project ini pertama harus di clone dulu source codenya dengan cara :
   - git clone (masukan url yang sudah di copy dari repository githubnya)

## 2. Setelah project berhasil di clone :
   - Buka file project di text editor masing masing
   - Buka terminal dan jalankan command (composer install)
   - Buat file .env untuk configurasi connect ke database
   ![Screenshot 2023-01-08 134322](https://user-images.githubusercontent.com/113982500/211183916-95833110-18b1-4f90-9804-844dee19f232.png)
   - Buka terminal lalu jalankan command (php artisan key:generate) untuk generate link di file .env
   - Buka Terminal dan Jalankan command (php artisan migrate:fresh) untuk migration model dan entitas ke database
   - Karena di project ini terdapat file gambar yang disimpan di storage maka harus menjalankan command (php artisan storage:link)
     agar gambar yang di upload bisa ke detek dan tersimpan di storage
    
## 3. scresnschoot dari website
   ![Screenshot 2023-01-07 143803](https://user-images.githubusercontent.com/113982500/211184002-1ad3eaab-f55f-4965-a57a-635d2990e68b.png)
   ![Screenshot 2023-01-07 143436](https://user-images.githubusercontent.com/113982500/211184009-36725354-e1de-4209-8b78-7150cf2d86f8.png)
   ![Screenshot 2023-01-07 143604](https://user-images.githubusercontent.com/113982500/211184016-df68dc76-6ee5-463c-b9ed-7dd1d4084776.png)
   
