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
            <a class="navbar-brand h1" href={{ route('catégorie.index') }}>CRUD library</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-primary" href={{ route('livres.index') }}>see livres</a>
                </div>
            </div>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('catégorie.create') }}>Add catégorie</a>
                </div>
            </div>
    </nav>
    <div>
        <h1>categories</h1>
        <table>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>description</th>
                <th>actions</th>
            </tr>
            @foreach ($catégories as $catégorie)
                <tr>
                    <td>{{ $catégorie->id }}</td>
                    <td>{{ $catégorie->nom }}</td>
                    <td>{{ $catégorie->description }}</td>
                    <td>
                        <a href="{{ route('catégorie.edit', $catégorie->id) }}" class="btn">Edit</a>
                        <form action="{{ route('catégorie.destroy', $catégorie->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
</body>

</html>
