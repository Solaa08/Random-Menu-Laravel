<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Type primaire</th>
            <th>Type secondaire</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ingredients as $ingredient)
        <tr>
            <td>{{$ingredient->nom}}</td>
            <td>{{$ingredient->type_primaire}}</td>
            <td>{{$ingredient->type_secondaire}}</td>
            <td><button class="btn btn-danger" onclick="delete_ingredient('{{$ingredient->id}}','{{$recette_id}}',this)">Supprimer</button></td>
        </tr>
    @endforeach
    </tbody>
</table>
