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


<?php

if(isset($_GET['id_konobara'])) {

    $id_konobara = $_GET['id_konobara'];
    $query = "SELECT ocene.id, ocene.ocena FROM ocene WHERE id_konobara = $id_konobara ";
    $db = $database->query($query);

}






?>


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Ocene konobara
        </h1>

    
<div class="col-md-2">

<table class="table table-hover">
    <thead>
        <tr>
            <th>Dobijene ocene konobara</th>
        </tr>
    </thead>

    <tbody>

<?php

    while($ocene = $db->fetch(PDO::FETCH_ASSOC)){

    $ocena = $ocene['ocena'];

    echo "<tr>";
    echo "<td>$ocena</td>";
    echo "</tr>";



}




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