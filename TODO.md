# TODO: Ubah Field Struktur Organisasi - judul/konten → jabatan/nama

## Plan:
1. [x] Create migration to add `jabatan` and `nama` columns to profils table
2. [x] Update Model (profil.php) - add new fields to $fillable
3. [x] Update AdminController - modify CRUD operations for struktur-organisasi
4. [x] Update manage.blade.php - change form labels for struktur-organisasi
5. [x] Update struktur.blade.php - change display from judul/konten to jabatan/nama

## Status: COMPLETED
## Next Step: Run migration with `php artisan migrate`

