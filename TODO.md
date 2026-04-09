# TODO: Add Alumni Preview to Homepage

## Plan Implementation Steps

### 1. [x] Update HomeController.php
- Add `use App\Models\Alumni;`
- In `index()`: `$alumnis = Alumni::latest()->limit(8)->get();`
- Add `'alumnis'` to `compact()`

### 2. [x] Update home.blade.php
- Add alumni preview section after guru carousel section
- Include: stats header, 3-col responsive grid, hover cards
- Matching CSS animations and design system
- Link button to `route('alumni.index')`

### 3. [x] Test Implementation
- Run `php artisan serve`
- Visit homepage `/`
- Verify: alumni section displays, responsive, no PHP errors
- Check: photos load with fallbacks, stats compute correctly

### 4. [ ] Completion
- Use `attempt_completion` once verified working
