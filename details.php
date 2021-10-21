<?php
include('connection.php');
session_start();
$name=$_SESSION['sid'];
$sel=mysqli_query($con,"select * from users where email='$name'");
if(mysqli_num_rows($sel)>0){
    
    while($arr=mysqli_fetch_assoc($sel)){
        ?>
        
        <table >
            <tr border="1">
                <th>Name</th>
                <th>Username</th>
                <th>age</th>
            </tr>
            <tr>
                <img src=" <?php echo $arr['file']  ?>" height="200px" width="200px">
            </tr>
        <tr>
            <td><?php echo $arr['name'] ?></td>
            <td><?php echo $arr['username'] ?></td>
            <td><?php  echo $arr['age'] ?></td>
        </tr>
        </table>
<?php
    }

}


?>