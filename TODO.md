# TODO - Upgrade Fitur Sejarah

## Step 1: Migration
- [x] Create migration for history_images table
- [x] Add description column to profils table

## Step 2: Models
- [x] Create HistoryImage model
- [x] Update profil model with relationship and description

## Step 3: Controllers
- [x] Add historyImageStore() method in AdminController
- [x] Add historyImageDestroy() method in AdminController
- [x] Update profilUpdate() in AdminController
- [x] Update profilDestroy() in AdminController
- [x] Update sejarah() in ProfilController

## Step 4: Routes
- [x] Add routes for history image management

## Step 5: Views
- [x] Update admin form (manage.blade.php)
- [x] Update guest view (sejarah.blade.php)

## Step 6: Storage Setup
- [x] Create storage directory if needed

