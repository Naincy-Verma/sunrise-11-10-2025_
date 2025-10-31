@extends('admin.layouts.master')

@section('css')
<style>
.widget-stat {
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.widget-stat .card-body {
    display: flex;
    align-items: center;
}
.widget-stat .media i {
    font-size: 2.5rem;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Total Quick Enquiries -->
        <div class="col-xl-4 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body">
                    <div class="media">
                        <span class="mr-3">
                            <i class="la la-envelope"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Quick Enquiries</p>
                            <h3 class="text-white">{{ $totalQuickEnquiries }}</h3>
                            <div class="progress mb-2 bg-white">
                                <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                            </div>
                            <small>Latest enquiries count</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Appointments -->
        <div class="col-xl-4 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body">
                    <div class="media">
                        <span class="mr-3">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Appointments</p>
                            <h3 class="text-white">{{ $totalAppointments }}</h3>
                            <div class="progress mb-2 bg-white">
                                <div class="progress-bar progress-animated bg-light" style="width: 65%"></div>
                            </div>
                            <small>Appointment records</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Program Registrations -->
        <div class="col-xl-4 col-sm-6">
            <div class="widget-stat card bg-warning">
                <div class="card-body">
                    <div class="media">
                        <span class="mr-3">
                            <i class="la la-graduation-cap"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Program Registrations</p>
                            <h3 class="text-white">{{ $totalProgramRegistrations }}</h3>
                            <div class="progress mb-2 bg-white">
                                <div class="progress-bar progress-animated bg-light" style="width: 70%"></div>
                            </div>
                            <small>Registered participants</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection

@section('scripts')
<script>
    console.log("Admin dashboard loaded");
</script>
@endsection
