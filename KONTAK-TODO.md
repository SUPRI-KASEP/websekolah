# Kontak Index Page Completion - Progress Tracker

## Information Gathered:
- View `kontak/index.blade.php` already exists with premium design (hero, map, info cards, form)
- Form points to `kontak.kirim` (missing)
- KontakController.php empty
- No /kontak route
- Pesan model/migration exists (nama, pesan, email nullable) - perfect match, whatsapp optional → ignore or add later
- PesanController exists for public pesan page/form

## Plan:
1. ✅ **Plan created**
2. ✅ **Create KONTAK-TODO.md**
3. ✅ **Update KontakController.php**: index(), store() Pesan::create
4. ✅ **Add routes/web.php**: /kontak (GET index, POST kirim)
5. ✅ **Navbar link**: layouts/app.blade.php (main nav)
6. ✅ **Test**: Routes cached
4. **Add routes/web.php**: GET /kontak → index (kontak.index), POST /kontak → store (kontak.kirim)
5. **Add navbar link**: layouts/app.blade.php main nav or Profil dropdown
6. **Test**: php artisan route:clear && route:cache, /kontak + submit form → check admin/pesan

**Next: KontakController**

