<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

$user = find('users', $id);

if (empty($id)) {
    die("ID not found");
}

$user = find('users', $id);

if (empty($user)) {
    die("User not found");
}

?>

<?php

require_once __DIR__ . "/../header.php";

?>

<div class="container">
    <table class="table">
        <tbody>
            <tr>
                <td><b>ID</b></td>
                <td><b><?php echo $user['ID']; ?></b></td>
            </tr>
            <tr>
                <td><b>Image</b></td>
                <td><img height="100px" src="../../uploads/<?php echo $user['Image'] ?>" alt=""></td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td><b><?php echo $user['Email'] ?></b></td>
            </tr>
            <tr>
                <td><b>Role</b></td>
                <td><b><?php echo $user['Role'] ?></b></td>
            </tr>
        </tbody>
    </table>
</div>



<?php

require_once __DIR__ . "/../footer.php";

?>