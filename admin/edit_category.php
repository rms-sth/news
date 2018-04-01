<?php
require_once "class/config.php";
require_once "class/category.class.php";
$obj = new Category();
$obj->id = $_GET['id'];
$record = $obj->selectCategoryByID();
//print_r($record);
?>

<?php 
$title = "Edit Category";
require_once "header.php"; 

if (isset($_POST['btnUpdateCategory'])) {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
    }else{
        $errName = "Please enter the Category Name";
    }
    if (isset($_POST['rank']) && !empty($_POST['rank'])) {
        $rank = $_POST['rank'];
    }else{
        $errRank = "Please enter the Rank";
    }

   
    $obj->set('name', $_POST['name']);
    $obj->set('rank', $_POST['rank']);
    $obj->set('status', $_POST['status']);
    $obj->set('modified_by', $_SESSION['username']);
    $obj->set('modified_date', date('Y-m-d H:i:s'));
    $status = $obj->edit();
    

}

 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category Management</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
               
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Edit Category
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <?php if(isset($status) && $status == false){
                                            	echo "<div class = 'alert alert-danger'> Sorry!!! Category cannot be updated </div> ";
                                            	} ?>
                                                <form role="form" id="categoryform" action="" method="post" novalidate="">
                                                    <div class="form-group">
                                                        <label>Category Name</label>
                                                        <input class="form-control" name="name" required="" value="<?php echo $record[0]['name']; ?>"> <?php if(isset($errName)) { echo "$errName";} ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Rank</label>
                                                        <input class="form-control" type="number" placeholder="Enter rank" required=""name="rank" value="<?php echo $record[0]['rank']; ?>"> <?php if(isset($errRank)) { echo "$errRank";} ?>
                                                    </div>
                                                    <label>Status</label>
                                                    <?php if ($record[0]['status'] == 1) {?>
                                                    	 <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status" id="" value="1" checked >Active
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status" id="" value="0" >De Active
                                                        </label>
                                                    </div>
                                                    
                                                    <?php } else { ?>
                                                    	<div class="radio">
                                                        <label>
                                                            <input type="radio" name="status" id="" value="1" >Active
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status" id="" value="0" checked>De Active
                                                        </label>
                                                    </div>

                                                    	<?php } ?>
                                                    

                                                    <button type="submit" class="btn btn-success" name="btnUpdateCategory" > <i class="fa fa-check" ></i> Update </button>
                                                    <button type="reset" class="btn btn-danger">Clear</button>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


<?php require_once "footer.php" ?>

<script src="dist/js/sb-admin-2.js"></script>

        <script src="js/validation/dist/jquery.validate.min.js" ></script>
        <script type="text/javascript">
         $(document).ready(function(){
            $('#categoryform').validate();
        });
        </script>