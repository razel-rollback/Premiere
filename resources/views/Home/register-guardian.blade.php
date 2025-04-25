@extends ('layouts.head')
<html lang="en">
@include ('Home.css')


<head>
    <title>Student Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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
        <div class="card" style="width: 560px; border-radius: 20px;">
            <div class="card-body">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h4>Guardian Information</h4>
                </div>
                <div class="row align-items-start">
                    <!-- first row -->
                    <form action="" method="POST" onsubmit="localStorage.clear();">
                        <!-- form start -->
                        @csrf
                        <div class=" row">
                            <div class="col-6">
                                <label for="guardianfirstname" class="form-label">Firstname: </label>
                                <input type="text" id="guardianfirstname" class="form-control" placeholder="ex. Juan" required>
                            </div>
                            <div class="col-3">
                                <label for="relationship" class="form-label">Relationship:</label>
                                <input type="text" id="relationship" class="form-control" placeholder="ex. Mother" required>
                            </div>
                            <div class="col-3">
                                <div class="dropdown" style="display: flex; flex-direction: column;">
                                    <label for="guardiansuffix" class="form-label">Suffix:</label>
                                    <button class="ddown btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="guardiansuffix">
                                        Select
                                    </button>
                                    <ul class="dropdown-menu" id="suffixMenu">
                                        <li><a class="dropdown-item" href="#" onclick="updateSuffix('Sr.')">Sr.</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="updateSuffix('Jr.')">Jr.</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="updateSuffix('')">N/A</a></li>

                                    </ul>
                                </div>
                                <script>
                                    function updateSuffix(value) {
                                        const suffixButton = document.getElementById('guardiansuffix');
                                        suffixButton.textContent = value;
                                    }
                                </script>
                            </div>
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

                        <a href="{{ route('route.register') }}" class="btn btn-primary" style="border-radius: 10px;" onclick="saveFormData()">Back</a>
                        <a href="#" class="btn btn-primary" style="border-radius: 10px;" type="SUBMIT">Done</a>
                    </div>
                </div>
            </div>
            </form>
            <!-- end of form -->

        </div>
    </div>
    <!-- clear -->
    <script>
        function clearForm() {
            // Reset all form fields
            document.querySelector('form').reset();

            // Remove values from localStorage
            const fields = [
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
            fields.forEach(key => localStorage.removeItem(key));

            // Reset suffix dropdown text
            document.getElementById('suffixButton').textContent = 'Select';
        }
    </script>
</body>

</html>