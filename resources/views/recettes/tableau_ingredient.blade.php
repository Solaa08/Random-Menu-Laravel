<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Type primaire</th>
            <th>Type secondaire</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ingredients as $ingredient)
        <tr>
            <td>{{$ingredient->nom}}</td>
            <td>{{$ingredient->type_primaire}}</td>
            <td>{{$ingredient->type_primaire}}}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
