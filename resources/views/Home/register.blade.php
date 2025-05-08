<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* general */

        .navbar .logo {
            align-items: center;
        }

        .navbar .logo img {
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        header .logo {
            display: flex;
            align-items: center;
        }

        header .logo img {
            height: 40px;
            margin-right: 10px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        body .navbar {
            background-color: rgba(26, 26, 26, 0.8);
            color: #D4AF37;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(6px);
            z-index: 10000;
            display: flex;
            align-items:
                center;
            justify-content:
                space-between;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .footer-block {
            display: flex;
            height: 100px;

        }

        .footer-block .left {
            background-color: #1A1A1A;
            color: #D4AF37;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .footer-block .right {
            background-color: #2E2E2E;
            color: #f7df75;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .footer-block>div {
            flex: 1;
        }


        /* Hero content */
        .hero {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-around;
            background: url('/images/school-building.png') no-repeat center center / cover;
            color: white;
            padding: 100px 40px;
            z-index: 1;
        }

        /* pic animation */
        .hero-image img {
            position: absolute;
            top: 110px;
            right: 800px;
            width: 650px;
            height: auto;
            max-height: 750px;
            z-index: 2;
            animation: fadeSlideUp 1s ease-out;
            animation-fill-mode: both;
            animation-delay: 0.1s;
            opacity: 0;
        }

        .hero::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .hero-content {
            max-width: 500px;
            position: relative;
            z-index: 2;
            text-align: center;
            color: #FFFFFF;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .hero-content h2 {
            color: #f7df75;
            margin-bottom: 10px;
            max-height: 400px;
            animation: fadeSlideUp 1s ease-out;
            animation-fill-mode: both;
            animation-delay: 0.1s;
        }

        .hero-content h1 {
            font-size: 32px;
            margin-bottom: 15px;
            max-height: 400px;
            animation: fadeSlideUp 1s ease-out;
            animation-fill-mode: both;
            animation-delay: 0.1s;
        }

        .hero-content p {
            font-size: 20px;
            line-height: 1.6;
        }

        .hero-content button {
            width: 100%;
            max-width: 150px;
            height: 40px;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f7df75;
            border: none;
            cursor: pointer;
            font-size: 100%;
            font-weight: bold;
            border-radius: 5px;
        }

        .hero-content p,
        .hero-content button {
            animation: fadeSlideUp 1s ease-out;
            animation-fill-mode: both;
            animation-delay: 0.1s;
            opacity: 0;
        }

        .hero-content button {
            animation-delay: 0.1s;
        }


        @keyframes fadeSlideUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }


        #about {
            position: relative;
            background: url('../images/school-building.png') center center / cover no-repeat;
            padding: 160px 20px 100px;
            color: white;
            overflow: hidden;
        }

        /*register blade*/
        .register-body {
            margin: 0;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            /* Align items at the top */
            min-height: 100vh;
            /* Allow content to grow beyond the viewport */
            overflow: auto;
            /* Enable scrolling */
            padding: 20px;/
        }

        .register-body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('../images/school-building.png') center center / cover no-repeat;
            filter: blur(6px);
            /* Apply blur only to the background */
            z-index: 0;
            /* Ensure it stays behind the content */
        }

        .register-body .card {
            position: relative;
            z-index: 1;
            /* Ensure the card is above the blurred background */
            background: rgba(255, 255, 255, 0.9);
            /* Add slight transparency for better contrast */
            border-radius: 20px;
            animation: fadeSlideUp 1s ease-out;
            animation-fill-mode: both;
            animation-delay: 0.1s;
        }

        .register-body input {
            border-radius: 20px;
        }

        .register-body .ddown {
            border-radius: 20px;
        }
    </style>
</head>

