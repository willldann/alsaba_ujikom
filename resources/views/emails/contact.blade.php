<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan Kontak</title>
</head>
<body>
    <h2>Pesan dari {{ $data['name'] }}</h2>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Pesan:</strong></p>
    <p>{{ $data['message'] }}</p>

</body>
</html>