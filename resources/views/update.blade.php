<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
</head>
<body>
    
    <form action="{{route('user-update')}}" method="POST">
        @csrf
        <input type="text" name="id" placeholder=" enter id"><br>
        <input type="text" name="name" placeholder=" enter name"><br>
        <input type="text" name="address" placeholder=" enter address"><br>
        <input type="submit" value="OKK">

    </form>
</body>
</html>
