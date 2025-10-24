@extends('admin.layouts.master')

@section('css')
<style>
    .test-badge {
        display: inline-block;
        background: #0d6efd;
        color: #fff;
        border: 1px solid #bcd0ff;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
        margin: 2px;
        white-space: nowrap;
        transition: all 0.2s ease-in-out;
         border-color: #0d6efd;
    }
    td .tests-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Package Sections List</h4>
                    <a href="{{ route('admin.package.create') }}" class="btn btn-primary">Add Package</a>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 60px;">No.</th>
                                    <th>Heading</th>
                                    <th style="width: 40%;">Tests</th>
                                    <th style="width: 180px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($packages as $index => $package)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td class="fw-semibold">{{ $package->heading }}</td>
                                        <td>
                                            <div class="tests-wrapper">
                                                @php
                                                    $tests = is_array($package->tests) ? $package->tests : [$package->tests];
                                                @endphp
                                                @foreach($tests as $test)
                                                    <span class="test-badge">{{ $test }}</span>
                                                @endforeach
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!-- View -->
                                                <a href="{{ route('admin.package.show', $package->id) }}" class="btn btn-info btn-sm me-2" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <!-- Edit -->
                                                <a href="{{ route('admin.package.edit', $package->id) }}" class="btn btn-primary btn-sm me-2" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Delete -->
                                                <form action="{{ route('admin.package.destroy', $package->id) }}" method="POST" class="delete-form m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $package->heading }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-3">No Package sections found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');
            const title = this.getAttribute('data-title');

            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete "${title}"! This action cannot be undone.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection
