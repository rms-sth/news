<?php 
require_once "class/news.class.php";
require_once "class/category.class.php";
$category = new Category();
$allcat= $category->index();
//print_r($allcat);
$title = "Create News";
require_once "header.php"; 

if (isset($_POST['btnCreateNews'])) {
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

    $news = new News();
    //$category->name= $_POST['name'];
    $news->set('category_id', $_POST['category_id']);
    $news->set('title', $_POST['title']);
    $news->set('status', $_POST['status']);
    $news->set('short_description', $_POST['short_description']);
    $news->set('content', $_POST['content']);
    $news->set('slider_key', $_POST['slider_key']);
    $news->set('breaking_key', $_POST['breaking_key']);
    //$news->set('view_count', $_POST['view_count']);
    $news->set('created_by', $_SESSION['username']);
    $news->set('created_date', date('Y-m-d H:i:s'));

    
    if(isset($_FILES['feature_image']['name']) && !empty($_FILES['feature_image']['name']) ){
        if($_FILES['feature_image'] ['error']==0){
            if($_FILES['feature_image'] ['size']< 5500000){
                if($_FILES['feature_image'] ['type']=='image/png' OR $_FILES['feature_image'] ['type']=='image/jpeg' OR $_FILES['feature_image'] ['type']=='image/jpg'){
                    if(move_uploaded_file($_FILES['feature_image']['tmp_name'] , 'img/'.$_FILES['feature_image']['name'])){
                        echo "Successful"; 
                        $news->set('feature_image', $_FILES['feature_image']['name']);
                    }
                }
                else{
                    echo "Not supported file";
                }
            }
            else {
                echo "size must be less than 5MB";
            }
        }
        else {
            $imageError = "File upload error";
        }
    //print_r($_FILES);
    $status = $news->save();  
    }
}
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News Management</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create News
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if(isset($status) && $status == false){
                                    echo "<div class = 'alert alert-danger'> Sorry!!! Category cannot be created!! </div> ";
                                } ?>
                                <form role="form" id="newsform" action="" method="post" novalidate="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select class="form-control" name="category_id" required=",.  ">
                                            <option value="">Select Category</option>
                                            <?php foreach($allcat as $ac){ ?> 
                                            <option value="<?php echo $ac['id']; ?>"><?php echo $ac['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php if(isset($errName)) { echo "$errName";} ?>

                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" placeholder="Enter title" required=""name="title"> <?php if(isset($errRank)) { echo "$errRank";} ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <input class="form-control" type="text" placeholder="Enter short description title" required="" name="short_description"> <?php if(isset($errRank)) { echo "$errRank";} ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Feature Image</label>
                                        <input class="form-control" type="file"  name="feature_image"> <?php if(isset($errRank)) { echo "$errRank";} ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control ckeditor" placeholder="Enter your content" name="content"></textarea> <?php if(isset($errRank)) { echo "$errRank";} ?>
                                    </div>

                                    <label>Status</label>
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
                                    <label>Display news in slider </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="slider_key" id="" value="1" >Active
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="slider_key" id="" value="0" checked>De Active
                                        </label>
                                    </div>
                                    <label>Breaking Key</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="breaking_key" id="" value="1" >Active
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="breaking_key" id="" value="0" checked>De Active
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-success" name="btnCreateNews" > <i class="fa fa-check" ></i> Submit</button>
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
<script src="js/ckeditor/ckeditor.js" ></script>


<script src="js/validation/dist/jquery.validate.min.js" ></script>
<script type="text/javascript">
   $(document).ready(function(){
    $('#newsform').validate();
});
</script>