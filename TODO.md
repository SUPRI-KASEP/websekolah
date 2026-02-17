# TODO - Login ke Halaman Admin Dashboard dengan Middleware

## Progres Checklist

- [ ] 1. Update AuthController.php - Tambahkan method login() dan logout()
- [ ] 2. Update AdminController.php - Tambahkan method dashboard()
- [ ] 3. Update AuthAdmin Middleware - Tambahkan logika проверки admin
- [ ] 4. Update web.php - Tambahkan route untuk login, logout, dan admin dashboard

## Detail Langkah:

### 1. AuthController.php
- Method `login(Request $request)` - proses login dengan validasi credentials
- Method `logout(Request $request)` - logout dan redirect

### 2. AdminController.php
- Method `dashboard()` - tampilkan halaman admin dashboard

### 3. AuthAdmin Middleware
- Cek apakah user sudah login
- Cek apakah user memiliki role 'admin'
- Redirect ke login jika tidak terautentikasi

### 4. routes/web.php
- POST /login - proses login
- POST /logout - logout
- GET /admin/dashboard - halaman admin dengan middleware AuthAdmin
