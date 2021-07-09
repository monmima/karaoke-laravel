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

        <p><a href="/categories" title="Catégories de chansons">Voir les catégories</a>
    </header>

    <main>

        <section>
            <h3 class="hidden">List of Songs</h3>

            @foreach ($songs as $item)

                <article>
                    <div class="title-and-x-close-button">
                        <h5>{{ $item->name }} by {{ $item->artist }}</h5>

                        <!-- delete form/button -->
                        <form action="/{{ $item->id }}/delete" method="post">
                            <input class="btn btn-default" type="submit" value="X" />
                            @csrf
                            @method('delete')

                            <p><a class="edit" title="Edit" href="/{{ $item->id }}/edit">✍️</a></p>
                        </form>

                        {{-- Catégorie(s):
                        @foreach($item->categories as $categorie)
                            - {{ $categorie["name"] }}
                        @endforeach</a> --}}
                    </div>

                    <div class="buttons">
                        <a rel="noopener noreferrer" href="https://www.youtube.com/results?search_query=lyrics+{{ $item->artist }}+{{ $item->name }}">Lyrics</a>
                        <a rel="noopener noreferrer" href="https://www.youtube.com/results?search_query=karaoke+{{ $item->artist }}+{{ $item->name }}">Karaoke</a>
                    </div>
                </article>

            @endforeach
        </section>

        <aside>
            <h3>Create New Entry</h3>

            <form method="POST" name="edit-song" id="edit-song" action="/create">
                <!-- cross-site request forgery -->
                @csrf
                <!-- because modern browsers/forms can only take two different methods -->

                <p><input type="text" name="name" id="name" placeholder="name"></p>
                <p><input type="text" name="artist" id="artist" placeholder="artist"></p>

                <p><textarea name="lyrics" id="lyrics" cols="30" rows="10" placeholder="lyrics"></textarea></p>

                <!--BOUTONS-->
                <div class="espaces-boutons">
                    <button type="reset" value="Reset">Reset</button>
                    <button type="submit" value="Submit" class="bouton-bleu">Submit</button>
                </div>
            </form>
        </aside>

    </main>





</body>
</html>
