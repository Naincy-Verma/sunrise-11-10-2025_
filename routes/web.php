<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RareCaseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommunityEventController;
use App\Http\Controllers\CommunityEventGalleryController;
use App\Http\Controllers\PatientTestimonialController;
use App\Http\Controllers\VideoTestimonialController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\VisionMissionController;
use App\Http\Controllers\MilestonesController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\AppointmentController;


Route::get('/index', function () {
    return view('welcome');
});


Route::get('/',[HomeController::class,'index']);
Route::get('/book-appointment', [HomeController::class, 'BookAppointment']);
Route::view('about','pages.about');
Route::view('contact','pages.contact-us');
Route::view('team','pages.our-team');
Route::view('doctor-detail','pages.team-details');
Route::view('team-detail2','pages.team-details2');
Route::view('c2','pages.contact');
Route::view('team1','pages.team');
Route::get('event',  [HomeController::class, 'event'])->name('event');
Route::get('/event/{event_url}', [HomeController::class, 'Event_detail']);
Route::view('award','pages.award');
Route::get('/rare_case', [HomeController::class, 'rarecase'])->name('rare_case');
Route::get('/blog-list', [HomeController::class, 'blog'])->name('blogs'); 
Route::get('/blog-detail/{slug}', [HomeController::class, 'blogdetail'])->name('blog-detail');
Route::view('doctors','pages.doctor');
Route::view('gynae-laparoscopic-surgeries','pages.specialties.gynae_laparoscopic');
Route::view('obstetrics-and-gynaecology','pages.specialties.obstetrics');
Route::view('pediatricians','pages.specialties.pediatrician');
Route::view('ent','pages.specialties.infertility');
Route::view('general-surgery','pages.specialties.laparoscopic_surgeon');
Route::view('orthopedics','pages.specialties.orthopedics');
Route::view('reconstructive-uro-surgery','pages.specialties.uro_surgery');
Route::view('critical-cases-icu','pages.specialties.cardiac_science');
Route::view('bariatric-surgery','pages.specialties.bariatric_surgery');
Route::view('internal-medicine','pages.specialties.internal_medicine');
Route::view('patient_education','pages.patient_education');
Route::get('video-testimonial', [HomeController::class, 'video_testimonial'])->name('video-testimonial');
Route::view('patient-testimonial','pages.patient-testimonial');
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/specialties/{slug}', [HomeController::class, 'specialtyDetail']);

//Frontend Rputes
Route::post('/appointments/store', [HomeController::class, 'storeAppointment'])->name('appointments.store');

// admin Route
Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Dashboard (protected)
Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.pages.dashboard'); 
    })->name('admin.dashboard');


    Route::prefix('/specialties')->group(function () {
    Route::get('/', [SpecialityController::class, 'index'])->name('specialties.index');        
    Route::get('/create', [SpecialityController::class, 'create'])->name('specialties.create'); 
    Route::post('/store', [SpecialityController::class, 'store'])->name('specialties.store'); 
    Route::get('/{specialty}', [SpecialityController::class, 'show'])->name('specialties.show'); 
    Route::get('/{specialty}/edit', [SpecialityController::class, 'edit'])->name('specialties.edit');  
    Route::put('/{specialty}/update', [SpecialityController::class, 'update'])->name('specialties.update'); 
    Route::delete('/{specialty}/delete', [SpecialityController::class, 'destroy'])->name('specialties.destroy'); 
});


// Doctor Management Routes

Route::prefix('admin/doctors')->group(function () {
    Route::get('/', [DoctorController::class, 'index'])->name('doctors.index');        
    Route::get('/create', [DoctorController::class, 'create'])->name('doctors.create');
    Route::post('/store', [DoctorController::class, 'store'])->name('doctors.store');   
    Route::get('/{doctor}', [DoctorController::class, 'show'])->name('doctors.show');
    Route::get('/{id}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');   
    Route::put('/{id}/update', [DoctorController::class, 'update'])->name('doctors.update'); 
    Route::delete('/{id}/delete', [DoctorController::class, 'destroy'])->name('doctors.destroy'); 
});

Route::prefix('/rare-cases')->group(function () {
    Route::get('/', [RareCaseController::class, 'index'])->name('rare-cases.index');
    Route::get('/create', [RareCaseController::class, 'create'])->name('rare-cases.create');
    Route::post('/store', [RareCaseController::class, 'store'])->name('rare-cases.store');
    Route::get('/{id}', [RareCaseController::class, 'show'])->name('rare-cases.show');
    Route::get('/{id}/edit', [RareCaseController::class, 'edit'])->name('rare-cases.edit');
    Route::put('/{id}/update', [RareCaseController::class, 'update'])->name('rare-cases.update');
    Route::delete('/{id}/delete', [RareCaseController::class, 'destroy'])->name('rare-cases.destroy');
});


