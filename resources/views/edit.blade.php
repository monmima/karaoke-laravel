<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nés pour chanter</title>

    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <header>
        <h1>Nés pour chanter</h1>
    </header>

    <form method="POST" name="edit-song" id="edit-song" action="/{{ $song->id }}/edit">
        <!-- cross-site request forgery -->
        @csrf
        <!-- because modern browsers/forms can only take two different methods -->
        @method('PUT')

        <p><input type="text" name="name" id="name" value="{{ $song->name }}" placeholder="name"></p>
        <p><input type="text" name="artist" id="artist" value="{{ $song->artist }}" placeholder="artist"></p>
        <textarea name="lyrics" id="lyrics" cols="30" rows="10">{{ $song->lyrics }}</textarea>

        <!-- create array of ticked boxes -->
        <?php $tickedArray = array() ?>

        <!-- push data to the array -->
        @foreach($song->categories as $tickedBox)
            <?php
                array_push($tickedArray, $tickedBox->title);
            ?>
        @endforeach

        <hr>

        <!-- compare and print the data -->
        @foreach($categories as $categorie)

            @if (in_array($categorie->title, $tickedArray))
                <input type="checkbox" id="{{ $categorie->id }}" name="{{ $categorie->id }}" value="{{ $categorie->title }}" checked>
                <label for="{{ $categorie->id }}">{{ $categorie["title"] }}</label><br>
            @else
                <input type="checkbox" id="{{ $categorie->id }}" name="{{ $categorie->id }}" value="{{ $categorie->title }}">
                <label for="{{ $categorie->id }}">{{ $categorie["title"] }}</label><br>
            @endif

        @endforeach

        <!--BOUTONS-->
        <div class="espaces-boutons">
            <button type="reset" value="Reset">Reset</button>
            <button type="submit" value="Submit" class="bouton-bleu">Submit</button>
        </div>
    </form>

    <hr>

    <form action="/{{ $song->id }}/delete" method="post">
        <input class="btn btn-default" type="submit" value="X" />
        @csrf
        @method('delete')
    </form>






</body>
</html>
