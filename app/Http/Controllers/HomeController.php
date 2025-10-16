<?php

namespace App\Http\Controllers;
use App\Models\CommunityEventGallery;
use App\Models\Speciality;
use App\Models\RareCase;
use App\Models\CommunityEvent;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\VideoTestimonial;
use App\Models\PatientTestimonial;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function is_mobile()
    {
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        $iPod = stripos($useragent, "iPod");
        $iPad = stripos($useragent, "iPad");
        $iPhone = stripos($useragent, "iPhone");
        $Android = stripos($useragent, "Android");
        $iOS = stripos($useragent, "iOS");
        //-- You can add billion devices

        $DEVICE = ($iPod || $iPad || $iPhone || $Android || $iOS);

        if ($DEVICE != true) {
            return array('code' => 200, 'device' => 'web');
        } else {
            return array('code' => 201, 'device' => 'mobile');
        }
    }


    public function index()
    {
        $type = $this->is_mobile();
        $specialties = Speciality::get();
        $cases = RareCase::get();
        $events = CommunityEvent::get();
        $blogs = Blog::get();
        $faqs = Faq::get();
        $videos = VideoTestimonial::all();
        $testimonials = PatientTestimonial::all();
        return view('pages.index', compact('type', 'specialties', 'cases', 'events', 'blogs', 'faqs', 'videos', 'testimonials'));
    }


    public function BookAppointment()
    {
        $type = $this->is_mobile();
        return view('pages.book-appointment', compact('type'));
    }


    public function specialtyDetail($slug)
    {
        // $specialties = Speciality::get();
        $specialty = Speciality::where('slug', $slug)->firstOrFail();
        return view('pages.specialties.specialty_detail', compact('specialty', ));
    }
    public function rarecase()
    {
        $cases = RareCase::get();
        return view('pages.rare_case', compact('cases' ));
    }

    public function event()
    {
        $events = CommunityEvent::get();
        return view('pages.event', compact('events' ));
    }
    
    public function Event_detail($even_url)
    {
        $event = CommunityEvent::where('slug', $even_url)->firstOrFail();
        $galleries = CommunityEventGallery::where('community_event_id', $event->id)->get();
        return view('pages.event-detail', compact('galleries', 'event'));
    }

     public function blog()
    {
        $blogs = Blog::get();
        return view('pages.blog_list', compact('blogs' ));
    }
    
    public function blogdetail($even_url)
    {
        $blog = Blog::where('slug', $even_url)->firstOrFail();
        return view('pages.blog-detail', compact('blog'));  
    }
    
    public function faq()
    {
        $faqs = Faq::get();
        return view('pages.faq', compact('faqs' ));
    }

    public function video_testimonial()
    {
        $videos = VideoTestimonial::all();
        return view('pages.video-testimonial', compact('videos' ));
    }

}
