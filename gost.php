<?php include("includes/header.php"); ?>

<?php

if (isset($_GET['id'])) {

    $sto_id = $_GET['id'];
    $query = "SELECT stolovi.id, stolovi.broj_stolica, stolovi.zarada, users.username as id_konobara FROM stolovi JOIN users ON stolovi.id_konobara = users.id WHERE stolovi.id = $sto_id ";
    $konobari = Sto::find_this_query($query);

}

if(isset($_POST['oceni'])) {

    $ocena = $_POST['ocena'];
    $id_konobara = $_GET['konobar'];

    $query = "INSERT INTO ocene (ocena, id_konobara) VALUES ($ocena, $id_konobara)";
    $import = $database->query($query);


}

?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

            
            <div class="form-group">
            <img class="center-block" src="includes/images/logo1.png" alt="">
            </div>

            

            <div class="col-md-6">
                <div class="form-group">
                <h3>Vas sto broj <?php if(isset($sto_id)) {echo $sto_id;}  ?> trenutno sluzi konobar -  
                <?php
                    if (isset($konobari)) {
                        foreach ($konobari as $konobar) {
                            echo $konobar->id_konobara;
                        }
                    }
                ?>
                </h3>
            
            </div>

            <form action="" method="post">
            <div class="form-group">
                <label for="ocena">Ocenite konobara</label>
                <?php for($i=1; $i<=5; $i++) {
                    echo " $i <input type='radio' name='ocena' value=$i> ";
                }
                ?>
                <input type="submit" name="oceni" value="Oceni" class="btn btn-primary btn "> 
            </div>
            </div>
            </form>

            <div class="col-md-6">
            <img class="img-responsive" src="includes/images/table.png" alt="">
            </div>


    
            
          
         

            </div>





        <!-- /.row -->

<?php include("includes/footer.php"); ?>
