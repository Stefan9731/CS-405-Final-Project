<html>
<?php
	session_start();
	if(isset($_GET['OrderID']) & !empty($_GET['OrderID'])){
            $OrderID = $_GET['OrderID'];
            $user = $_SESSION['username'];
            $host = 'localhost';//enter hostname
            $userName = 'root';//enter user name of DB
            $Pass = 'pwd'; //enter password
            $DB = 'Econ'; //Enter database name
            $conn= new mysqli($host,$userName,$Pass,$DB);
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
            //$sql = "SELECT CartID FROM Shopping_Cart WHERE (CID = '1111')";
            //$result = $conn->query($sql);
            //while($row = mysqli_fetch_array($result)){
            //    $cart = $row['CartID'];
            //}
            //$add = "INSERT INTO Shopping_Cart (PID) VALUES ('$items') SELECT WHERE (CartID = '$cart')";
            //$add = "INSERT INTO Shopping_Cart(CartID, PID, CID) VALUES ('0', '$items', '1111') ON DUPLICATE KEY UPDATE 'CartID' = 'CartID' + 1";
            $add = "DELETE FROM Orders WHERE OrderID = $OrderID";
            if($conn->query($add) != NULL){
                echo "got here";
            }
			header('location: orders.php?status=removed');
	}else{
        header('location: orders.php?status=failed');
	}
?>
</html>