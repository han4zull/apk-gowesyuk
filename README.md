# 🚴 GowesYuk

**GowesYuk** adalah aplikasi penyewaan sepeda berbasis **Laravel** yang memudahkan pengguna untuk melakukan pemesanan, penyewaan, hingga pembayaran secara online.  
Aplikasi ini ditujukan untuk mendukung **gaya hidup sehat**, **ramah lingkungan**, dan **efisien dalam bertransportasi**.

---

## 🚀 Fitur Utama

### 👥 User
- Registrasi / Daftar  
- Login / Masuk  
- Cari produk  
- Filter produk  
- Tambah produk ke keranjang  
- Meminta bantuan  
- Menyewa sepeda  
- Ubah profil  
- Menampilkan riwayat  
- Ubah email / password  
- Melihat laporan  
- Logout  

---

### 🛡️ Admin
- Login Admin  
- Beranda / Dashboard  
- Manajemen user  
- Mengelola produk  
- Manajemen & cetak penyewaan  
- Manajemen & cetak laporan  
- Logout  

---

## ⚡ Cara Install

```bash
# 1. Clone repo ini
git clone https://github.com/username/gowesyuk.git
cd gowesyuk

# 2. Install dependency
composer install

# 3. Konfigurasi environment
cp .env.example .env
php artisan key:generate

# 4. Migrasi database
php artisan migrate

# 5. Jalankan server lokal
php artisan serve
