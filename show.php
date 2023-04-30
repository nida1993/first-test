<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Manage User</title>
</head>

<body>


    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">

                
            

                <div class="card">
                    <div class="card-header">
                        <h3>User Management System</h3>
                    </div>
                    <div class="card-body">
                        
                        
                            <div class="mb-3">
                            <?php

include('dbcon.php');

$sql= "SELECT * FROM user";
$result = $handle->query($sql);
if($result->rowCount() > 0){
    echo '<table class="table">';
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Mobile</th>";
    echo "<th>Verification</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["mobile"] . "</td>";
        echo "<td>" . $row["is_verified"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}else{
    echo "0 Results";
}
?>
                            </div>
            
                            <div class="mb-3">
                            <a href="index.php"><button   type="button" class="btn btn-primary">Add Users</button></a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>