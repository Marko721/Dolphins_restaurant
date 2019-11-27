<?php include("includes/header.php"); ?>
<?php

if(!$session->is_signed_in()) {
    redirect("../index.php");
}
?>
</div>
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Admin
            <small>Korisnici</small>
        </h1>

        <a href="add_user.php" class="btn btn-primary">Dodaj Korisnika</a>
    
<div class="col-md-12">

<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Status</th>
            <th>Created by</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>

<?php

$query = "SELECT u.id , u.username, u.status, u.parent, u1.username as createdby from users u LEFT JOIN users u1 ON u.parent = u1.id ";

$users = User::find_this_query($query);

if($session->status == 'admin' || $session->status == 'superadmin') {

foreach($users as $user) {

    echo "<tr>";
        echo "<td>{$user->id}<img src='../includes/images/user.png' width=50px hspace=20px></td>";
        echo "<td>{$user->username}</td>";
        echo "<td>{$user->status}</td>";
        echo "<td>{$user->createdby}</td>";
        echo "<td><a href='delete_korisnik.php?id={$user->id}&createdby={$user->createdby}' class='btn btn-warning'>Delete</a></td>";
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
