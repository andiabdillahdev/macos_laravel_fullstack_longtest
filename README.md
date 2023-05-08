# macos_laravel_fullstack_longtest ( Sistem perpustakaan )

## Instruksi

ini adalah project test untuk fullstack developer di PT Ahli Bangun Sistem

- Pertama, buka direktori tempat project anda, lalu buka terminal.
- Ketik perintah git clone https://github.com/andiabdillahdev/macos_laravel_fullstack_longtest.git
- Jika sudah selesai clone, akses folder projectnya lalu ketik perintah melalui terminal composer install
- buat folder .env di direktori app laravelnya
- jalankan php artisan migrate untuk meng-generate table atau import file sql yang telah saya sertakan di direktory project
- jalankan php artisan db:seed --class=UserSeeder untuk membuat akun admin
- Jalankan app laravel dengan php artisan serve.

## NOTE

aplikasi ini terdapat 2 role pengguna yaitu admin dan user. email dan password user defaultnya berdasarkan email yang di input oleh admin.
