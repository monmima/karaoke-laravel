<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nés pour chanter</title>
</head>
<body>
    <header>
        <h1>Nés pour chanter</h1>
    </header>

    @foreach ($songs as $item)
        <p>This is user {{ $item->id }}</p>
    @endforeach
</body>
</html>
