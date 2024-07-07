<!DOCTYPE html>
<html>
<head>
    <title>Registered Successfully</title>
</head>
<body>
    <h4>Hello, {{ $data['firstname'] }}  {{ $data['lastname'] }}.</h4>
    <p>Thank you for your registration! Your queue is <b>{{ $data['queue'] }}</b>.</p>
</body>
</html>
