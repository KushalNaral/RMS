<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Class</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div class="container" style="padding-top: 25px">
    Enter the required Programme details
</div>
<div class="container" style="padding-top: 50px">

<form method="post" action="{{ route('addclass') }}">
    @csrf
    <div class="form-group">
        <label for="branch">Enter Branch Name</label>
        <input type="text" class="form-control" name="branch" placeholder="Enter Class Name">
        <small id="branch" class="form-text text-muted">Enter the respective branch .</small>
    </div>

    <div class="form-group">
        <label for="semester">Enter Semester Name</label>
        <input type="text" class="form-control" name="semester" placeholder="Enter Class Name">
        <small id="semester" class="form-text text-muted">Enter the respective semester number.</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>
