<?php
include 'db_connect.php';
if(isset($_GET['newdata']))
{
    $date=$_GET['month'].'-'.$_GET['day'].'-'.$_GET['year'];
    $numItems=  mysql_real_escape_string($_GET['numItems']);
    $cost=  mysql_real_escape_string($_GET['cost']);
    $purpose=  mysql_real_escape_string($_GET['purpose']);
    $loc=  mysql_real_escape_string($_GET['location']);
    $query="";
    mysql_query($query, $conn)or die(mysql_error()); 
}
 elseif(isset($_GET['id']))
 {
     show_form($_GET['id']);
 }
 
 function show_form($id)
{
     $query="SELECT date,numItems,cost,purpose,intendedLocation from Purchase_record WHERE id=$id";
     $result=  mysql_query($query, $conn);
     $data=  mysql_fetch_array($result);
     $date=  explode('-', $data['date']);
    ?>
<form name="p_rec" method="get">
    <select name="month">
        <?php
        for($i=0;$i<=12;$i++){
            if($i==$date[1])
            {
                echo "<option selected>$i</option>";
                continue;
            }
            echo "<option>$i</option>";
        }
        ?>
    </select>/
    <select name="day">
        <?php
        for ($i=1;$i<=31;$i++){
            if($i==$date[2]){
                echo "<option selected>$i</option>";
                continue;
            }
            echo "<option>$i</option>";
        }
        ?>
    </select>/
    <select name="year">
        <?php
        $now=$date[0];
        for($i=$now-5;$i<$now+1;$i++)
        {
            if($i==$now){
                echo "<option selected>$i<option>";
                continue;
            }
            echo "<option>$i</option>";
        }
        ?>
    </select>
    Number of Items: <input type="text" name="numItems" value="<?=$data['numItems']?>"/>
    Cost: <input type="text" name="cost" value="<?=$data['cost']?>"/>
    Purpose: <textarea name="purpose" cols="20" rows="2"><?=$data['purpose']?></textarea>
    Location: <input type="text" name="location" value="<?=$data['intendedLocation']?>"/>
</form>
<?php
}
?>
?>