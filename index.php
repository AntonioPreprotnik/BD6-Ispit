<?php
    include 'classes/db.php';

    $init_db = new Database();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(empty($_POST['voce'])) {
            Header('Loction: index.php');
        }

        $init_db->insert($_POST);
    }

    $voca = $init_db->get_all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

    <hr>
    <form action="" method="post">
        <input type="text" name="voce" placeholder="Upisi voce">
        <br>
        <input type="submit" value="Spremi">
    </form>
    <hr>
    <br><br>
    <h2>Ispis voca po broju</h2>

    <?php if(!empty($voca)): ?>
        <table border="1">
            <tr>
                <th>#</th>
                <th>Voce</th>
                <th>Akcije</th>
            </tr>
            <?php foreach($voca as $voce): ?>
                <tr>
                    <td><?php echo $voce['id']; ?></td>
                    <td><?php echo $voce['voce']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $voce['id']; ?>">Ažuriraj</a> | 
                        <a href="delete.php?id=<?php echo $voce['id']; ?>">Izbriši</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <hr>
    <br>
    <br>
    <br>
    Ovo je dodao predavač za provjeru implementacije i konfiguracije CI/CD dijela ispita.
</body>
</html>
