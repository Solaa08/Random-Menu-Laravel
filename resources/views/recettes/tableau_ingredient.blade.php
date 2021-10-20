<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Type primaire</th>
            <th>Type secondaire</th>
            @can('delete_ingredient')
            <th>Action</th>
            @endcan
        </tr>
    </thead>
    <tbody>
    @foreach($ingredients as $ingredient)
        <tr>
            <td>{{$ingredient->nom}}</td>
            <td>{{$ingredient->type_primaire}}</td>
            <td>{{$ingredient->type_secondaire}}</td>
            @can('delete_ingredient')
            <td><button class="btn btn-danger" onclick="delete_ingredient('{{$ingredient->id}}','{{$recette_id}}',this)">Supprimer</button></td>
            @endcan
        </tr>
    @endforeach
    </tbody>
</table>
