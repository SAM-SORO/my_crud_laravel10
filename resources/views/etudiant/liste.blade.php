<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD IN LARAVEL 10</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
<body>

    <div class="container text-center">

        <div class="row">

            <div class="col s12">
                <h1>CRUD LARAVEL 10</h1>
                <hr>
                    {{-- on va utiliser la directive @if pour verifier s'il y'a une session status afin d'afficher le message d'ajout avec succès--}}
                    @if (session('status'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{session('status')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <a href="/ajouter" class="btn btn-primary">Ajouter un étudiant</a>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Classe</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $ide = 1;
                        @endphp
                        @foreach ($etudiants as $etudiant)
                            <tr>
                                <td>{{$ide}}</td>
                                <th>{{$etudiant->nom}}</th>
                                <th>{{$etudiant->prenom}}</th>
                                <td>{{$etudiant->classe}}</td>
                                <td>
                                    <a href="/update-etudiant/{{$etudiant->id}}" class="btn btn-success">Update</a>
                                    <a href="/delete-etudiant/{{$etudiant->id}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @php
                                $ide += 1;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                {{ $etudiants->links()}}
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>



