<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Track;
use App\Models\Strand;

use App\Models\Student;
use App\Models\Guardian;
use App\Models\Register;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    // add lg in email student and guardian
    //database
    //form
    public function index()
    {

        // Fetch data from the database using your models
        $strands = Strand::all(); // Fetch all strands
        $gradeLevels = GradeLevel::all(); // Fetch all grade levels

        // Pass the data to the view
        return view('Home.register', compact('strands', 'gradeLevels'));
    }
    public function store(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            // Student Information
            'student_first_name' => 'required|string|max:255',
            'student_sex' => 'required|in:Male,Female',
            'student_middle_name' => 'nullable|string|max:255',
            'student_birthdate' => 'required|date',
            'student_last_name' => 'required|string|max:255',
            'student_contactNumber' => 'required|string|min:11|max:11',
            'student_email' => 'required|string|email|max:255|unique:students,email',
            'student_address' => 'required|max:255',
            'student_suffix' => 'nullable|string|max:255',

            // Guardian Information
            'guardian_FirstName' => 'required|string|max:255',
            'guardian_Relation' => 'required|string|max:50',
            'guardian_MiddleName' => 'required|string|max:255',
            'guardian_BirthDate' => 'required|date',
            'guardian_LastName' => 'required|string|max:255',
            'guardian_Phone' => 'required|string|min:11|max:11',
            'guardian_Email' => 'required|string|email|max:255|unique:guardians,email',
            'guardian_Address' => 'required|max:255',
            'guardian_suffix' => 'nullable|string|max:255',

            // Academic Information
            'student_username' => 'required|string|max:255|unique:roles,username',
            'student_password' => 'required|string|min:8|confirmed',
            'strand' => 'required|exists:strands,strandID',
            'gradeLevel' => 'required|exists:grade_levels,gradeLevelID',

            // File Uploads
            'birthCert' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'form137' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle Guardian Creation
        $role = Role::create([
            'username' => $validated['student_username'],
            'password' => Hash::make($validated['student_password']),
            'userType' => 'student',
        ]);

        $guardian = Guardian::create([
            'guardianFirstName' => $validated['guardian_FirstName'],
            'guardianMiddleName' => $validated['guardian_MiddleName'],
            'guardianLastName' => $validated['guardian_LastName'],
            'guardianSuffixName' => $validated['guardian_suffix'],
            'guardianBirthDate' => $validated['guardian_BirthDate'],
            'guardianRelation' => $validated['guardian_Relation'],
            'guardianPhone' => $validated['guardian_Phone'],
            'guardianAddress' => $validated['guardian_Address'],
            'email' => $validated['guardian_Email'],
        ]);

        // Handle File Uploads
        $birthCertPath = $request->file('birthCert')->store('uploads/birth_certificates', 'public');
        $form137Path = $request->file('form137')->store('uploads/form_137', 'public');

        // Handle Student Creation
        $student = Student::create([
            'firstName' => $validated['student_first_name'],
            'middleName' => $validated['student_middle_name'],
            'lastName' => $validated['student_last_name'],
            'suffixName' => $validated['student_suffix'],
            'birthDate' => $validated['student_birthdate'],
            'gender' => $validated['student_sex'],
            'address' => $validated['student_address'],
            'contactNumber' => $validated['student_contactNumber'],
            'status' => 'Pending',
            'gradeLevelID' => $validated['gradeLevel'],
            'strandID' => $validated['strand'],
            'email' => $validated['student_email'],
            'roleID' => $role->roleID,
            'guardianID' => $guardian->guardianID,
        ]);

        $student->documents()->createMany([
            [
                'documentType' => 'Birth Certificate',
                'documentPath' => $birthCertPath,
                'documentStatus' => 'Pending',
                'UploadDate' => now(),
            ],
            [
                'documentType' => 'Form 137',
                'documentPath' => $form137Path,
                'documentStatus' => 'Pending',
                'UploadDate' => now(),
            ],
        ]);
        // Handle Registration Creation
        Register::create([
            'studentID' => $student->studentID,
            'status' => 'Pending',
        ]);


        return redirect()->route('home.index')->with('success', 'Registration successful!');
    }
}
