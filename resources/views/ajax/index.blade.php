<table id="plot_table" class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Owner</th>
        <th>Members</th>
        <th>Oppervlakte</th>
        <th>Prijs</th>

    </tr>
    </thead>
    <tbody id="tablecontent">

    @foreach($plots as $plot)
        <tr>
            <td>{{ $plot->plot_id }}</td>
            <td> {{ $plot->plot_name }}</td>
            <td> {{ $plot->plot_owner ? $plot->plot_owner : "Geen eigenaar" }} </td>
            <td> {{ join(", ", json_decode($plot->plot_members)) ?  join(", ", json_decode($plot->plot_members)) : "Geen leden" }}</td>
            <td> {{ json_decode($plot->plot_size)[0] }} x {{ json_decode($plot->plot_size)[1] }}</td>
            <td> {{$plot->plot_price ? $plot->plot_price : "Niet te koop" }} </td>
        </tr>

    @endforeach

    </tbody>

</table>
