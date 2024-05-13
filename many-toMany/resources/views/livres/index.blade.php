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
            <a class="navbar-brand h1" href="{{ route('livres.index') }}">CRUD library</a>
            <div class="justify-end">
                <div class="col">
                    <a class="btn btn-sm btn-primary me-2" href="{{ route('catégorie.index') }}">See Categories</a>
                    <a class="btn btn-sm btn-success" href="{{ route('livres.create') }}">Add Livres</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Categories</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Image</th>
                    <th>Catégorie</th>
                    <th>Pages</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livres as $livre)
                <tr>
                    <td>{{ $livre->id }}</td>
                    <td>{{ $livre->titre }}</td>
                    <td><img src="{{ asset($livre->image) }}" class="img-thumbnail w-50"/></td>
                    <td>{{ $livre->catégorie->nom }}</td>
                    <td>{{ $livre->pages }}</td>
                    <td>{{ $livre->description }}</td>
                    <td>
                        <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('livres.destroy', $livre->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
