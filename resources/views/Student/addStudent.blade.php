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
    Enter the required Student details
</div>
<div class="container" style="padding-top: 50px">
    <form method="post" action="{{ route('addStudent') }}">
        @csrf
        <div class="form-group">
            <label for="name">Enter Student Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Student Name">
            <small id="branch" class="form-text text-muted">Enter the respective branch .</small>
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="text" class="form-control" name="email"  id="email" aria-describedby="email" placeholder="Enter email">
            <small id="email" class="form-text text-muted">Enter your email address</small>
        </div>

        <div class="form-group">
            <label for="password">Enter password </label>
            <input type="password" class="form-control" name="password" placeholder="Enter password">
            <small id="password" class="form-text text-muted">Enter the password</small>
        </div>

      <div class="form-group">
            <label for="password_confirmation">Enter password </label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Re-enter the password">
            <small id="password_confirmation" class="form-text text-muted">Enter the respective semester number.</small>
        </div>

        <div class="form-group">
            <label for="address">Enter students address</label>
            <input type="text" class="form-control" name="address" placeholder="Enter address">
            <small id="address" class="form-text text-muted">Enter the respective address.</small>
        </div>

        <div class="form-group">
            <label for="phone">Enter students phone number</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter phone">
            <small id="phone" class="form-text text-muted">Enter the students phone number.</small>
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
