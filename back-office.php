<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Back-office</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <?php
            //database connection
            $conn = new mysqli("localhost","root","","restaurant2.0");

            //on ecrit la requete
            $requete = "SELECT * FROM `contact` ORDER BY `created_at` DESC";

            //on execute la requete
            $result = $conn->query($requete);

            if (!$result){
                echo "la recuperation des donnees a rencontree un probleme";
            } else {
                $nbre_messages = $result->num_rows;
            }
        ?>
        <h3>Tous nos messages</h3>
        <h4>Il y a <?=$nbre_messages?> messages</h4>
        <table>
            <tr>
                <th>Numéro de client</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Created at</th>
                <th>Delete</th>
            </tr>
            <?php
            while($ligne = $result->fetch_assoc()){
                echo "<tr>";
                foreach ($ligne as $value) {
                    echo "<td>$value</td>";
                }
                echo "<td><a href='back-office.php?' class='btn'>Delete</a>";
                echo "</tr>";
            }
            ?>
        </table>
        <?php
        $result->close();
        ?>
    </body>
    <footer>

    </footer>
</html>