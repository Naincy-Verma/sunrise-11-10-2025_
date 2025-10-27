@extends('layout.master')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/specialties.css') }}" />
<style>
    .content-box {
        padding: 2rem;
        border-radius: 5px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.25);
        margin-bottom: 2rem;
        background-color: #fff;
    }
    .list-item {
        padding: 1rem;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s ease;
    }
    .list-item:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }
    .text-success { color: #198754 !important; }
    .text-danger { color: #dc3545 !important; }
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="row g-4">
        <div class="col-lg-8">
            {{-- Patient Rights --}}
            @if(isset($educations['Your Rights as a Patient']))
            <div class="content-box">
                <h2>Your Rights as a Patient</h2>
                <div class="row g-3">
                    @foreach($educations['Your Rights as a Patient'] as $item)
                    <div class="col-md-6 col-12">
                        <div class="list-item">
                            <p><i class="bi bi-check-circle-fill text-success me-2"></i> {{ $item->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Patient Responsibilities --}}
            @if(isset($educations['Your Responsibilities as a Patient']))
            <div class="content-box">
                <h2>Your Responsibilities as a Patient</h2>
                <div class="row g-3">
                    @foreach($educations['Your Responsibilities as a Patient'] as $item)
                    <div class="col-md-6 col-12">
                        <div class="list-item">
                            <p><i class="bi bi-x-diamond-fill text-danger me-2"></i> {{ $item->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <div class="col-lg-4">
            {{-- Appointment Sidebar --}}
            <div class="form-sidebar p-4">
                <h4 class="mb-4 text-primary"><i class="fas fa-calendar-alt me-2"></i>Book Appointment</h4>
                <form>
                    <div class="row g-3">
                        <div class="col-12"><input type="text" class="form-control" placeholder="Full Name"></div>
                        <div class="col-12"><input type="tel" class="form-control" placeholder="Phone"></div>
                        <div class="col-12"><input type="date" class="form-control"></div>
                        <div class="col-12">
                            <select class="form-select">
                                <option selected disabled>Select Speciality</option>
                                <option value="Gynae Laparoscopic Surgeries">Gynae Laparoscopic Surgeries</option>
                                <option value="Obstetrics and Gynaecology">Obstetrics and Gynaecology</option>
                                <option value="Pediatricians">Pediatricians</option>
                                <option value="ENT">ENT</option>
                            </select>
                        </div>
                        <div class="col-12"><input type="email" class="form-control" placeholder="Email"></div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 py-2">Submit Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
