<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <title>Document</title>
</head>
<body>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.password.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Current Password</label>
                <input class="form-control" name="old_password" type="text">
            </div>
            <div class="form-group">
                <label for="">New Password</label>
                <input class="form-control" name="password" type="text">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input class="form-control" name="password_confirmation" type="text">
            </div>
            <div class="form-group">
                <input class="btn btn-sm btn-primary" name="submit" type="submit">
            </div>
        </form>
    </div>
</div>



<script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
