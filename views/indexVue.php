<?php
include("template/header.php")
?>



<div class="container py-3">
    <div class="row">
        <div class="mx-auto col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Choose Your Vehicle</h4>
                        </div>

                        <div class="card-body">
                            <form class="form" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                    <input class="form-control"  type="text" name="name"><br>
                                    </div>
                                </div>
   
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Type</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="type" id="">
                                            <option name="car" value="car">Car</option>
                                            <option name="camion"  value="camion">Camion</option>
                                            <option  name="moto" value="moto">Moto</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Color</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="color" type="text">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Mark</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="mark" type="text">
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Doors</label>
                                    <div class="col-lg-9">
                                     <input class="form-control" name="doors" type="number">
                                    </div>
                                </div>

    
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Weight</label>
                                    <div class="col-lg-9">
                                    <input class="form-control" name="weight" type="number">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                     <input type="submit" name="submit" class="btn btn-primary" value="Save">                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  


<div class="row m-0 d-flex justify-content-center display">
    <?php 
    if (!empty($takeVehicles)) { ?>
    <?php
    // showing the name and the type
    foreach ($takeVehicles as $vehicle) { ?>
    <div class="col-md-3 m-5 p-5 bg-secondary  ">
        <p class="text-white">Type of Vehicle : <?php echo $vehicle->getType(); ?><br></p> 
        <p class="text-white"> Name : <?php echo $vehicle->getName(); ?><br>  </p>
        <a class="link" href="indexDetails.php?id=<?php echo $vehicle->getId(); ?>">
         <input type="submit" name="delete" value="See More" class="btn btn-danger mt-3 ml-1"><br>     
        </a>

        <!-- buttons for delete or update -->
        <a  href="update.php?id=<?php echo $vehicle->getId(); ?>">
         <input type="submit" name="upadte" value="update" class="btn btn-info mt-3 ml-1"></a>
        <a href="index.php?delete=<?php echo $vehicle->getId(); ?>">
         <input type="submit" name="delet" value="Delete" class="btn btn-danger mt-3 ml-1"><br>
        </a>
    </div>
    <?php

}
?>
        
        <?php

    }
    ?>

</div>


<?php
include("template/footer.php")
?>
