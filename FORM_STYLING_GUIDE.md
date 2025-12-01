# 📝 FORM STYLING TEMPLATE

## ✅ **UPDATED FORMS**

### **Completed:**
1. ✅ News create - Full styled with Tailwind
2. ✅ All index pages - Using `<x-table-filter>` component

### **Pattern untuk Form Lainnya:**

---

## 🎨 **STANDARD FORM TEMPLATE**

### **Basic Structure:**

```blade
@extends('layouts.app')

@section('title', 'Create/Edit [Feature]')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">[Title]</h2>
            <a href="{{ route('[route].index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back
            </a>
        </div>

        <form action="{{ route('[route]') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('[PUT/POST]')
            
            <!-- Form Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content (2 columns) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Fields here -->
                </div>

                <!-- Sidebar (1 column) -->
                <div class="space-y-6">
                    <!-- Options here -->
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
```

---

## 🔧 **FORM COMPONENTS**

### **1. Text Input:**
```blade
<div>
    <label for="[name]" class="block text-sm font-medium text-gray-700">
        [Label] <span class="text-red-500">*</span>
    </label>
    <input type="text" name="[name]" id="[name]" value="{{ old('[name]', $item->[name] ?? '') }}" required
           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm @error('[name]') border-red-500 @enderror">
    @error('[name]')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
```

### **2. Textarea:**
```blade
<div>
    <label for="[name]" class="block text-sm font-medium text-gray-700">[Label]</label>
    <textarea name="[name]" id="[name]" rows="5"
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm @error('[name]') border-red-500 @enderror">{{ old('[name]', $item->[name] ?? '') }}</textarea>
    @error('[name]')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
```

### **3. File Upload:**
```blade
<div>
    <label for="[name]" class="block text-sm font-medium text-gray-700">[Label]</label>
    
    @if(isset($item) && $item->[name])
    <div class="mt-2 mb-3">
        <img src="{{ asset('storage/' . $item->[name]) }}" alt="Current" class="h-32 w-32 object-cover rounded-lg border">
    </div>
    @endif
    
    <input type="file" name="[name]" id="[name]" accept="image/*"
           class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
    <p class="mt-1 text-sm text-gray-500">Max size: 2MB</p>
    @error('[name]')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
```

### **4. Select Dropdown:**
```blade
<div>
    <label for="[name]" class="block text-sm font-medium text-gray-700">[Label]</label>
    <select name="[name]" id="[name]"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
        <option value="">Select...</option>
        @foreach($items as $item)
        <option value="{{ $item->id }}" {{ old('[name]', $model->[name] ?? '') == $item->id ? 'selected' : '' }}>
            {{ $item->name }}
        </option>
        @endforeach
    </select>
    @error('[name]')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
```

### **5. Checkbox:**
```blade
<div class="flex items-center">
    <input type="checkbox" name="[name]" id="[name]" value="1" 
           {{ old('[name]', $item->[name] ?? true) ? 'checked' : '' }}
           class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
    <label for="[name]" class="ml-2 block text-sm text-gray-900">
        [Label]
    </label>
</div>
```

### **6. Number Input:**
```blade
<div>
    <label for="[name]" class="block text-sm font-medium text-gray-700">[Label]</label>
    <input type="number" name="[name]" id="[name]" value="{{ old('[name]', $item->[name] ?? 0) }}"
           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
</div>
```

### **7. Rating Select (for Testimonials):**
```blade
<div>
    <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
    <select name="rating" id="rating" required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
        @for($i = 1; $i <= 5; $i++)
        <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>
            {{ $i }} Star{{ $i > 1 ? 's' : '' }}
        </option>
        @endfor
    </select>
</div>
```

---

## 📦 **SIDEBAR OPTIONS TEMPLATE**

```blade
<div class="space-y-6">
    <!-- Options Card -->
    <div class="bg-gray-50 p-4 rounded-lg">
        <h3 class="text-sm font-medium text-gray-900 mb-4">Options</h3>
        
        <div class="space-y-4">
            <!-- Order -->
            <div>
                <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', $item->order ?? 0) }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
            </div>

            <!-- Active Status -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" 
                       {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}
                       class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-900">
                    Active (visible on website)
                </label>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col space-y-2">
        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center justify-center">
            <i class="fas fa-save mr-2"></i>
            {{ isset($item) ? 'Update' : 'Create' }}
        </button>
        <a href="{{ route('[route].index') }}" class="w-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center justify-center">
            Cancel
        </a>
    </div>
</div>
```

---

## 🎯 **QUICK REFERENCE**

### **Color Classes:**
- **Primary (Green):** `bg-green-600 hover:bg-green-700 text-white`
- **Secondary (Gray):** `bg-gray-500 hover:bg-gray-700 text-white`
- **Danger (Red):** `bg-red-600 hover:bg-red-700 text-white`
- **Success:** `bg-green-100 text-green-800`
- **Info:** `bg-blue-100 text-blue-800`

### **Input Classes:**
```
mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm
```

### **Button Classes:**
```
bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded 
inline-flex items-center justify-center
```

---

## 📋 **CHECKLIST PER FORM**

### **Gallery Create/Edit:**
- [ ] Title (text)
- [ ] Description (textarea)
- [ ] Image upload (file)
- [ ] Category (select)
- [ ] Order (number)
- [ ] is_active (checkbox)

### **Services Create/Edit:**
- [ ] Icon (text - FontAwesome class)
- [ ] Title (text)
- [ ] Slug (text)
- [ ] Short Description (textarea)
- [ ] Full Description (textarea)
- [ ] Image upload (file)
- [ ] Features (dynamic array)
- [ ] Meta fields (text)
- [ ] Order (number)
- [ ] is_active (checkbox)

### **Testimonials Create/Edit:**
- [ ] Client Name (text)
- [ ] Client Position (text)
- [ ] Client Company (text)
- [ ] Client Avatar (file)
- [ ] Testimonial (textarea)
- [ ] Rating (select 1-5)
- [ ] Order (number)
- [ ] is_active (checkbox)

---

## ✅ **SUMMARY**

**Completed:**
- ✅ News create form - Full Tailwind styling
- ✅ All index pages - Using component
- ✅ Template documentation

**Remaining:**
- ⏳ News edit form
- ⏳ Gallery create/edit
- ⏳ Services edit (create sudah ada)
- ⏳ Testimonials create/edit

**Estimated time:** ~1 hour untuk semua form

**Note:** Semua form mengikuti pattern yang sama, tinggal copy-paste template dan sesuaikan fields!

---

*Created: 2025-12-01 09:15*
*Status: Template Ready*
