# Aplikasi E-commerce Fitting Co

# Nama Kelompok
1.Muhammad Bimo Adyatma Broto 3012310022
2.Muhammad Sahbilul Khoir 3012310027
3.Naufal Alam Haidar 3012310031

## Deskripsi Proyek

Fitting Co adalah aplikasi web e-commerce modern yang dibangun dengan Laravel, dirancang untuk menyediakan pengalaman berbelanja yang mulus bagi pengguna. Aplikasi ini dilengkapi dengan fitur penjelajahan produk, keranjang belanja, proses checkout, otentikasi pengguna, dan panel administrasi untuk mengelola produk, pesanan, dan konten.

## Fitur-fitur

**Untuk Pengguna:**
*   **Katalog Produk:** Jelajahi produk berdasarkan kategori dan merek.
*   **Detail Produk:** Lihat informasi detail tentang setiap produk, termasuk gambar dan ukuran.
*   **Keranjang Belanja:** Tambah, perbarui, dan hapus item dari keranjang.
*   **Proses Checkout:** Checkout aman dengan berbagai opsi pembayaran (Transfer Bank, E-wallet, COD).
*   **Otentikasi Pengguna:** Fungsionalitas daftar, masuk, dan keluar.
*   **Profil Pengguna:** Kelola informasi profil pengguna dan ubah kata sandi.
*   **Daftar Keinginan (Wishlist):** Tambahkan produk ke daftar keinginan pribadi.
*   **Blog:** Baca berita dan artikel terbaru.
*   **Formulir Kontak:** Kirim pertanyaan ke administrasi.

**Panel Admin:**
*   **Dashboard:** Gambaran umum sistem.
*   **Manajemen Produk:** Buat, baca, perbarui, dan hapus produk.
*   **Manajemen Kategori:** Kelola kategori produk.
*   **Manajemen Merek:** Kelola merek produk.
*   **Manajemen Pesanan:** Lihat dan kelola pesanan pelanggan.
*   **Manajemen Pengguna:** Kelola akun pengguna.
*   **Manajemen Blog:** Buat, baca, perbarui, dan hapus postingan blog.
*   **Manajemen Komentar:** Kelola komentar pada postingan blog.
*   **Ikhtisar Keuangan:** (Disimpulkan dari rute)

## Instalasi dan Penggunaan

Untuk mengatur dan menjalankan aplikasi Fitting Co secara lokal, ikuti langkah-langkah berikut:

### Prasyarat
*   PHP >= 8.2
*   Composer
*   Node.js & npm
*   Git

### Langkah-langkah Instalasi

1.  **Kloning repositori:**
    ```bash
    git clone <url-repositori-anda>
    cd fitting_co
    ```

2.  **Instal Dependensi PHP:**
    ```bash
    composer install
    ```

3.  **Salin File Lingkungan:**
    ```bash
    cp .env.example .env
    ```

4.  **Buat Kunci Aplikasi:**
    ```bash
    php artisan key:generate
    ```

5.  **Buat Database SQLite (jika menggunakan SQLite):**
    ```bash
    touch database/database.sqlite
    ```
    *Pastikan file `.env` Anda dikonfigurasi untuk SQLite atau database pilihan Anda.* Untuk SQLite, pastikan `DB_CONNECTION` adalah `sqlite` dan variabel `DB_` lainnya dikomentari.

6.  **Jalankan Migrasi dan Seeder:**
    ```bash
    php artisan migrate --seed
    ```
    Ini akan menyiapkan tabel database Anda dan mengisinya dengan data awal (misalnya, pengguna admin, contoh produk).

7.  **Tautkan Penyimpanan (Storage):**
    ```bash
    php artisan storage:link
    ```
    Ini membuat tautan simbolis untuk penyimpanan publik, penting untuk menampilkan gambar yang diunggah.

8.  **Instal Dependensi Node.js:**
    ```bash
    npm install
    ```

9.  **Kompilasi Aset:**
    ```bash
    npm run dev
    ```
    Untuk produksi, gunakan `npm run build`.

10. **Mulai Server Pengembangan:**
    ```bash
    php artisan serve
    ```

    Aplikasi akan dapat diakses di `http://127.0.0.1:8000` (atau alamat yang ditampilkan di terminal Anda).

