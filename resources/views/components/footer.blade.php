@php
    $siteSetting = \App\Models\SiteSetting::getInstance();
    $primaryColor = $siteSetting->primary_color ?? '#04726d';
@endphp

<footer class="text-white" style="background-color: {{ $primaryColor }};">
    <div class="container mx-auto px-6 md:px-12 lg:px-16 py-6">
        <!-- Quick Menu -->
        <div class="flex flex-wrap justify-center items-center gap-8">
            <a href="#home" class="text-white hover:text-white/80 transition text-sm font-medium">Beranda</a>
            <a href="#about" class="text-white hover:text-white/80 transition text-sm font-medium">Tentang</a>
            <a href="#news" class="text-white hover:text-white/80 transition text-sm font-medium">Berita</a>
            <a href="#gallery" class="text-white hover:text-white/80 transition text-sm font-medium">Galeri</a>
            <a href="#our-service" class="text-white hover:text-white/80 transition text-sm font-medium">Layanan Kami</a>
            <a href="#contact" class="text-white hover:text-white/80 transition text-sm font-medium">Hubungi Kami</a>
        </div>
    </div>
</footer>
