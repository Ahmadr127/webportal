# Analisis Fitur CRUD untuk EZ Services Web Portal

## 📋 Daftar Isi
1. [Overview](#overview)
2. [Existing Features](#existing-features)
3. [Required CRUD Features](#required-crud-features)
4. [Implementation Plan](#implementation-plan)
5. [Database Schema](#database-schema)
6. [Permissions Structure](#permissions-structure)

---

## Overview

Website EZ Services saat ini memiliki beberapa halaman publik dan sistem admin. Dokumen ini menganalisis fitur CRUD yang diperlukan untuk mengelola semua konten dinamis di website.

### Halaman yang Ada:
1. **Home** (`/`) - Landing page dengan slider, stats, services, testimonials
2. **About** (`/about`) - Company profile, vision/mission, values
3. **News** (`/news`) - Berita dan artikel
4. **Gallery** (`/gallery`) - Galeri foto
5. **Services** (`/services`) - Detail layanan
6. **Contact** (`/contact`) - Form kontak dan informasi

### Admin Features yang Ada:
- ✅ User Management
- ✅ Role Management
- ✅ Permission Management
- ✅ Site Settings
- ✅ Contact Info
- ✅ Sliders

---

## Existing Features

### 1. ✅ Sliders (SUDAH ADA)
**Status:** Implemented
- Migration: `2024_11_17_000003_create_sliders_table.php`
- Model: `App\Models\Slider`
- Controller: `App\Http\Controllers\Admin\SliderController`
- Routes: `admin.sliders.*`
- Permission: `manage_sliders`

**Fields:**
- id, image, title, subtitle, description, button_text, button_link, order, is_active

---

### 2. ✅ Site Settings (SUDAH ADA)
**Status:** Implemented
- Migration: `2024_11_17_000001_create_site_settings_table.php`
- Model: `App\Models\SiteSetting`
- Controller: `App\Http\Controllers\Admin\SiteSettingController`
- Routes: `admin.site-settings.*`
- Permission: `manage_site_settings`

**Fields:**
- id, app_name, app_tagline, logo, favicon, primary_color, secondary_color, meta_description, meta_keywords

---

### 3. ✅ Contact Info (SUDAH ADA)
**Status:** Implemented
- Migration: `2024_11_17_000002_create_contact_info_table.php`
- Model: `App\Models\ContactInfo`
- Controller: `App\Http\Controllers\Admin\ContactInfoController`
- Routes: `admin.contact-info.*`
- Permission: `manage_contact_info`

**Fields:**
- id, phone_1, phone_2, email, address, facebook_url, instagram_url, twitter_url, linkedin_url, youtube_url, whatsapp

---

## Required CRUD Features

### 1. ❌ News/Articles (BELUM ADA)
**Priority:** HIGH
**Alasan:** Saat ini data news hardcoded di controller

**Required Fields:**
- id
- title (string, required)
- slug (string, unique, auto-generated)
- excerpt (text, required)
- content (longtext, required)
- image (string, nullable)
- author_id (foreign key to users)
- category_id (foreign key to news_categories, nullable)
- published_at (datetime, nullable)
- is_published (boolean, default false)
- views_count (integer, default 0)
- meta_title (string, nullable)
- meta_description (text, nullable)
- timestamps

**Related Tables:**
- `news_categories` (id, name, slug, description, is_active)
- `news_tags` (id, name, slug)
- `news_tag_pivot` (news_id, tag_id)

**Permissions:**
- `view_news`
- `create_news`
- `edit_news`
- `delete_news`
- `publish_news`

**Admin Menu:**
- News Management
  - All News
  - Add New
  - Categories
  - Tags

---

### 2. ❌ Gallery (BELUM ADA)
**Priority:** HIGH
**Alasan:** Saat ini data gallery hardcoded di controller

**Required Fields:**
- id
- title (string, required)
- description (text, nullable)
- image (string, required)
- category_id (foreign key to gallery_categories, nullable)
- order (integer, default 0)
- is_active (boolean, default true)
- timestamps

**Related Tables:**
- `gallery_categories` (id, name, slug, description, is_active)

**Permissions:**
- `view_gallery`
- `create_gallery`
- `edit_gallery`
- `delete_gallery`

**Admin Menu:**
- Gallery Management
  - All Images
  - Add New
  - Categories

---

### 3. ❌ Services (BELUM ADA)
**Priority:** MEDIUM
**Alasan:** Saat ini data services hardcoded di controller

**Required Fields:**
- id
- icon (string, required) - FontAwesome class
- title (string, required)
- slug (string, unique)
- short_description (text, required)
- full_description (longtext, nullable)
- image (string, nullable)
- features (json, nullable) - array of features
- order (integer, default 0)
- is_active (boolean, default true)
- meta_title (string, nullable)
- meta_description (text, nullable)
- timestamps

**Permissions:**
- `view_services`
- `create_services`
- `edit_services`
- `delete_services`

**Admin Menu:**
- Services Management
  - All Services
  - Add New

---

### 4. ❌ Testimonials (BELUM ADA)
**Priority:** MEDIUM
**Alasan:** Saat ini data testimonials hardcoded di home page

**Required Fields:**
- id
- client_name (string, required)
- client_position (string, nullable)
- client_company (string, nullable)
- client_avatar (string, nullable)
- testimonial (text, required)
- rating (integer, 1-5, default 5)
- order (integer, default 0)
- is_active (boolean, default true)
- timestamps

**Permissions:**
- `view_testimonials`
- `create_testimonials`
- `edit_testimonials`
- `delete_testimonials`

**Admin Menu:**
- Testimonials Management
  - All Testimonials
  - Add New

---

### 5. ❌ About Page Content (BELUM ADA)
**Priority:** LOW
**Alasan:** Konten about page saat ini static, tapi sebaiknya bisa diubah dari admin

**Required Fields:**
- id
- section_key (string, unique) - e.g., 'company_profile', 'vision', 'mission'
- title (string, required)
- content (longtext, required)
- image (string, nullable)
- order (integer, default 0)
- is_active (boolean, default true)
- timestamps

**Related Tables:**
- `company_values` (id, icon, title, description, order, is_active)

**Permissions:**
- `manage_about_content`
- `manage_company_values`

**Admin Menu:**
- About Page
  - Company Profile
  - Vision & Mission
  - Company Values

---

### 6. ❌ Contact Messages (BELUM ADA)
**Priority:** MEDIUM
**Alasan:** Perlu menyimpan pesan dari contact form

**Required Fields:**
- id
- name (string, required)
- email (string, required)
- phone (string, nullable)
- subject (string, required)
- message (text, required)
- status (enum: 'new', 'read', 'replied', 'archived')
- replied_at (datetime, nullable)
- replied_by (foreign key to users, nullable)
- ip_address (string, nullable)
- user_agent (text, nullable)
- timestamps

**Permissions:**
- `view_contact_messages`
- `reply_contact_messages`
- `delete_contact_messages`

**Admin Menu:**
- Contact Messages
  - Inbox
  - Replied
  - Archived

---

### 7. ❌ Stats/Counters (BELUM ADA)
**Priority:** LOW
**Alasan:** Stats di home page saat ini hardcoded

**Required Fields:**
- id
- key (string, unique) - e.g., 'years_experience', 'clients', 'support_hours'
- label (string, required)
- value (string, required)
- icon (string, nullable)
- order (integer, default 0)
- is_active (boolean, default true)
- timestamps

**Permissions:**
- `manage_stats`

**Admin Menu:**
- Stats Management

---

### 8. ❌ FAQ (OPTIONAL - FUTURE)
**Priority:** LOW
**Alasan:** Bisa ditambahkan di masa depan

**Required Fields:**
- id
- question (string, required)
- answer (text, required)
- category_id (foreign key to faq_categories, nullable)
- order (integer, default 0)
- is_active (boolean, default true)
- timestamps

---

## Implementation Plan

### Phase 1: Critical Features (Week 1)
1. ✅ News/Articles Management
   - Migration
   - Model with relationships
   - Controller (CRUD)
   - Admin views
   - Routes
   - Permissions & Seeder

2. ✅ Gallery Management
   - Migration
   - Model
   - Controller (CRUD)
   - Admin views
   - Routes
   - Permissions & Seeder

3. ✅ Contact Messages
   - Migration
   - Model
   - Controller
   - Admin views
   - Routes
   - Permissions & Seeder

### Phase 2: Content Management (Week 2)
4. ✅ Services Management
   - Migration
   - Model
   - Controller (CRUD)
   - Admin views
   - Routes
   - Permissions & Seeder

5. ✅ Testimonials Management
   - Migration
   - Model
   - Controller (CRUD)
   - Admin views
   - Routes
   - Permissions & Seeder

### Phase 3: Enhancement (Week 3)
6. ✅ About Page Content Management
7. ✅ Stats/Counters Management
8. ✅ Update all public pages to use dynamic data

---

## Database Schema

### News Tables
```sql
-- news
CREATE TABLE news (
    id BIGSERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    excerpt TEXT NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    author_id BIGINT REFERENCES users(id) ON DELETE SET NULL,
    category_id BIGINT REFERENCES news_categories(id) ON DELETE SET NULL,
    published_at TIMESTAMP,
    is_published BOOLEAN DEFAULT FALSE,
    views_count INTEGER DEFAULT 0,
    meta_title VARCHAR(255),
    meta_description TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- news_categories
CREATE TABLE news_categories (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    description TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- news_tags
CREATE TABLE news_tags (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- news_tag (pivot)
CREATE TABLE news_tag (
    news_id BIGINT REFERENCES news(id) ON DELETE CASCADE,
    tag_id BIGINT REFERENCES news_tags(id) ON DELETE CASCADE,
    PRIMARY KEY (news_id, tag_id)
);
```

### Gallery Tables
```sql
-- gallery_images
CREATE TABLE gallery_images (
    id BIGSERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255) NOT NULL,
    category_id BIGINT REFERENCES gallery_categories(id) ON DELETE SET NULL,
    order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- gallery_categories
CREATE TABLE gallery_categories (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    description TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Services Table
```sql
CREATE TABLE services (
    id BIGSERIAL PRIMARY KEY,
    icon VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    short_description TEXT NOT NULL,
    full_description TEXT,
    image VARCHAR(255),
    features JSON,
    order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    meta_title VARCHAR(255),
    meta_description TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Testimonials Table
```sql
CREATE TABLE testimonials (
    id BIGSERIAL PRIMARY KEY,
    client_name VARCHAR(255) NOT NULL,
    client_position VARCHAR(255),
    client_company VARCHAR(255),
    client_avatar VARCHAR(255),
    testimonial TEXT NOT NULL,
    rating INTEGER DEFAULT 5 CHECK (rating >= 1 AND rating <= 5),
    order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Contact Messages Table
```sql
CREATE TABLE contact_messages (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255),
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    status VARCHAR(50) DEFAULT 'new',
    replied_at TIMESTAMP,
    replied_by BIGINT REFERENCES users(id) ON DELETE SET NULL,
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### About Content Tables
```sql
-- about_sections
CREATE TABLE about_sections (
    id BIGSERIAL PRIMARY KEY,
    section_key VARCHAR(255) UNIQUE NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- company_values
CREATE TABLE company_values (
    id BIGSERIAL PRIMARY KEY,
    icon VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Stats Table
```sql
CREATE TABLE stats (
    id BIGSERIAL PRIMARY KEY,
    key VARCHAR(255) UNIQUE NOT NULL,
    label VARCHAR(255) NOT NULL,
    value VARCHAR(255) NOT NULL,
    icon VARCHAR(255),
    order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

---

## Permissions Structure

### Existing Permissions
- manage_users
- manage_roles
- manage_permissions
- manage_site_settings
- manage_contact_info
- manage_sliders
- view_dashboard

### New Permissions Required

#### News Management
- `view_news` - Melihat daftar berita
- `create_news` - Membuat berita baru
- `edit_news` - Mengedit berita
- `delete_news` - Menghapus berita
- `publish_news` - Publish/unpublish berita
- `manage_news_categories` - Kelola kategori berita
- `manage_news_tags` - Kelola tag berita

#### Gallery Management
- `view_gallery` - Melihat galeri
- `create_gallery` - Upload gambar baru
- `edit_gallery` - Edit gambar
- `delete_gallery` - Hapus gambar
- `manage_gallery_categories` - Kelola kategori galeri

#### Services Management
- `view_services` - Melihat layanan
- `create_services` - Tambah layanan baru
- `edit_services` - Edit layanan
- `delete_services` - Hapus layanan

#### Testimonials Management
- `view_testimonials` - Melihat testimonial
- `create_testimonials` - Tambah testimonial
- `edit_testimonials` - Edit testimonial
- `delete_testimonials` - Hapus testimonial

#### Contact Messages
- `view_contact_messages` - Melihat pesan kontak
- `reply_contact_messages` - Balas pesan
- `delete_contact_messages` - Hapus pesan

#### About Content
- `manage_about_content` - Kelola konten about
- `manage_company_values` - Kelola nilai perusahaan

#### Stats
- `manage_stats` - Kelola statistik

---

## Admin Menu Structure

```
Dashboard
├── Users
├── Roles
├── Permissions
│
CMS Management
├── Site Settings
├── Contact Info
├── Sliders
│
Content Management
├── News
│   ├── All News
│   ├── Add New
│   ├── Categories
│   └── Tags
├── Gallery
│   ├── All Images
│   ├── Add New
│   └── Categories
├── Services
│   ├── All Services
│   └── Add New
├── Testimonials
│   ├── All Testimonials
│   └── Add New
├── About Page
│   ├── Company Profile
│   ├── Vision & Mission
│   └── Company Values
├── Stats Management
│
Messages
├── Contact Messages
    ├── Inbox
    ├── Replied
    └── Archived
```

---

## File Structure

```
app/
├── Http/
│   └── Controllers/
│       └── Admin/
│           ├── NewsController.php (NEW)
│           ├── NewsCategoryController.php (NEW)
│           ├── NewsTagController.php (NEW)
│           ├── GalleryController.php (NEW)
│           ├── GalleryCategoryController.php (NEW)
│           ├── ServiceController.php (NEW)
│           ├── TestimonialController.php (NEW)
│           ├── AboutContentController.php (NEW)
│           ├── CompanyValueController.php (NEW)
│           ├── StatController.php (NEW)
│           ├── ContactMessageController.php (NEW)
│           ├── SliderController.php (EXISTS)
│           ├── SiteSettingController.php (EXISTS)
│           └── ContactInfoController.php (EXISTS)
│
├── Models/
│   ├── News.php (NEW)
│   ├── NewsCategory.php (NEW)
│   ├── NewsTag.php (NEW)
│   ├── GalleryImage.php (NEW)
│   ├── GalleryCategory.php (NEW)
│   ├── Service.php (NEW)
│   ├── Testimonial.php (NEW)
│   ├── AboutSection.php (NEW)
│   ├── CompanyValue.php (NEW)
│   ├── Stat.php (NEW)
│   ├── ContactMessage.php (NEW)
│   ├── Slider.php (EXISTS)
│   ├── SiteSetting.php (EXISTS)
│   └── ContactInfo.php (EXISTS)
│
database/
├── migrations/
│   ├── 2024_12_01_000001_create_news_tables.php (NEW)
│   ├── 2024_12_01_000002_create_gallery_tables.php (NEW)
│   ├── 2024_12_01_000003_create_services_table.php (NEW)
│   ├── 2024_12_01_000004_create_testimonials_table.php (NEW)
│   ├── 2024_12_01_000005_create_about_tables.php (NEW)
│   ├── 2024_12_01_000006_create_stats_table.php (NEW)
│   └── 2024_12_01_000007_create_contact_messages_table.php (NEW)
│
├── seeders/
│   ├── NewsSeeder.php (NEW)
│   ├── GallerySeeder.php (NEW)
│   ├── ServiceSeeder.php (NEW)
│   ├── TestimonialSeeder.php (NEW)
│   ├── AboutContentSeeder.php (NEW)
│   ├── StatSeeder.php (NEW)
│   ├── PermissionSeeder.php (UPDATE)
│   └── RoleSeeder.php (UPDATE)
│
resources/
└── views/
    └── admin/
        ├── news/ (NEW)
        │   ├── index.blade.php
        │   ├── create.blade.php
        │   ├── edit.blade.php
        │   └── categories/
        ├── gallery/ (NEW)
        │   ├── index.blade.php
        │   ├── create.blade.php
        │   └── edit.blade.php
        ├── services/ (NEW)
        ├── testimonials/ (NEW)
        ├── about/ (NEW)
        ├── stats/ (NEW)
        └── contact-messages/ (NEW)
```

---

## Next Steps

1. **Review & Approval** - Review dokumen ini dan approve fitur yang akan diimplementasi
2. **Create Migrations** - Buat semua migration files
3. **Create Models** - Buat model dengan relationships
4. **Create Controllers** - Implement CRUD logic
5. **Create Views** - Buat admin interface
6. **Update Routes** - Tambahkan routes baru
7. **Update Permissions** - Tambahkan permissions baru
8. **Update Sidebar** - Tambahkan menu admin
9. **Create Seeders** - Buat sample data
10. **Update Public Pages** - Ubah dari hardcoded ke dynamic data
11. **Testing** - Test semua fitur CRUD

---

## Estimasi Waktu

| Feature | Estimasi | Priority |
|---------|----------|----------|
| News Management | 2 hari | HIGH |
| Gallery Management | 1 hari | HIGH |
| Contact Messages | 1 hari | HIGH |
| Services Management | 1 hari | MEDIUM |
| Testimonials Management | 1 hari | MEDIUM |
| About Content | 1 hari | LOW |
| Stats Management | 0.5 hari | LOW |
| **TOTAL** | **7.5 hari** | |

---

## Notes

- Semua fitur akan menggunakan **soft deletes** untuk keamanan data
- Image upload akan menggunakan **Laravel Storage** dengan validasi
- Semua form akan memiliki **CSRF protection**
- Admin interface akan menggunakan **DataTables** untuk listing
- Akan ada **audit trail** untuk tracking perubahan (menggunakan package owen-it/laravel-auditing jika sudah ada)
- SEO-friendly dengan **slug auto-generation**
- **Image optimization** saat upload (resize, compress)
- **Pagination** untuk semua listing
- **Search & Filter** functionality
- **Bulk actions** (delete, publish, etc.)

---

**Dokumen ini akan diupdate seiring progress implementasi.**

*Last Updated: 2025-12-01*
