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
use App\Models\Doctor;
use App\Models\About;
use App\Models\Vision_Mission; 
use App\Models\Milestone;
use App\Models\Facility;
use App\Models\Package;
use App\Models\Excellence; 
use App\Models\TrainingProgram; 
use App\Models\SpecializedCourse; 
use App\Models\PatientEducation;
use App\Models\ProgramRegistration; 
use App\Models\QuickEnquiry;
use App\Models\TrainingGallery;


use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Timeslot;

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
        $specialities = Speciality::get();
        $cases = RareCase::get();
        $events = CommunityEvent::get();
        $blogs = Blog::get();
        $faqs = Faq::get();
        $videos = VideoTestimonial::all();
        $testimonials = PatientTestimonial::all();
        $specialities_form = Speciality::select('id', 'title')->get();
        $doctors = Doctor::with('speciality')->get();
        //return $doctors;
        return view('pages.index', compact('type', 'specialities', 'specialities_form','cases', 'events', 'blogs', 'faqs', 'videos', 'testimonials', 'doctors'));
      // Only fetch id and title for the dropdown
    }

    public function BookAppointment()
    {

        $type = $this->is_mobile();
        $specialties_form = Speciality::select('id', 'title')->get();
        $countries = Country::all();
        $states = State::with('country')->get();
        $doctors = Doctor::all();
        $cities = City::all();
        $timeslots = Timeslot::all();
        return view('pages.book-appointment', compact('type', 'specialties_form', 'countries', 'states', 'doctors', 'cities', 'timeslots'));
    }


    public function specialityDetail($slug)
    {
        $speciality = Speciality::where('slug', $slug)->firstOrFail();
        $specialities_form = Speciality::select('id', 'title')->get();
        return view('pages.specialties.speciality_detail', compact('speciality', 'specialities_form'));
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

    public function patient_testimonial()
    {
        $testimonials = PatientTestimonial::all();
        return view('pages.patient-testimonial', compact('testimonials' ));
    }
      public function video_testimonial()
    {
        $videos = VideoTestimonial::all();
        return view('pages.video-testimonial', compact('videos' ));
    }
    public function doctors()
    {
        $doctors = Doctor::with('speciality')->get();
        return view('pages.doctor', compact('doctors'));
    }
    public function doctorDetail($slug)
    {
        // Fetch doctor by profile_url
        $doctor = Doctor::where('profile_url', $slug)->firstOrFail();
        // return $doctor;
        return view('pages.team-details', compact('doctor'));
    }

     public function storeAppointment(Request $request)
    {
        // Common rules
        $rules = [
            'name' => 'required|string|max:200',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:12',
            'speciality' => 'required|exists:our_specialties,id',
            'source' => 'nullable|string|max:50',
        ];

         // Extra validations only if from book-appointment-page
    if ($request->source === 'book-appointment-page') {
        $rules = array_merge($rules, [
            'title' => 'required|string|max:20',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'gender' => 'required|string|max:10',
            'dob' => 'nullable|date',
            'pin_code' => 'nullable|string|max:10',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'doctor_id' => 'nullable|exists:doctors,id',
            'time_slot_id' => 'nullable|exists:time_slots,id',
            'appointment_date' => 'required|date',
        ]);
    }

        $request->validate($rules);

        // Create new appointment record
        $appointment = new Appointment();
        $appointment->title = $request->title ?? 'N/A';
        $appointment->first_name = $request->name;
        $appointment->middle_name = $request->middle_name ?? '';
        $appointment->last_name = $request->last_name ?? '';
        $appointment->gender = $request->gender ?? 'N/A';
        $appointment->dob = $request->dob ?? now();
        $appointment->email = $request->email;
        $appointment->mobile_no = $request->phone;
        $appointment->pin_code = $request->pin_code ?? '';
        $appointment->appointment_date = $request->appointment_date ?? now();
        $appointment->status = 'pending';
        $appointment->source = $request->source ?? 'N/A';
        $appointment->speciality_id = $request->speciality;
        $appointment->country_id = $request->country_id ?? null;
        $appointment->state_id = $request->state_id ?? null;
        $appointment->city_id = $request->city_id ?? null;
        $appointment->doctor_id = $request->doctor_id ?? null;
        $appointment->time_slot_id = $request->time_slot_id ?? null;

        $appointment->save();

        // // Only require date if coming from the book appointment page
        // if ($request->source === 'book-appointment-page') {
        //     $rules['appointment_date'] = 'required|date';
        // }

        // $request->validate($rules);

        // // Save data
        // Appointment::create([
        //     'title' => 'N/A',
        //     'first_name' => $request->name,
        //     'middle_name' => '',
        //     'last_name' => '',
        //     'gender' => 'N/A',
        //     'dob' => now(),
        //     'email' => $request->email,
        //     'mobile_no' => $request->phone,
        //     'pin_code' => '',
        //     'appointment_date' => $request->appointment_date ?? now(),
        //     'status' => 'pending',
        //     'source' => $request->source ?? 'N/A',
        //     'speciality_id' => $request->speciality,
        // ]);
        

        return redirect('/')->with('success', 'Your appointment has been submitted successfully!');
    }
    
    public function about()
    {
        $about = About::first(); 
        $visions = Vision_Mission::all();
        $milestones = Milestone::all();
        $facilities = Facility::all();
        return view('pages.about', compact('about', 'visions', 'milestones', 'facilities'));
    }
    
    public function packages(){
        $packages = Package::all();
        $specialties_form = Speciality::select('id', 'title')->get();
        return view ('pages.health_package', compact('packages', 'specialties_form'));
    }


    public function training()
    {
        $excellence = Excellence::first();
        $programs = TrainingProgram::orderBy('s_no', 'asc')->get();
        $courses = SpecializedCourse::where('status', 'active')->orderBy('id', 'asc')->get();
        $courses = SpecializedCourse::where('status', 'active')->orderBy('id', 'asc')->get();
        $galleryImages = TrainingGallery::latest()->get();
        return view('pages.training', compact('excellence', 'programs', 'courses','galleryImages'));
    }
    
    public function patient_education()
    {
        $educations = PatientEducation::all()->groupBy('heading');

        return view('pages.patient_education', compact('educations'));
    }
     public function getStates($countryId)
    {
        $states = State::where('country_id', $countryId)->get(['id', 'name']);
        return response()->json($states);
    }
    public function getCities($stateId)
    {
        $cities = City::where('state_id', $stateId)->get(['id', 'name']);
        return response()->json($cities);
    }

    

    /**
     * Handle the frontend program registration form submission
     */
    public function submitProgramRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|string|max:20',
            'source' => 'required|string|max:100',
            'training_program_id' => 'nullable|exists:training_programs,id',
            'document' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'location' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        // Handle document upload
        $document = $request->file('document');
        $filename = time() . '_' . $document->getClientOriginalName();
        $relativePath = 'admin-assets/images/admin-images/program-registerations/' . $filename;
        $document->move(public_path('admin-assets/images/admin-images/program-registerations'), $filename);

        // Create Program Registration record
        ProgramRegistration::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'source' => $request->source,
            'training_program_id' => $request->training_program_id,
            'document' => $relativePath,
            'location' => $request->location,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Registration submitted successfully.');
    }

    public function contact()
    {
        // Fetch all specialties for the dropdown
        $specialties_form = Speciality::select('id', 'title')->get();
        // Return contact page with the variable
        return view('pages.contact-us', compact('specialties_form'));
    }

    public function quickEnquiry(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:200',
            'mobile_number' => 'required|digits_between:10,13',
            'time_slot_id' => 'required|exists:time_slots,id',
        ]);

        // Save data to quick_enquiries table
        QuickEnquiry::create([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'time_slot_id' => $request->time_slot_id,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Your enquiry has been submitted successfully!');
    }



}
