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
            <a class="navbar-brand h1" href={{ route('catégorie.index') }}>CRUDPosts</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{route('catégorie.create')}}>Add Post</a>
                </div>
            </div>
    </nav>
    <form action="{{ route('catégorie.update', $catégorie->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" placeholder="nom" name="nom" value="{{$catégorie->nom}}" id="nom">
        <textarea name="description" placeholder="description" id="description" cols="30" rows="10">{{$catégorie->description}}</textarea>
        <button type="submit">envoyer</button>
    </form>
</body>

</html>
