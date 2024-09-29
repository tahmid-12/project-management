@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <h2 class="mb-4">Create Project</h2>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="projectName" class="form-label">Project Name</label>
                    <input type="text" class="form-control" id="projectName" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="status" class="form-label">Project Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="hold" {{ old('status') == 'hold' ? 'selected' : '' }}>Hold</option>
                    </select>
                </div>
            </div>


            <div class="mb-3">
                <label for="projectDescription" class="form-label">Project Description</label>
                <textarea class="form-control" id="projectDescription" name="description" rows="4">{{ old('description') }}</textarea>
            </div>


            <div class="mb-3">
                <label for="staff" class="form-label">Assign to Staff</label>
                <select class="form-control" id="staff" name="staff_id">
                    @foreach ($staff as $member)
                        <option value="{{ $member->id }}" {{ old('staff_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="fileUpload" class="form-label">File Upload</label>
                <input type="file" class="form-control" id="fileUpload" name="file">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