<body class="register-body row">
    <header>
        <div class="navbar">

            <div class="logo">
                <img src="{{ asset('images/Premire.png') }}"
                    alt="Logo" class="img-fluid rounded-circle"
                    width="50">
                <span>PREMIERE</span>
            </div>
            <nav>
                <a href="{{route('home.index')}}"> Home</a>
            </nav>
        </div>
    </header>

    <div class="container d-flex flex-column align-items-center justify-content-center py-5 " style="margin-top: 80px;">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->
        <div class="row h-100">
            <div class="col">
                <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="row mb-4">
                        @csrf
                        <div class="col">
                            <!-- Student Card -->
                            <div class="card" style="width: 600px; border-radius: 20px; padding-right: 10px;">
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h4>Student Information</h4>
                                        <p class="secondary"><small> please fill out the information </small></p>
                                    </div>
                                    <div class="row align-items-start">
                                        <!-- first row -->
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="firstname" class="form-label">Firstname: </label>
                                                <input name="student_first_name" type="text" id="firstname" class="form-control" placeholder="ex. Juan" value="{{ old('student_first_name') }}">
                                                @error('student_first_name')
                                                <div class="text-danger"><small>{{ $message }}</small> </div>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="dropdown" style="display: flex; flex-direction: column;">
                                                    <label for="suffix" class="form-label">Suffix:</label>
                                                    <select id="suffixSelect" class="form-select" name="student_suffix">
                                                        <option value="">N/A</option>
                                                        <option value="Sr." {{ old('student_suffix') == 'Sr.' ? 'selected' : '' }}>Sr.</option>
                                                        <option value="Jr." {{ old('student_suffix') == 'Jr.' ? 'selected' : '' }}>Jr.</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3" style="padding-right: 0px;">
                                                <div class="radio-btn" style="display: flex; flex-direction: column; width:75px">
                                                    <label for="sex">Sex:</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="student_sex" id="sex1" value="Male" {{ old('student_sex') == 'Male' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="sex1">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="student_sex" id="sex2" value="Female" {{ old('student_sex') == 'Female' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="sex2">Female</label>
                                                    </div>
                                                </div>
                                                @error('student_sex')
                                                <div class="text-danger"><small>this is require</small> </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- second row -->
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="middlename" class="form-label">Middle name:</label>
                                                <input name="student_middle_name" type="text" id="middlename" class="form-control" placeholder="ex. Dela Cruz" value="{{ old('student_middle_name') }}">
                                                @error('student_middle_name')
                                                <div class="text-danger"><small>{{ $message }}</small> </div>
                                                @enderror
                                            </div>
                                            <div class="col-6" style="padding-right: 0px;">
                                                <label for="dateofbirth" class="form-label">Date of Birth:</label>
                                                <input name="student_birthdate" type="date" id="dateofbirth" class="form-control" value="{{ old('student_birtdate') }}">
                                                @error('student_birthdate')
                                                <div class="text-danger"><small>{{ $message }}</small> </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- third row -->
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="lastname" class="form-label">Lastname:</label>
                                                <input name="student_last_name" type="text" id="lastname" class="form-control" placeholder="ex. Santos" value="{{ old('student_last_name') }}">
                                                @error('student_last_name')
                                                <div class="text-danger"><small>{{ $message }}</small> </div>
                                                @enderror
                                            </div>
                                            <div class="col-6" style="padding-right: 0px;">
                                                <label for="contactnumber" class="form-label">Contact Number:</label>
                                                <input name="student_contactNumber" type="text" id="contactnumber" class="form-control" placeholder="09xxxxxxxxxx" value="{{ old('student_contactNumber') }}">
                                                @error('student_contactNumber')
                                                <div class="text-danger"><small>{{ $message }}</small> </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- fourth row -->
                                        <div class="row" style="padding-bottom: 5px;">
                                            <div class="col-12" style="padding-right: 0px;">
                                                <label for="address2" class="form-label">Email Address:</label>
                                                <input name="student_email" type="text" id="address2" class="form-control" placeholder="ex. juan@gmail.com" value="{{ old('student_email') }}">
                                                @error('student_email')
                                                <div class="text-danger"><small>{{ $message }}</small> </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row" style="padding-bottom: 5px;">
                                            <div class="col-12" style="padding-right: 0px;">
                                                <label for="address3" class="form-label">Address:</label>
                                                <input name="student_address" type="text" id="address3" class="form-control" placeholder="ex. 1234 St. City" value="{{ old('student_address') }}">
                                                @error('student_address')
                                                <div class="text-danger"><small>{{ $message }}</small> </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <!-- Guardian Card -->
                            <div class="card" style="width: 600px; border-radius: 20px;">
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h4>Guardian Information</h4>
                                        <p class="secondary"><small> please fill out the information </small></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="guardianfirstname" class="form-label">Firstname:</label>
                                            <input name="guardian_FirstName" type="text" id="guardianfirstname" class="form-control" placeholder="ex. Juan" value="{{ old('guardian_FirstName') }}">
                                            @error('guardian_FirstName')
                                            <div class="text-danger"><small>{{ $message }}</small> </div>
                                            @enderror
                                        </div>
                                        <div class="col-3">
                                            <label for="relationship" class="form-label">Relationship:</label>
                                            <input name="guardian_Relation" type="text" id="relationship" class="form-control" placeholder="ex. Mother" value="{{ old('guardian_Relation') }}">
                                            @error('guardian_Relation')
                                            <div class="text-danger"><small>{{ $message }}</small> </div>
                                            @enderror
                                        </div>
                                        <div class="col-3">
                                            <div class="dropdown" style="display: flex; flex-direction: column;">
                                                <label for="guardiansuffix" class="form-label">Suffix:</label>
                                                <select id="suffixSelect" class="form-select" name="guardian_suffix">
                                                    <option value="">N/A</option>
                                                    <option value="Sr." {{ old('guardian_suffix') == 'Sr.' ? 'selected' : '' }}>Sr.</option>
                                                    <option value="Jr." {{ old('guardian_suffix') == 'Jr.' ? 'selected' : '' }}>Jr.</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="gmiddlename" class="form-label">Middle name:</label>
                                            <input name="guardian_MiddleName" type="text" id="gmiddlename" class="form-control" placeholder="ex. Dela Cruz" value="{{ old('guardian_MiddleName') }}">
                                            @error('guardian_MiddleName')
                                            <div class="text-danger"><small>{{ $message }}</small> </div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="dateofbirth" class="form-label">Date of Birth:</label>
                                            <input name="guardian_BirthDate" type="date" id="dateofbirth" class="form-control" value="{{ old('guardian_BirthDate') }}">
                                            @error('guardian_BirthDate')
                                            <div class="text-danger"><small>{{ $message }}</small> </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="lastname" class="form-label">Lastname:</label>
                                            <input name="guardian_LastName" type="text" id="lastname" class="form-control" placeholder="ex. Santos" value="{{ old('guardian_LastName') }}">
                                            @error('guardian_LastName')
                                            <div class="text-danger"><small>{{ $message }}</small> </div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="contactnumber" class="form-label">Contact Number:</label>
                                            <input name="guardian_Phone" type="text" id="contactnumber" class="form-control" placeholder="09xxxxxxxxxx" value="{{ old('guardian_Phone') }}">
                                            @error('guardian_Phone')
                                            <div class="text-danger"><small>{{ $message }}</small> </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="guardian_email1" class="form-label">Email Address:</label>
                                            <input name="guardian_Email" type="text" id="guardian_email1" class="form-control" placeholder="ex. John@gmail.com" value="{{ old('guardian_Email') }}">
                                            @error('guardian_Email')
                                            <div class="text-danger"><small>{{ $message }}</small> </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="address" class="form-label">Address:</label>
                                            <input name="guardian_Address" type="text" id="address" class="form-control" placeholder="ex. 1234 St. City" value="{{ old('guardian_Address') }}">
                                            @error('guardian_Address')
                                            <div class="text-danger"><small>{{ $message }}</small> </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="card" style="width: 600px; border-radius: 20px;">
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h4>Academic Information</h4>
                                        <p class="secondary"><small> please fill out the information </small></p>
                                        <div class="col-8">
                                            <label for="student_user" class="form-label">Username:</label>
                                            <input name="student_username" type="text" id="student_user" class="form-control" placeholder="ex. John@gmail.com" value="{{ old('student_username') }}">
                                            @error('student_username')
                                            <div class="text-danger"><small>{{ $message }}</small> </div>
                                            @enderror
                                        </div>
                                        <div class="col-8">
                                            <label for="student_pass" class="form-label">Password:</label>
                                            <input name="student_password" type="password" id="student_pass" class="form-control" placeholder="ex. John@gmail.com" value="{{ old('student_password') }}">
                                            @error('student_password')
                                            <div class="text-danger"><small>{{ $message }}</small> </div>
                                            @enderror
                                        </div>
                                        <div class="col-8">
                                            <label for="student_pass_confirm" class="form-label">Confirm Password:</label>
                                            <input name="student_password_confirmation" type="password" id="student_pass_confirm" class="form-control" placeholder="Re-enter password">
                                            @error('student_password_confirmation')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>
                                        <!-- Strand Dropdown -->
                                        <div class="row mb-2">
                                            <div class="col-auto">
                                                <div class="form-group">
                                                    <label for="strand">Strand:</label>
                                                    <select name="strand" id="strand" class="form-control">
                                                        <option value="">Select Strand</option>
                                                        @foreach($strands as $strand)
                                                        <option value="{{ $strand->strandID }}" {{ old('strand') == $strand->strandID ? 'selected' : '' }}>{{ $strand->strandName }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('strand')
                                                    <div class="text-danger"><small>{{ $message }}</small> </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-auto"> <!-- Grade Level Dropdown -->
                                                <div class="form-group">
                                                    <label for="gradeLevel">Grade Level:</label>
                                                    <select name="gradeLevel" id="gradeLevel" class="form-control">
                                                        <option value="">Select Grade Level</option>
                                                        @foreach($gradeLevels as $gradeLevel)
                                                        <option value="{{ $gradeLevel->gradeLevelID }}" {{ old('gradeLevel') == $gradeLevel->gradeLevelID ? 'selected' : '' }}>{{ $gradeLevel->gradeLevelName }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('gradeLevel')
                                                    <div class="text-danger"><small>{{ $message }}</small> </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group mb-2">
                                            <label for="birthCert">Upload Birth Certificate:</label>
                                            <input type="file" name="birthCert" id="birthCert" class="form-control" accept="image/jpeg,image/png" required>
                                            <small class="text-muted">Accepted formats: JPG, PNG. Max size: 2MB.</small>
                                            @error('birthCert') <!-- Fixed to match input name -->
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="form137">Upload Form 137:</label>
                                            <input type="file" name="form137" id="form137" class="form-control" accept="image/jpeg,image/png" required>
                                            <small class="text-muted">Accepted formats: JPG, PNG. Max size: 2MB.</small>
                                            @error('form137')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <input type="submit" value="Register" class="btn btn-primary mt-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>