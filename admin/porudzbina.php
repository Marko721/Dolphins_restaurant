<?php include("includes/header.php"); ?>

<?php

if(!$session->is_signed_in()) {
    redirect("login.php");
}

?>

<?php 

if(empty($_GET['id'])) {

    redirect("konobar.php");

}

$sto = Sto::find_sto_by_id($_GET['id']);

if (isset($_POST['update'])) {

    if ($sto) {
        $sto->poruceno    = $_POST['poruceno'];
        $sto->iznos_racuna   = $_POST['iznos'];
        $sto->zauzete_stolice = $_POST['zauzete_stolice'];
        $sto->naplaceno     = $_POST['naplaceno'];
        $sto->zarada += $_POST['iznos'];

        $sto->porudzbina();
        redirect("konobar.php");
    }
}






?>

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
            <small>Dodaj porudzbinu za sto broj <?php echo $sto->id ?></small>
        </h1>

        <form action="" method="post">

        <div class="col-md-12">
        
            <div class="form-group">
            <label for="broj stolica">Naziv Jela</label>
            <input type="text" name="poruceno" class="form-control">
            </div>

            <div class="form-group">
            <label for="broj stolica">Iznos Racuna</label>
            <input type="number" name="iznos" class="form-control">
            </div>


            <div class="form-group">
            <label for="broj stolica">Zauzet broj stolica</label>
            <select class="form-control" name="zauzete_stolice">
            <?php

            for($i=0; $i<=5; $i++) {
                echo "<option value={$i}>{$i}</option>";
            }

            ?>
            </select>
            </div>

            <div class="form-group">
            <label for="rezervacija">Naplaceno:</label>
        
            <input type="radio" name="naplaceno" value="1">Da
            <input type="radio" name="naplaceno" value="0">Ne

            </div>

            <div class="form-group">
            <input type="submit" name="update" value="Zavrsi porudzbinu" class="btn btn-primary btn " >
            </div>
            
        
        </div>

    </form>














    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>