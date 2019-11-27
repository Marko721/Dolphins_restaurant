<?php include("includes/header.php"); ?>

<?php

$stolovi = Sto::find_all();

?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

            <div class="form-group">
            <img class="center-block" src="includes/images/logo1.png" alt="">
            </div>

            <div class="thumbnails row">

            <?php foreach($stolovi as $sto) : ?>

                <div class="col-xs-4 col-md-3">
                    <label for="sto">Sto broj <?php echo $sto->id; ?></label>
                    <a class="thumbnail" href="gost.php?id=<?php echo $sto->id; ?>&konobar=<?php echo $sto->id_konobara; ?>">
                    <img class="img-responsive" src="includes/images/table.png" alt="">
                    </a>

                </div>

            <?php endforeach; ?>

            </div>
    
            
          
         

            </div>





        <!-- /.row -->

<?php include("includes/footer.php"); ?>
