<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data Master</a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">

                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('employees.index') }} "
                            class="nav-link">Employee List</a></li>
                </ul>

                <hr class="d-lg-none text-white-50">

                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i
                        class="bi-person-circle me-1"></i>
                    My Profile</a>
            </div>
        </div>
    </nav>

    <div class="container-lg my-5"> <!-- Perbesar container -->
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-6 border"> <!-- Perbesar kolom -->
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Edit Employee</h4>
                </div>
                <hr>
                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstName" name="firstname"
                                value="{{ old('firstname', $employee->firstname) }}">
                            @error('firstname')
                            <div class="text-danger"> <small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastName" name="lastname"
                                value="{{ old('lastname', $employee->lastname) }}">
                            @error('lastname')
                            <div class="text-danger"> <small>{{ 'Last Name harus diisi.' }}</small></div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                value="{{ old('email', $employee->email) }}">
                            @error('email')
                            <div class="text-danger"> <small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age"
                                value="{{ old('age', $employee->age) }}">
                            @error('age')
                            <div class="text-danger"> <small>{{ 'Age harus diisi.' }}</small></div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <select class="form-select @error('position') is-invalid @enderror" id="position" name="position">
                            <option value="" disabled selected>Choose a position</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}"
                                    {{ old('position', $employee->position_id) == $position->id ? 'selected' : '' }}>
                                    {{ $position->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('position')
                        <div class="text-danger"> <small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12 d-grid">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="bi-save me-2"></i>Save Changes</button>
                        </div>
                        <div class="col-md-12 d-grid">
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i>Cancel</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
