<?php
include("template/header.php")
?>

<?php 
if (!empty($takeVehicles)) { ?>
<div class="details">

<!-- showing the deatails -->

    Type of Vehicle :  <?php echo $takeVehicles->getType(); ?><br>
    Name : <?php echo $takeVehicles->getName(); ?><br>
    Doors : <?php echo $takeVehicles->getDoors(); ?><br>
    Color : <?php echo $takeVehicles->getColor(); ?><br>
    Weight : <?php echo $takeVehicles->getWeight(); ?><br>
    Mark : <?php echo $takeVehicles->getMark(); ?><br>
    

    <!-- the butoons for delet or update -->
    <a href="index.php?delete=<?php echo $takeVehicles->getId(); ?>">
    <input type="submit" name="upadte" value="Delete" class="btn btn-danger mt-3 ml-1"></a></a>
    <a href="update.php?id=<?php echo $takeVehicles->getId(); ?>">
    <input type="submit" name="upadte" value="update" class="btn btn-info mt-3 ml-1"></a></a>
</div>
<?php

}

include("template/footer.php")
?>