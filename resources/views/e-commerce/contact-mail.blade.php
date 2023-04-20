<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact form</title>
</head>
<body>
        <div
        style="margin-right: 40px">
            <h1>Contact Message</h1>
            <p><strong>Name:</strong> {{ $user['name'] }}</p>
            <p><strong>email:</strong> {{ $user['email'] }}</p>
            <p><strong>subject:</strong> {{ $user['subject'] }}</p>
            <p><strong>phone:</strong> {{ $user['phone'] }}</p>
            <p><strong>message:</strong> {{ $user['message'] }}</p>
        </div>
</body>
</html>