### Akses Admin

Setelah seeding, Anda seharusnya memiliki pengguna admin. Anda dapat menemukan kredensial admin default di `database/seeders/UserSeeder.php` atau membuatnya secara manual.

## Struktur Rute

Berikut adalah daftar rute utama yang tersedia di aplikasi:

```
GET|HEAD        / .......................... home › HomeController@index
GET|HEAD        about ............................................ about
GET|HEAD        admin/blog ................. admin.blog.index › Admin\BlogController@index
POST            admin/blog ................. admin.blog.store › Admin\BlogController@store
GET|HEAD        admin/blog/create .......... admin.blog.create › Admin\BlogController@create
GET|HEAD        admin/blog/{blog} .......... admin.blog.show › Admin\BlogController@show
PUT|PATCH       admin/blog/{blog} .......... admin.blog.update › Admin\BlogController@update
DELETE          admin/blog/{blog} .......... admin.blog.destroy › Admin\BlogController@destroy
GET|HEAD        admin/blog/{blog}/edit ..... admin.blog.edit › Admin\BlogController@edit
GET|HEAD        admin/brands ............... admin.brands.index › Admin\BrandController@index
POST            admin/brands ............... admin.brands.store › Admin\BrandController@store
GET|HEAD        admin/brands/create ........ admin.brands.create › Admin\BrandController@create
GET|HEAD        admin/brands/{brand} ....... admin.brands.show › Admin\BrandController@show
PUT|PATCH       admin/brands/{brand} ....... admin.brands.update › Admin\BrandController@update
DELETE          admin/brands/{brand} ....... admin.brands.destroy › Admin\BrandController@destroy
GET|HEAD        admin/brands/{brand}/edit .. admin.brands.edit › Admin\BrandController@edit
GET|HEAD        admin/categories ........... admin.categories.index › Admin\CategoryController@index
POST            admin/categories ........... admin.categories.store › Admin\CategoryController@store
GET|HEAD        admin/categories/create .... admin.categories.create › Admin\CategoryController@create
GET|HEAD        admin/categories/{category}  admin.categories.show › Admin\CategoryController@show
PUT|PATCH       admin/categories/{category}  admin.categories.update › Admin\CategoryController@update
DELETE          admin/categories/{category}  admin.categories.destroy › Admin\CategoryController@destroy
GET|HEAD        admin/categories/{category}/edit admin.categories.edit › Admin\CategoryController@edit
GET|HEAD        admin/comments ............. admin.comments.index › Admin\CommentController@index
POST            admin/comments ............. admin.comments.store › Admin\CommentController@store
GET|HEAD        admin/comments/create ...... admin.comments.create › Admin\CommentController@create
GET|HEAD        admin/comments/{comment} ... admin.comments.show › Admin\CommentController@show
PUT|PATCH       admin/comments/{comment} ... admin.comments.update › Admin\CommentController@update
DELETE          admin/comments/{comment} ... admin.comments.destroy › Admin\CommentController@destroy
GET|HEAD        admin/comments/{comment}/edit admin.comments.edit › Admin\CommentController@edit
GET|HEAD        admin/dashboard ............ admin.dashboard › Admin\DashboardController@index
GET|HEAD        admin/finance .............. admin.finance.index › Admin\FinanceController@index
POST            admin/finance .............. admin.finance.store › Admin\FinanceController@store
GET|HEAD        admin/finance/create ....... admin.finance.create › Admin\FinanceController@create
GET|HEAD        admin/finance/{finance} .... admin.finance.show › Admin\FinanceController@show
PUT|PATCH       admin/finance/{finance} .... admin.finance.update › Admin\FinanceController@update
DELETE          admin/finance/{finance} .... admin.finance.destroy › Admin\FinanceController@destroy
GET|HEAD        admin/finance/{finance}/edit admin.finance.edit › Admin\FinanceController@edit
GET|HEAD        admin/orders ............... admin.orders.index › Admin\OrderController@index
POST            admin/orders ............... admin.orders.store › Admin\OrderController@store
GET|HEAD        admin/orders/create ........ admin.orders.create › Admin\OrderController@create
GET|HEAD        admin/orders/{order} ....... admin.orders.show › Admin\OrderController@show
PUT|PATCH       admin/orders/{order} ....... admin.orders.update › Admin\OrderController@update
DELETE          admin/orders/{order} ....... admin.orders.destroy › Admin\OrderController@destroy
GET|HEAD        admin/orders/{order}/edit .. admin.orders.edit › Admin\OrderController@edit
GET|HEAD        admin/product-sizes ........ admin.product-sizes.index › Admin\ProductSizeController@index
GET|HEAD        admin/product-sizes/{product_size} admin.product-sizes.show › Admin\ProductSizeController@show
PUT|PATCH       admin/product-sizes/{product_size} admin.product-sizes.update › Admin\ProductSizeController@update
GET|HEAD        admin/product-sizes/{product_size}/edit admin.product-sizes.edit › Admin\ProductSizeController@edit
GET|HEAD        admin/products ............. admin.products.index › Admin\ProductController@index
POST            admin/products ............. admin.products.store › Admin\ProductController@store
GET|HEAD        admin/products/create ...... admin.products.create › Admin\ProductController@create
GET|HEAD        admin/products/{product} ... admin.products.show › Admin\ProductController@show
PUT|PATCH       admin/products/{product} ... admin.products.update › Admin\ProductController@update
DELETE          admin/products/{product} ... admin.products.destroy › Admin\ProductController@destroy
GET|HEAD        admin/products/{product}/edit admin.products.edit › Admin\ProductController@edit
GET|HEAD        admin/users ................ admin.users.index › Admin\UserController@index
POST            admin/users ................ admin.users.store › Admin\UserController@store
GET|HEAD        admin/users/create ......... admin.users.create › Admin\UserController@create
GET|HEAD        admin/users/summary ........ admin.users.summary › Admin\UserController@summary
GET|HEAD        admin/users/{user} ......... admin.users.show › Admin\UserController@show
PUT|PATCH       admin/users/{user} ......... admin.users.update › Admin\UserController@update
DELETE          admin/users/{user} ......... admin.users.destroy › Admin\UserController@destroy
GET|HEAD        admin/users/{user}/edit .... admin.users.edit › Admin\UserController@edit
GET|HEAD        admin/users/{user}/orders .. admin.users.orders › Admin\UserController@orders
GET|HEAD        best-sellers ............... best.sellers › BestSellerController@index
POST            cart/add/{product} ......... cart.add › CartController@add
DELETE          cart/remove/{product} ...... cart.remove › CartController@remove
POST            cart/update/{product} ...... cart.update › CartController@update
GET|HEAD        checkout ................... checkout › CheckoutController@index
POST            checkout ................... checkout.process › CheckoutController@process
GET|HEAD        contact .................... contact › ContactController@index
POST            contact .................... contact.submit › ContactController@submit
GET|HEAD        login ...................... login › AuthController@showLoginForm
POST            login ...................... AuthController@login
POST            logout ..................... logout › AuthController@logout
GET|HEAD        order-details/{orderId} .... order.details › OrderController@showOrderDetails
GET|HEAD        payment/bank-transfer/{orderId} payment.bank_transfer
GET|HEAD        payment/cod/{orderId} ...... payment.cod
GET|HEAD        payment/e-wallet/{orderId} . payment.e_wallet
GET|HEAD        posts ...................... blog.index › BlogController@index
GET|HEAD        posts/{post} ............... blog.show › BlogController@show
POST            posts/{post}/comments ...... comments.store › CommentController@store
GET|HEAD        product-explanation/{product} product.explain › ProductController@explain
GET|HEAD        profile .................... profile › ProfileController@show
POST            profile/password ........... profile.password.update › ProfileController@updatePassword
GET|HEAD        register ................... register › AuthController@showRegistrationForm
POST            register ................... AuthController@register
GET|HEAD        shop ....................... shop.index › ShopController@index
GET|HEAD        shopping-cart .............. shopping.cart › CartController@index
GET|HEAD        storage/{path} ............. storage.local
GET|HEAD        up .....................................................
GET|HEAD        wishlist ................... wishlist.index › WishlistController@index
POST            wishlist/{product} ......... wishlist.toggle › WishlistController@toggleWishlist
```