Route::prefix('/blogs')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blogs.index');             
    Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');     
    Route::post('/store', [BlogController::class, 'store'])->name('blogs.store');       
    Route::get('/{id}', [BlogController::class, 'show'])->name('blogs.show');           
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');    
    Route::put('/{id}/update', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/{id}/delete', [BlogController::class, 'destroy'])->name('blogs.destroy');
});

Route::prefix('/community-events')->group(function () {
    Route::get('/', [CommunityEventController::class, 'index'])->name('community-events.index');
    Route::get('/create', [CommunityEventController::class, 'create'])->name('community-events.create');
    Route::post('/store', [CommunityEventController::class, 'store'])->name('community-events.store');
    Route::get('/{id}', [CommunityEventController::class, 'show'])->name('community-events.show');
    Route::get('/{id}/edit', [CommunityEventController::class, 'edit'])->name('community-events.edit');
    Route::put('/{id}/update', [CommunityEventController::class, 'update'])->name('community-events.update');
    Route::delete('/{id}/delete', [CommunityEventController::class, 'destroy'])->name('community-events.destroy');
});

Route::prefix('community-gallery')->group(function () {
    Route::get('/{event_id}/create', [CommunityEventGalleryController::class, 'create'])->name('community-gallery.create');
    Route::post('/store', [CommunityEventGalleryController::class, 'store'])->name('community-gallery.store');
    Route::get('/', [CommunityEventGalleryController::class, 'index'])->name('community-gallery.index');
    Route::get('/{event_id}', [CommunityEventGalleryController::class, 'show'])->name('community-gallery.show');
    Route::delete('/{id}/delete', [CommunityEventGalleryController::class, 'destroy'])->name('community-gallery.destroy');
});

Route::prefix('/patient-testimonials')->group(function () {
    Route::get('/', [PatientTestimonialController::class, 'index'])->name('patient_testimonials.index');
    Route::get('/create', [PatientTestimonialController::class, 'create'])->name('patient_testimonials.create');
    Route::post('/store', [PatientTestimonialController::class, 'store'])->name('patient_testimonials.store');
    Route::get('/{id}', [PatientTestimonialController::class, 'show'])->name('patient_testimonials.show');
    Route::get('/{id}/edit', [PatientTestimonialController::class, 'edit'])->name('patient_testimonials.edit');
    Route::put('/{id}/update', [PatientTestimonialController::class, 'update'])->name('patient_testimonials.update');
    Route::delete('/{id}/delete', [PatientTestimonialController::class, 'destroy'])->name('patient_testimonials.destroy');
});

// Video Testimonial Page Routes
Route::prefix('/video-testimonials')->group(function () {
    Route::get('/', [VideoTestimonialController::class, 'index'])->name('video_testimonials.index');
    Route::get('/create', [VideoTestimonialController::class, 'create'])->name('video_testimonials.create');
    Route::post('/store', [VideoTestimonialController::class, 'store'])->name('video_testimonials.store');
    Route::get('/{id}', [VideoTestimonialController::class, 'show'])->name('video_testimonials.show');
    Route::get('/{id}/edit', [VideoTestimonialController::class, 'edit'])->name('video_testimonials.edit');
    Route::put('/{id}/update', [VideoTestimonialController::class, 'update'])->name('video_testimonials.update');
    Route::delete('/{id}/delete', [VideoTestimonialController::class, 'destroy'])->name('video_testimonials.destroy');
});

