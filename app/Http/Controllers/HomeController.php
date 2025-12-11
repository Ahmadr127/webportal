<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SiteSetting;
use App\Models\ContactInfo;
use App\Models\Service;
use App\Models\News;
use App\Models\GalleryImage;
use App\Models\GalleryCategory;
use App\Models\AboutSection;
use App\Models\CompanyValue;
use App\Models\Stat;
use App\Models\Testimonial;
use App\Models\Faq;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get dynamic data from database
        $sliders = Slider::active()->ordered()->get();
        $services = Service::active()->ordered()->take(3)->get();
        $stats = Stat::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->get();
        $faqs = Faq::active()->ordered()->get();
        $siteSetting = SiteSetting::getInstance();
        $contactInfo = ContactInfo::getInstance();

        return view('home', compact('services', 'sliders', 'stats', 'testimonials', 'faqs', 'siteSetting', 'contactInfo'));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        $aboutSections = AboutSection::active()->ordered()->get();
        $companyValues = CompanyValue::active()->ordered()->get();
        $stats = Stat::active()->ordered()->get();
        $siteSetting = SiteSetting::getInstance();
        $contactInfo = ContactInfo::getInstance();

        return view('pages.about', compact('aboutSections', 'companyValues', 'stats', 'siteSetting', 'contactInfo'));
    }

    /**
     * Display the news page.
     */
    public function news()
    {
        $newsItems = News::published()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->paginate(9);
        
        $siteSetting = SiteSetting::getInstance();
        $contactInfo = ContactInfo::getInstance();
        
        return view('pages.news', compact('newsItems', 'siteSetting', 'contactInfo'));
    }

    /**
     * Display single news article.
     */
    public function newsShow($slug)
    {
        $news = News::where('slug', $slug)
            ->where('is_published', true)
            ->with(['category', 'author', 'tags'])
            ->firstOrFail();
        
        // Increment views count
        $news->increment('views_count');
        
        // Get related news
        $relatedNews = News::published()
            ->where('id', '!=', $news->id)
            ->where('category_id', $news->category_id)
            ->take(3)
            ->get();
        
        $siteSetting = SiteSetting::getInstance();
        $contactInfo = ContactInfo::getInstance();
        
        return view('pages.news-detail', compact('news', 'relatedNews', 'siteSetting', 'contactInfo'));
    }

    /**
     * Display the gallery page.
     */
    public function gallery()
    {
        $categories = GalleryCategory::active()
            ->withCount('images')
            ->get();
        
        $galleryImages = GalleryImage::active()
            ->with('category')
            ->ordered()
            ->get();
        
        $siteSetting = SiteSetting::getInstance();
        $contactInfo = ContactInfo::getInstance();
        
        return view('pages.gallery', compact('galleryImages', 'categories', 'siteSetting', 'contactInfo'));
    }

    /**
     * Display the services page.
     */
    public function services()
    {
        $services = Service::active()->ordered()->get();
        $siteSetting = SiteSetting::getInstance();
        $contactInfo = ContactInfo::getInstance();
        
        return view('pages.services', compact('services', 'siteSetting', 'contactInfo'));
    }

    /**
     * Display single service detail.
     */
    public function serviceShow($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
        
        // Get related services
        $relatedServices = Service::active()
            ->where('id', '!=', $service->id)
            ->take(3)
            ->get();
        
        $siteSetting = SiteSetting::getInstance();
        $contactInfo = ContactInfo::getInstance();
        
        return view('pages.service-detail', compact('service', 'relatedServices', 'siteSetting', 'contactInfo'));
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        $contactInfo = ContactInfo::getInstance();
        $siteSetting = SiteSetting::getInstance();
        
        return view('pages.contact', compact('contactInfo', 'siteSetting'));
    }

    /**
     * Handle contact form submission.
     */
    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Store contact message in database
        \App\Models\ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim. Kami akan menghubungi Anda segera.');
    }
}
