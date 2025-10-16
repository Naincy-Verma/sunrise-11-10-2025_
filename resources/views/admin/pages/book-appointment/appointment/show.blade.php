@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4>Appointment Details</h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Full Name</th>
          <td>{{ $appointment->full_name }}</td>
        </tr>
        <tr>
          <th>Title</th>
          <td>{{ $appointment->title }}</td>
        </tr>
        <tr>
          <th>Middle Name</th>
          <td>{{ $appointment->middle_name ?: 'N/A' }}</td>
        </tr>
        <tr>
          <th>Last Name</th>
          <td>{{ $appointment->last_name ?: 'N/A' }}</td>
        </tr>
        <tr>
          <th>Gender</th>
          <td>{{ $appointment->gender }}</td>
        </tr>
        <tr>
          <th>Date of Birth</th>
          <td>{{ $appointment->dob }}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{ $appointment->email }}</td>
        </tr>
        <tr>
          <th>Mobile</th>
          <td>{{ $appointment->mobile_no }}</td>
        </tr>
        <tr>
          <th>Pin Code</th>
          <td>{{ $appointment->pin_code ?: 'N/A' }}</td>
        </tr>
        <tr>
          <th>Appointment Date</th>
          <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
        </tr>
        <tr>
          <th>Country</th>
          <td>{{ $appointment->country->name ?? 'N/A' }}</td>
        </tr>
        <tr>
          <th>State</th>
          <td>{{ $appointment->state->name ?? 'N/A' }}</td>
        </tr>
        <tr>
          <th>City</th>
          <td>{{ $appointment->city->name ?? 'N/A' }}</td>
        </tr>
        <tr>
          <th>Speciality</th>
          <td>{{ $appointment->speciality->title ?? 'N/A' }}</td>
        </tr>
        <tr>
          <th>Doctor</th>
          <td>{{ $appointment->doctor->name ?? 'N/A' }}</td>
        </tr>
        <tr>
          <th>Time Slot</th>
          <td>{{ $appointment->timeSlot->slot ?? 'N/A' }}</td>
        </tr>
        <tr>
          <th>Status</th>
          <td>
            <span class="badge bg-{{ $appointment->status === 'pending' ? 'warning' : ($appointment->status === 'confirmed' ? 'success' : 'danger') }}">
              {{ ucfirst($appointment->status) }}
            </span>
          </td>
        </tr>
        <tr>
          <th>Source</th>
          <td>{{ $appointment->source }}</td>
        </tr>
      </table>

      <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
  </div>
</div>
@endsection
