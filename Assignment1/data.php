
    <?php


    try{

        $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200397613', 'gc200397613', 'eedZzT8hO_');
      echo "Connected <br>";

    }catch(PDOException $e){
      echo "Sorry can't connect <br>";
    }

    echo "<table>
    <tr>
    <th>Movie Name</th>
    <th>Genre</th>
    <th>Release Date</th>
    <th>Rating</th>
    </tr>";



    $sql = "SELECT * FROM movies";

    $cmd = $db->prepare($sql);

    $cmd->execute();

    echo "sql query executed";

    $no_of_rows = $cmd->rowCount();

    $row = $cmd->fetch(PDO::FETCH_ASSOC);

    while($no_of_rows>0){
      echo "<tr>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['genre'] . "</td>";
      echo "<td>" . $row['release_date'] . "</td>";
      echo "<td>" . $row['rating'] . "</td>";
      echo "</tr>";

      $no_of_rows--;
    }

    echo "</table>";

    $db = null;

    ?>
