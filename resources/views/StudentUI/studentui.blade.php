<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p><strong>Name:</strong> {{ $role->student->studentID }}</p>

    <form method="POST" action="{{ route('student.logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

</body>

</html>