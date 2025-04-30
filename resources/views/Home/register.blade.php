<html lang="en">

<head>
    <title>Student Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            font-size: 15px;
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
            align-items: center;
            height: 100vh;
            /* Full viewport height */
            overflow: hidden;
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

    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card" style="width: 560px; border-radius: 20px; padding-right: 10px;">
            <div class="card-body">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h4>Student Information</h4>
                </div>
                <div class="row align-items-start">
                    <!-- first row -->
                    <!-- <form action="{{ route('route.register-guardian') }}" method="POST"> -->
                    <!-- form start -->
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="firstname" class="form-label">Firstname: </label>
                            <input type="text" id="firstname" class="form-control" placeholder="ex. Juan" required>
                        </div>
                        <div class="col-3">
                            <div class="dropdown" style="display: flex; flex-direction: column;">
                                <label for="suffix" class="form-label">Suffix:</label>
                                <button class="ddown btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="suffixButton">
                                    Select
                                </button>
                                <ul class="dropdown-menu" id="suffixMenu">
                                    <li><a class="dropdown-item" href="#" onclick="updateSuffix('Sr.')">Sr.</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="updateSuffix('Jr.')">Jr.</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="updateSuffix('')">N/A</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-3" style="padding-right: 0px;">
                            <div class="radio-btn" style="display: flex; flex-direction: column; width:75px">
                                <label for="sex">Sex:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="sex1" value="Male">
                                    <label class="form-check-label" for="sex1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="sex2" value="Female">
                                    <label class="form-check-label" for="sex2">Female</label>
                                </div>
                            </div>
                        </div>
                        <script>
                            function updateSuffix(value) {
                                const suffixButton = document.getElementById('suffixButton');
                                suffixButton.textContent = value;
                            }
                        </script>

                    </div>

                    <!-- second row -->
                    <div class="row">
                        <div class="col-6">
                            <label for="middlename" class="form-label">Middle name:</label>
                            <input type="text" id="middlename" class="form-control" placeholder="ex. Dela Cruz" required>
                        </div>
                        <div class="col-6" style="padding-right: 0px;">
                            <label for="dateofbirth" class="form-label">Date of Birth:</label>
                            <input type="date" id="dateofbirth" class="form-control">
                        </div>
                    </div>

                    <!-- third row -->
                    <div class="row">
                        <div class="col-6">
                            <label for="lastname" class="form-label">Lastname:</label>
                            <input type="text" id="lastname" class="form-control" placeholder="ex. Santos" required>
                        </div>
                        <div class="col-6" style="padding-right: 0px;">
                            <label for="contactnumber" class="form-label">Contact Number:</label>
                            <input type="text" id="contactnumber" class="form-control" minlength="11" maxlength="11" placeholder="09xxxxxxxxxx">
                        </div>
                    </div>

                    <!-- fourth row -->
                    <div class="row" style="padding-bottom: 5px;">
                        <div class="col-12" style="padding-right: 0px;">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" id="address" class="form-control" placeholder="ex. 1234 St. City" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col text-end">
                        <button type="button" class="btn btn-danger" style="border-radius: 10px;" onclick="clearForm()">Clear</button>
                        <a href="{{ route('route.register-guardian') }}" class="btn btn-primary" style="border-radius: 10px;">Next</a>
                        <!-- PARA MAGAMIT UG MA SAVE ANG INFO ILISA ANG A UG BUTTON. I UNCOMMENT ANG FORM, BUTANGIG SUBMIT -->
                    </div>
                </div>
                <!-- </form> -->
            </div>


        </div>
    </div>
    <!-- save form, when going back data still here -->
    <script>
        // List of form field IDs to persist
        const formFields = [
            'firstname',
            'middlename',
            'lastname',
            'contactnumber',
            'address',
            'dateofbirth',
            'sex1',
            'sex2'
        ];

        // Load saved data when page loads
        window.addEventListener('load', () => {
            formFields.forEach(id => {
                const el = document.getElementById(id);
                const savedValue = localStorage.getItem(id);

                if (el) {
                    if (el.type === 'radio') {
                        el.checked = savedValue === 'true';
                    } else {
                        el.value = savedValue || '';
                    }
                }
            });

            // Restore suffix from storage
            const suffix = localStorage.getItem('suffix');
            if (suffix) {
                updateSuffix(suffix);
            }
        });

        // Save inputs on change
        formFields.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', (e) => {
                    if (el.type === 'radio') {
                        localStorage.setItem(id, el.checked);
                    } else {
                        localStorage.setItem(id, e.target.value);
                    }
                });
            }
        });

        // Extend updateSuffix to save the value too
        function updateSuffix(value) {
            const suffixButton = document.getElementById('suffixButton');
            suffixButton.textContent = value;
            localStorage.setItem('suffix', value);
        }
    </script>

    <!-- clear -->
    <script>
        function clearForm() {
            const fields = [
                'firstname',
                'middlename',
                'lastname',
                'contactnumber',
                'address',
                'dateofbirth'
            ];

            fields.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.value = '';
            });

            // Clear radio buttons
            document.getElementById('sex1').checked = false;
            document.getElementById('sex2').checked = false;

            // Reset suffix
            document.getElementById('suffixButton').textContent = 'Select';

            // Clear localStorage
            const storageKeys = [
                'firstname',
                'middlename',
                'lastname',
                'contactnumber',
                'address',
                'dateofbirth',
                'sex1',
                'sex2',
                'suffix'
            ];
            storageKeys.forEach(key => localStorage.removeItem(key));
        }
    </script>

</body>


</html>