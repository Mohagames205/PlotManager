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
</div>




</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    var table = $('#plot_table').DataTable();
    setInterval(function(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var plots = JSON.parse(this.response.replace(/&quot;/g,'"'));
                table.rows().remove().draw();
                plots.forEach((plot)=>{

                    var id = plot.id;
                    var plotname = plot.plot_name;
                    var plotowner = plot.plot_owner ? plot.plot_owner : "Geen eigenaar";
                    var plotmembers = JSON.parse(plot.plot_members).length > 0 ? JSON.parse(plot.plot_members).join(", ") : "Geen members";
                    var plotsize = JSON.parse(plot.plot_size).length > 1 ? JSON.parse(plot.plot_size)[0]+" x "+ JSON.parse(plot.plot_size)[1] : "error";
                    var plot_price = (plot.plot_price && plot.plot_price !== 0) ? plot.plot_price : "Niet te koop";


                    table.row.add([
                        id,plotname,plotowner,plotmembers,plotsize,plot_price
                    ]).draw();
                });


            }
        };
        xhttp.open("GET", "/ajax", true);
        xhttp.send();




    },5000);

</script>

</html>
