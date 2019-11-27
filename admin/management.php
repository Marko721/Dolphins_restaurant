<?php include("includes/header.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
<?php include("includes/top_nav.php") ?>
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            

<?php include("includes/side_nav.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>




        <div id="page-wrapper">

        <div class="container-fluid">


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Upravljanje Stolovima
        </h1>

    
<div class="col-md-12">

<table class="table table-hover">
    <thead>
        <tr>
            <th>Broj Stola</th>
            <th>Konobar</th>
            <th>Prosecna ocena Konobara</th>
            <th>Ukupna zarada stola</th>
            <th>Izmeni Konobara</th>
        </tr>
    </thead>

    <tbody>

        <?php

if ($session->status == 'admin' || $session->status == 'superadmin') {
    $query = "SELECT stolovi.id, stolovi.broj_stolica, stolovi.zarada, stolovi.id_konobara, users.username as ime_konobara FROM stolovi JOIN users ON stolovi.id_konobara = users.id ";
    $stolovi = Sto::find_this_query($query);


    foreach ($stolovi as $sto) {
        echo "<tr>";
        echo "<td>{$sto->id}<img src='../includes/images/table.png' width=50px hspace=20px></td>";
        echo "<td>{$sto->ime_konobara}</td>";

        $query = "SELECT CAST(AVG(ocena) AS DECIMAL(10,1)) FROM ocene WHERE id_konobara = {$sto->id_konobara} ";
        $prosek = $database->query($query);
        $ocena = $prosek->fetch(PDO::FETCH_ASSOC);
        $ocena = array_values($ocena);
        //$ocena = mysqli_fetch_array($prosek);
        echo "<td>$ocena[0] <a href='ocene_konobara.php?id_konobara={$sto->id_konobara}' class='btn btn-info'>Vidi sve ocene</a></td>";



        echo "<td>{$sto->zarada} RSD</td>";
        echo "<td><a href='izmeni_konobara.php?id={$sto->id}' class='btn btn-primary'>Izmeni Konobara</a></td>";
        echo "</tr>";
    }

} else {

    echo "<p class='bg-danger'>Nemate pristup ovoj strani</p>";

}

echo "<p>{$session->message}</p>";

?>
       
       </tbody>
</table>
</div>


    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>