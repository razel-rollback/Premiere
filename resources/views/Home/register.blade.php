<!DOCTYPE html>
<html lang="en">
@include ('Home.css')

<head>
    <title>Student Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body class="register-body row">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card" style="width: 560px; border-radius: 20px;">
            <div class="card-body">
                <h4>Student Information</h4>
                <div class="row align-items-start">
                    <!-- first row -->
                    <div class="row">
                        <div class="col-6">
                            <label for="firstname" class="form-label">Firstname: </label>
                            <input type="text" id="firstname" class="form-control">
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
                            <input type="text" id="middlename" class="form-control">
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
                            <input type="text" id="lastname" class="form-control">
                        </div>
                        <div class="col-6" style="padding-right: 0px;">
                            <label for="contactnumber" class="form-label">Contact Number:</label>
                            <input type="text" id="contactnumber" class="form-control" minlength="11" maxlength="11">
                        </div>
                    </div>

                    <!-- fourth row -->
                    <div class="row" style="padding-bottom: 5px;">
                        <div class="col-12" style="padding-right: 0px;">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" id="address" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Guardian Information</h4>
            </div>
        </div>
    </div>
</body>

</html>