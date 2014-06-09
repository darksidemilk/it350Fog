<?php
include 'db_connect.php';
if(isset($_GET['cost']))
{
    $date=$_GET['year'].'-'.$_GET['month'].'-'.$_GET['day'];
    $numItems=  mysql_real_escape_string($_GET['numItems']);
    $cost=  mysql_real_escape_string($_GET['cost']);
    $purpose=  mysql_real_escape_string($_GET['purpose']);
    $loc=  mysql_real_escape_string($_GET['location']);
    $query="INSERT INTO Purchase_record (date,numItems,cost,purpose,intendedLocation) VALUES ('$date',$numItems,$cost,'$purpose','$intendedLocation')";
    mysql_query($query, $conn)or die(mysql_error());
}
else
{
   show_form(); 
}

function show_form()
{
    ?>
<form name="p_rec" method="get">
    <select name="month">
        <?php
        for($i=0;$i<=12;$i++){
            if($i==date('m'))
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
            if($i==date('d')){
                echo "<option selected>$i</option>";
                continue;
            }
            echo "<option>$i</option>";
        }
        ?>
    </select>/
    <select name="year">
        <?php
        $now=date('Y');
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
    Number of Items: <input type="text" name="numItems"/>
    Cost: <input type="text" name="cost"/>
    Purpose: <textarea name="purpose" cols="20" rows="2"></textarea>
    Location: <input type="text" name="location"/>
</form>
<?php
}
?>