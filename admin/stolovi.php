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
            Stolovi
        </h1>

<a href="add_sto.php" class="btn btn-primary">Dodaj sto</a>
    
<div class="col-md-12">

<table class="table table-hover">
    <thead>
        <tr>
            <th>Broj Stola</th>
            <th>Broj Stolica</th>
            <th>Azuriraj Sto</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>

        <?php

if ($session->status == 'admin' || $session->status == 'superadmin') {
    $stolovi = Sto::find_all();

    foreach ($stolovi as $sto) {
        echo "<tr>";
        echo "<td>{$sto->id}<img src='../includes/images/table.png' width=50px hspace=20px></td>";
        echo "<td>{$sto->broj_stolica}</td>";
        echo "<td><a href='edit_sto.php?id={$sto->id}'  class='btn btn-primary'>Edit</a></td>";
        echo "<td><a href='delete_sto.php?id={$sto->id}' class='btn btn-warning'>Delete</a></td>";
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