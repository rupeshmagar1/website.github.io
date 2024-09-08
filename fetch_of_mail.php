<?php
$host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="store_mail";

    //create connection
    $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
$res=mysqli_query($conn,"select*from tb_mail");
?>
<table border="1" cellspacing="1" cellpadding="10px" align="center" style="margin-top:100px; cellpadding:10px;">
    <tr>
    <td style="font-weight:800; text-align:center;">S.N</td>
        <td style="font-weight:800; text-align:center;">Email</td>
    </tr>
    <?php
    $no=1;
    while ($row=mysqli_fetch_array($res)){
    ?>
    <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $row['email']; ?></td>
    </tr>
   
<?php
     $no++;
    }
    ?>   
</table>