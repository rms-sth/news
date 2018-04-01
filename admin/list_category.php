<?php 
$title="List Category";
require_once "header.php"; 
require_once "class/category.class.php";
$obj = new Category();
//print_r($obj);
$catlist = $obj->index();
//print_r($catlist);

?>

    
    <link href="css/jquery.dataTables.min.css" rel="stylesheet">


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category Management</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List all Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <?php 
                            @session_start();
                            if(isset($_SESSION['success_message'])){
                                echo "<div class = 'alert alert-success'>" .$_SESSION['success_message'] ."</div>";
                                unset($_SESSION['success_message']);
                            } ?>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="category_table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Rank</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Modified By</th>
                                        <th>Created Date</th>
                                        <th>Modified Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; foreach($catlist as $in) {?>
                                     <tr class="odd gradeX">
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $in['name'] ;?></td>
                                        <td><?php echo $in['rank'] ;?></td>
                                        <td><?php if ($in['status']==1) {
                                            echo "<span class= 'bg bg-success' > Active </span>";
                                        }else{
                                            echo "<span class= 'bg bg-danger' >In-Active </span>";
                                            } ?></td>
                                        <td><?php echo $in['created_by'] ;?></td>
                                        <td><?php echo $in['modified_by'] ;?></td>
                                        <td><?php echo $in['created_date'] ;?></td>
                                        <td><?php echo $in['modified_date'] ;?></td>
                                        <td class="center"><a href="edit_category.php?id=<?php echo $in['id'] ?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a> <a href="delete_category.php?id=<?php echo $in['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this category?'); " ><i class="fa fa-trash"> Delete</i></a> </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<?php require_once "footer.php"; ?>
<script type="text/javascript" src = "js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#category_table').DataTable();
} );
</script>