<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="style/welcome.css">

    <!-- Bootstrap -->

    <title>TDB - Plots</title>
</head>
<body class="container mt-3">
<div id="content">
    <h1> TDB PlotIndex</h1>
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
                <td> {{ !empty(join(", ", json_decode($plot->plot_members, true))) ? join(", ", json_decode($plot->plot_members, true)) : "Geen leden" }}</td>
                <td> {{ json_decode($plot->plot_size, true)[0] }} x {{ json_decode($plot->plot_size, true)[1] }}</td>
                <td> {{$plot->plot_price ? $plot->plot_price : "Niet te koop" }} </td>
            </tr>

        @endforeach

        </tbody>

    </table>
</div>




</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    var table = $('#plot_table').DataTable();
</script>

</html>
