<?php
include("template/header.php")
?>


<!-- update form -->
<div class="container py-3">
    <div class="row">
        <div class="mx-auto col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Update Your Vehicle</h4>
                        </div>

                        <div class="card-body">
                            <form class="form" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                    <input class="form-control"  type="text" name="name" value="<?php echo $vehicleUpdate->getName(); ?>">
                                    </div>
                                </div>
   
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Type</label>
                                    <div class="col-lg-9">
                                        <select name="type" id="">
                                            <option name="car" value="car"  <?php if ($vehicleUpdate->getType() == "car") { ?> selected <?php 
                                                                                                                                    } ?>>Car</option>
                                            <option name="camion"  value="camion" <?php if ($vehicleUpdate->getType() == "camion") { ?> selected <?php 
                                                                                                                                            } ?>>Camion</option>
                                            <option  name="moto" value="moto" <?php if ($vehicleUpdate->getType() == "moto") { ?> selected <?php 
                                                                                                                                        } ?> >Moto</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Color</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="color" value="<?php echo $vehicleUpdate->getColor(); ?>" type="text">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Mark</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="mark" value="<?php echo $vehicleUpdate->getMark(); ?>" type="text">
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Doors</label>
                                    <div class="col-lg-9">
                                     <input class="form-control" name="doors" value="<?php echo $vehicleUpdate->getDoors(); ?>" type="number">
                                    </div>
                                </div>

    
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Weight</label>
                                    <div class="col-lg-9">
                                    <input class="form-control" name="weight" value="<?php echo $vehicleUpdate->getWeight(); ?>" type="number">
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
  

<?php
include("template/footer.php")
?>