

## Membuat Container dan Menjalankan Aplikasi
masukkan perintah berikut untuk menjalankan dan membuat container docker
```
docker-compose up --build -d
```
## Akses Aplikasi

### Mengakses web php
Setelah container berjalan, Anda dapat mengakses aplikasi PHP melalui browser dengan membuka URL: http://localhost:8000

### Mengakses web PhpMyAdmin
Untuk mengelola database MySQL, Anda dapat mengakses phpMyAdmin melalui URL: http://localhost:8080

#### Gunakan kredensial berikut untuk login:
    servername : mysql_db
    Username   : root
    Password   : awvx0563


## Menghentikan dan Menghapus Container
Untuk menghentikan semua container yang berjalan, Anda dapat menggunakan perintah:
```
docker-compose down
```


## Screenshoot Tampilan
![Web Bioskop](https://drive.google.com/uc?id=1_Qdz-x8PYkoCDyzSY4bBr21yD8o5lkw6)

# Catatan : Program ini masih dalam perbaikan
>>>>>>> 55aed44 (Update Panduan Docker)
