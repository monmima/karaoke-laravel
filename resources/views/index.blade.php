<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nés pour chanter</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
    <header>
        <h1>Nés pour chanter</h1>
    </header>

    <main>

        <section>
            <h3 class="hidden">List of Songs</h3>

            @foreach ($songs as $item)

                <article>
                    <h5>{{ $item->name }} by {{ $item->artist }}</h5>

                    <p><a href="/{{ $item->id }}/edit">Edit Entry</a></p>
                    <p>Name: {{ $item->name }}</p>
                    <p>Artist: {{ $item->artist }}</p>
                    <p>Link: {{ $item->link }}</p>

                    <div>
                        <span><a href="https://www.youtube.com/results?search_query={{ $item->artist }}+{{ $item->name }}">Lien de base</a> -</span>
                        <span><a href="https://www.youtube.com/results?search_query=lyrics+{{ $item->artist }}+{{ $item->name }}">Lyrics</a> -</span>
                        <span><a href="https://www.youtube.com/results?search_query=karaoke+{{ $item->artist }}+{{ $item->name }}">Karaoke</a></span>
                    </div>
                </article>

            @endforeach
        </section>

        <hr>

        <form method="POST" name="edit-song" id="edit-song" action="/create">
            <!-- cross-site request forgery -->
            @csrf
            <!-- because modern browsers/forms can only take two different methods -->

            <p><input type="text" name="name" id="name" placeholder="name"></p>
            <p><input type="text" name="artist" id="artist" placeholder="artist"></p>

            <p><textarea name="lyrics" id="lyrics" cols="30" rows="10" placeholder="lyrics"></textarea></p>

            <p><input type="text" name="link" id="link" placeholder="link"></p>

            <!--BOUTONS-->
            <div class="espaces-boutons">
                <button type="reset" value="Reset">Reset</button>
                <button type="submit" value="Submit" class="bouton-bleu">Submit</button>
            </div>
        </form>

    </main>





</body>
</html>
