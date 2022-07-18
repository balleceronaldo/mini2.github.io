<?php

if (!isset($_SESSION)) {
   session_start();
}

if (isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator" || isset($_SESSION['Access']) && $_SESSION['Access'] == "user") {
   echo "Welcome " . $_SESSION['UserLogin'] . "<br><br>";
} else {
   echo header("Location: landing.php");
}

include_once("connections/connection.php");

$con = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM farmer_list WHERE id = '$id'";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

?>

<!DOCTYPE html>
<html class="details-page" lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Grow Soils System</title>
   <link rel="stylesheet" href="./css/analysis.css">
   <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

<div class="container">
   <div class="row">

      <div id="map" class="smallmap col"></div>

      <div class="col">

         <br>

         <p>Farm Evaluation Details</p>
   
         <br>
   
         <h2><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></h2>
   
         <p>Over-all Soil Quality: <?php echo $row['quality']; ?></p>
   
         <br>
   
         <p id="general"><?php echo $row['comment']; ?></p>
         <p id="general"><?php echo $row['comment']; ?></p>
         <input id="lat" type="hidden" value="<?= $row['latitude']; ?>" >
         <input id="lng" type="hidden" value="<?= $row['longitude']; ?>">

         <table class="content-table">

         <thead>
            <tr>
               <th>Nitrogen</th>
               <th>Phosphorus</th>
               <th>Potassium</th>
               <th>Sulfate</th>
            </tr>
         </thead>

         <tbody>
            <tr>
               <td><?php echo $row['n']; ?></td>
               <td><?php echo $row['p']; ?></td>
               <td><?php echo $row['k']; ?></td>
               <td><?php echo $row['s']; ?></td>
            </tr>
            <tr>
               <td><?php echo $row['n_rate']; ?></td>
               <td><?php echo $row['p_rate']; ?></td>
               <td><?php echo $row['k_rate']; ?></td>
               <td><?php echo $row['s_rate']; ?></td>
            </tr>
         </tbody>

         </table>

      </div>

      <div>
      <p>Lorem ipsum dolor sit amet <span class="classic">adipisicing elit</span>. Aspernatur commodi mollitia ratione perferendis maiores laborum officiis, corporis itaque alias laudantium ipsam veniam temporibus neque atque dolorum dolor consequatur eum aliquam.</p>
      </div>

      <br>
      <br>

      <section>
         <h5>Heading 5</h5>
         <h3>Heading 3</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae laboriosam voluptas cupiditate qui quis facilis similique, quaerat nam, voluptatibus nisi natus beatae deleniti. Adipisci eum sequi ab eligendi velit quod.</p>
      </section>

      <br>
      <br>
   
      <form class="index-form" action="delete.php" method="post">
         <a href="index.php">< Back</a>
         <?php if ($_SESSION['Access'] == "administrator") { ?>
               <a href="edit.php?ID=<?php echo $row['id']; ?>">Edit</a>
         <?php } ?>

         <?php if ($_SESSION['Access'] == "administrator") { ?>
               <button type="submit" name="delete">Delete</button>
         <?php } ?>

         <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">            
      </form>

      <br>

   </div>
</div>

<footer class="footer"><small>&copy; <a href="./landing.php">Grow Soils</a></small></footer>
   
   <script src="./lib/OpenLayers.js"></script>

   <!-- <script src="./js/bing-tiles.js"></script> -->
   <script>
      lat = parseFloat('<?php echo $row['latitude']; ?>');
      lng = parseFloat('<?php echo $row['longitude']; ?>');
      var apiKey = "Ag7DSkKr-xwKNkS_dRyQ51O-e5Wz7ca-Fz2mzu6vtWPm1YxbIE6eFcYgXgMMUM4X";

      var map = new OpenLayers.Map( 'map');

      var road = new OpenLayers.Layer.Bing({
      key: apiKey,
      type: "Road",

      metadataParams: {mapVersion: "v1"}
      });

      var aerial = new OpenLayers.Layer.Bing({
      key: apiKey,
      type: "Aerial"
      });

      var hybrid = new OpenLayers.Layer.Bing({
      key: apiKey,
      type: "AerialWithLabels",
      name: "Bing Aerial With Labels"
      });

      map.addLayers([aerial, hybrid, road]);
      map.addControl(new OpenLayers.Control.LayerSwitcher());
      
      // Zoom level numbering depends on metadata from Bing, which is not yet loaded.
      var zoom = map.getZoomForResolution(0);
      map.setCenter(new OpenLayers.LonLat(lng,lat).transform(
      new OpenLayers.Projection("EPSG:4326"),
      map.getProjectionObject()
      ), zoom);

   </script>
   
</body>

</html>