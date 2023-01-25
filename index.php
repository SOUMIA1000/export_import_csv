<!DOCTYPE html>
<html>

<head>
    
	<title>importer un fichier CSV dans MySQL avec PHP</title>
</head>

<body>
   

    <form enctype="multipart/form-data" action="import_csv.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label">Choisir un fichier CSV</label>
            <input type="file" name="file" id="file" accept=".csv">
            <br />
            <br />
            <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
            <br />
        </div>
    </form>

    <?php
			// Connect to database
			include("db_connect.php");

            $sql = "SELECT * FROM produit";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
    ?>
    
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tbody>
                    <tr>
                        <td> <?php  echo $row['id']; ?> </td>
                        <td> <?php  echo $row['name']; ?> </td>
                        <td> <?php  echo $row['description']; ?> </td>
                        <td> <?php  echo $row['price']; ?> </td>
                    </tr>
            <?php } ?>
            
                </tbody>
                
        </table>
        
        
        <?php } ?>
        
     
  
    <div>
    <p><a href="export_csv.php">Exporter mes données</a></p>
    </div>


</body>




</html>