<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Students</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container" style="padding-top: 25px">
    Enter the required Student details
</div>
<div class="container" style="padding-top: 50px">
    <form method="post" action="{{ route('loginStudent') }}">
        @csrf


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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
