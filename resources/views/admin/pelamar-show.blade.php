<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <img src="{{ $data->upktp ? asset('storage/ktp/' . $data->upktp) : asset('dist/img/logo_bg.png') }}">
</body>

</html>
