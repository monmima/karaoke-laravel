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
        <h1>Nés pour test</h1>
    </header>

    <form method="POST" name="edit-song" id="edit-song" action="/{{ $song->id }}/edit">
        <!-- cross-site request forgery -->
        @csrf
        <!-- because modern browsers/forms can only take two different methods -->
        @method('PUT')

        <p><input type="text" name="name" id="name" value="{{ $song->name }}" placeholder="name"></p>
        <p><input type="text" name="artist" id="artist" value="{{ $song->artist }}" placeholder="artist"></p>
        <p><input type="text" name="lyrics" id="lyrics" value="{{ $song->lyrics }}" placeholder="lyrics"></p>
        <p><input type="text" name="link" id="link" value="{{ $song->link }}" placeholder="link"></p>

        <!--BOUTONS-->
        <div class="espaces-boutons">
            <button type="reset" value="Reset">Reset</button>
            <button type="submit" value="Submit" class="bouton-bleu">Submit</button>
        </div>

    </form>






</body>
</html>
