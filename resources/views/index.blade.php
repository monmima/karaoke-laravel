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

    {{-- @foreach ($songs as $item)
        <p>This is user {{ $songs->artist }}</p>
    @endforeach

    {{ print_r($songs) }} --}}

    @foreach ($songs as $item)

        <p><a href="/{{ $item->id }}/edit">Edit Entry</a></p>
        <p>Name: {{ $item->name }}</p>
        <p>Artist: {{ $item->artist }}</p>
        <p>Link: {{ $item->link }}</p>
        <p>Lyrics: {{ $item->lyrics }}</p>

        <div>
            <span><a href="https://www.youtube.com/results?search_query={{ $item->artist }}+{{ $item->name }}">Lien de base</a> -</span>
            <span><a href="https://www.youtube.com/results?search_query=lyrics+{{ $item->artist }}+{{ $item->name }}">Lyrics</a> -</span>
            <span><a href="https://www.youtube.com/results?search_query=karaoke+{{ $item->artist }}+{{ $item->name }}">Karaoke</a></span>
        </div>

    @endforeach

</body>
</html>