// FAQ Page Routes
Route::prefix('/faqs')->group(function () {
    Route::get('/', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/store', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('/{id}', [FaqController::class, 'show'])->name('faqs.show');
    Route::get('/{id}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('/{id}/update', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/{id}/delete', [FaqController::class, 'destroy'])->name('faqs.destroy');
});

// About Page Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/about/{id}', [AboutController::class, 'show'])->name('about.show');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');

    // Vision Mission Page Routes

    Route::get('/vision-mission', [VisionMissionController::class, 'index'])->name('vision-mission.index');
    Route::get('/vision-mission/create', [VisionMissionController::class, 'create'])->name('vision-mission.create');
    Route::post('/vision-mission/store', [VisionMissionController::class, 'store'])->name('vision-mission.store');
    Route::get('/vision-mission/{id}', [VisionMissionController::class, 'show'])->name('vision-mission.show');
    Route::get('/vision-mission/{id}/edit', [VisionMissionController::class, 'edit'])->name('vision-mission.edit');
    Route::put('/vision-mission/{id}', [VisionMissionController::class, 'update'])->name('vision-mission.update');
    Route::delete('/vision-mission/{id}', [VisionMissionController::class, 'destroy'])->name('vision-mission.destroy');

    //Milestones
    Route::get('/milestones', [MilestonesController::class, 'index'])->name('milestones.index');
    Route::get('/milestones/create', [MilestonesController::class, 'create'])->name('milestones.create');
    Route::post('/milestones/store', [MilestonesController::class, 'store'])->name('milestones.store');
    Route::get('/milestones/{id}', [MilestonesController::class, 'show'])->name('milestones.show');
    Route::get('/milestones/{id}/edit', [MilestonesController::class, 'edit'])->name('milestones.edit');
    Route::put('/milestones/{id}', [MilestonesController::class, 'update'])->name('milestones.update');
    Route::delete('/milestones/{id}', [MilestonesController::class, 'destroy'])->name('milestones.destroy');

    // Hospital Facility Routes
    Route::get('/facility', [FacilityController::class, 'index'])->name('facility.index');
    Route::get('/facility/create', [FacilityController::class, 'create'])->name('facility.create');
    Route::post('/facility/store', [FacilityController::class, 'store'])->name('facility.store');
    Route::get('/facility/{id}', [FacilityController::class, 'show'])->name('facility.show');
    Route::get('/facility/{id}/edit', [FacilityController::class, 'edit'])->name('facility.edit');
    Route::put('/facility/{id}', [FacilityController::class, 'update'])->name('facility.update');
    Route::delete('/facility/{id}', [FacilityController::class, 'destroy'])->name('facility.destroy');

    //Health Packages Routes
    Route::get('/package', [PackageController::class, 'index'])->name('package.index');
    Route::get('/package/create', [PackageController::class, 'create'])->name('package.create');
    Route::post('/package/store', [PackageController::class, 'store'])->name('package.store');
    Route::get('/package/{id}', [PackageController::class, 'show'])->name('package.show');
    Route::get('/package/{id}/edit', [PackageController::class, 'edit'])->name('package.edit');
    Route::put('/package/{id}', [PackageController::class, 'update'])->name('package.update');
    Route::delete('/package/{id}', [PackageController::class, 'destroy'])->name('package.destroy');

    // --- Country Routes ---
    Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
    Route::get('/countries/create', [CountryController::class, 'create'])->name('countries.create');
    Route::post('/countries/store', [CountryController::class, 'store'])->name('countries.store');
    Route::get('/countries/{id}/edit', [CountryController::class, 'edit'])->name('countries.edit');
    Route::put('/countries/{id}', [CountryController::class, 'update'])->name('countries.update');
    Route::delete('/countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');

    // --- State Routes ---
    Route::get('/states', [StateController::class, 'index'])->name('states.index');
    Route::get('/states/create', [StateController::class, 'create'])->name('states.create');
    Route::post('/states/store', [StateController::class, 'store'])->name('states.store');
    Route::get('/states/{id}/edit', [StateController::class, 'edit'])->name('states.edit');
    Route::put('/states/{id}', [StateController::class, 'update'])->name('states.update');
    Route::delete('/states/{id}', [StateController::class, 'destroy'])->name('states.destroy');

    // --- City Routes ---
    Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
    Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
    Route::post('/cities/store', [CityController::class, 'store'])->name('cities.store');
    Route::get('/cities/{id}/edit', [CityController::class, 'edit'])->name('cities.edit');
    Route::put('/cities/{id}', [CityController::class, 'update'])->name('cities.update');
    Route::delete('/cities/{id}', [CityController::class, 'destroy'])->name('cities.destroy');
    Route::get('/get-states/{id}', [CityController::class, 'getStates'])->name('cities.get-states');

    // --- TimeSlot Routes ---
    Route::get('/time-slots', [TimeSlotController::class, 'index'])->name('time-slots.index');
    Route::get('/time-slots/create', [TimeSlotController::class, 'create'])->name('time-slots.create');
    Route::post('/time-slots/store', [TimeSlotController::class, 'store'])->name('time-slots.store');
    Route::get('/time-slots/{id}/edit', [TimeSlotController::class, 'edit'])->name('time-slots.edit');
    Route::put('/time-slots/{id}', [TimeSlotController::class, 'update'])->name('time-slots.update');
    Route::delete('/time-slots/{id}', [TimeSlotController::class, 'destroy'])->name('time-slots.destroy');

    // --- Appointment Routes ---
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::get('/appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.show');

});



});
