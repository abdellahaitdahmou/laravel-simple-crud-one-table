<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('livres.index') }}>CRUD library</a>
    </nav>
    <form action="{{ route('livres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="entrer le titre de livre ..." name="titre">
        <select name="catégorie_id" class="form-control">
            <option value="">select catégorie name...</option>
            @foreach ($catégories as $catégorie)
                <option value="{{ $catégorie->id }}">{{ $catégorie->nom }}</option>
            @endforeach
        </select>
        <input type="number" value="" name="pages" placeholder="entrer le nombre des pages">
        <textarea name="description" id="description" name="description" cols="30" placeholder="entrer la description de livre ..." rows="10"></textarea>
        <input type="file" name="image" placeholder="upload image ...">
        <button>submit</button>
    </form>
</body>

</html>
