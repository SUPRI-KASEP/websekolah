# Jurusan CRUD Implementation Plan

## Completed Steps
- [x] 1. Fix app/Models/jurusan.php (rename class to Jurusan)
- [x] 2. Update app/Http/Controllers/JurusanController.php (public index only, fix bugs)
- [x] 3. Add jurusan CRUD methods to app/Http\Controllers/AdminController.php
- [x] 4. Add routes to routes/web.php
- [x] 5. Create public view: resources/views/jurusan/index.blade.php
- [x] 6. Create admin views: resources/views/admin/jurusan/index.blade.php, create.blade.php, edit.blade.php, show.blade.php
 - [x] 7. Test and followup (storage:link, migrate if needed)
- [ ] 7. Test and followup (storage:link, migrate if needed)

## Next Steps
Run `php artisan storage:link` for file uploads.
Visit /jurusan for public view, /admin/jurusan for admin CRUD.

