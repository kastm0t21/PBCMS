<?
    require_once 'database_connections.php';
    $query = "SELECT * FROM port_type WHERE deleted = 0 ORDER BY id ASC";
    $result = mysqli_query($con, $query);
    $arr = array();
    if(mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)){
            $arr[] = $row;
        }
    }
    echo $json_info = json_encode($arr);