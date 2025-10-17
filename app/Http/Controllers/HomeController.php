<?php

namespace App\Http\Controllers;
use App\Models\CommunityEventGallery;
use App\Models\Speciality;
use App\Models\RareCase;
use App\Models\CommunityEvent;
use App\Models\Blog;
use App\Models\Faq;

use Illuminate\Http\Request;
USE App\Models\Appointment;

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
         // Only fetch id and title for the dropdown
        $specialties_form = Speciality::select('id', 'title')->get();
        return view('pages.index', compact('type', 'specialties', 'cases', 'events', 'blogs', 'faqs', 'specialties_form'));

    }



    public function BookAppointment()
    {
        $type = $this->is_mobile();
        $specialties_form = Speciality::select('id', 'title')->get();
        return view('pages.book-appointment', compact('type', 'specialties_form'));
    }


    public function specialtyDetail($slug)
    {
        // $specialties = Speciality::get();
        $specialty = Speciality::where('slug', $slug)->firstOrFail();
         $specialties_form = Speciality::select('id', 'title')->get();
        return view('pages.specialties.specialty_detail', compact('specialty', 'specialties_form'));
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




     public function storeAppointment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:12',
            'speciality' => 'required|exists:our_specialties,id',
             'appointment_date' => 'required|date',
            'source' => 'nullable|string|max:50',
        ]);

        // Save to appointments table
        Appointment::create([
            'title' => 'Mr.', // default placeholder
            'first_name' => $request->name,
            'middle_name' => '',
            'last_name' => '',
            'gender' => 'N/A',
            'dob' => now(),
            'email' => $request->email,
            'mobile_no' => $request->phone,
            'pin_code' => '',
            'appointment_date' => now(),
            'status' => 'pending',
            'source' => $request->source ?? 'N/A',
            'speciality_id' => $request->speciality,
        ]);

        return redirect('/')->with('success', 'Your appointment has been submitted successfully!');
    }
    
}
