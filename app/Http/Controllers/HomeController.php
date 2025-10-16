<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
USE App\Models\Appointment;

class HomeController extends Controller
{

    public function is_mobile(){
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        $iPod = stripos($useragent, "iPod");
        $iPad = stripos($useragent, "iPad");
        $iPhone = stripos($useragent, "iPhone");
        $Android = stripos($useragent, "Android");
        $iOS = stripos($useragent, "iOS");
        //-- You can add billion devices

        $DEVICE = ($iPod||$iPad||$iPhone||$Android||$iOS);

        if ($DEVICE !=true) {
            return  array('code' =>200 ,'device' =>'web' );
        }else{
            return  array('code' =>201 ,'device' =>'mobile' );
        }
    }


    public function index()
    {
        $type = $this->is_mobile();
        // Only fetch id and title for the dropdown
        $specialties_form = Speciality::select('id', 'title')->get();
        return view('pages.index', compact('type', 'specialties_form'));
    }

    public function BookAppointment()
    {
        $type = $this->is_mobile();
        return view('pages.book-appointment', compact('type'));
    }

    public function Event_detail($even_url)
    {
        $path = "assets/images/events/$even_url/";
        //return $path;
        $images = [];
        if (\File::exists($path)) {
            $files = \File::files($path);
            foreach ($files as $file) {
                $images[] = "assets/images/events/$even_url/" . $file->getFilename();
            }
        }
        return view('pages.event-detail', compact('images', 'even_url'));
    }

     public function storeAppointment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:12',
            'speciality' => 'required|exists:our_specialties,id',
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
