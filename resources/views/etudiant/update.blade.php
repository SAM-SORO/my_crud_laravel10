<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD IN LARAVEL 10</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      </head>
<body>

    <div class="container">

        <div class="row">

            <div class="col s12">
                <h1>MODIFIER UN ETUDIANT LARAVEL-10</h1>
                <hr>

                {{-- on va utiliser la directive @if pour verifier s'il y'a une session status afin d'afficher le message d'ajout avec succès--}}
                @if (session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session('status')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- pour afficher les erreurs --}}
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger"> {{$error}} </li>
                    @endforeach
                </ul>

                <form action="/update/traitement" method="POST" autocomplete="off">
                    @csrf
                    {{-- cette directive est necessaire pour pouvoirenregistrer les données--}}
                    <input type="text" name="id" style="display: none" value="{{$etudiant->id}}">

                    <div class="form-group mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{$etudiant->nom}}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="prenom" class="form-label">prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{$etudiant->prenom}}">
                    </div>

                    <div class="form-grope mb-3">
                        <label for="classe" class="form-label">Classe</label>
                        <input type="text" class="form-control" id="classe" name="classe" value="{{$etudiant->classe}}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Modifier L'edutiant</button>
                    <br><br>
                    <a href="/etudiant" class="btn btn-danger">Revenir a la liste des étudiants</a>
                </form>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
