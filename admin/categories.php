
 <!-- header -->
 <?php include "includes/admin_header.php"; ?>

   
   <div id="wrapper">

       <!-- Navigation -->
     <?php include "includes/admin_navigation.php"; ?>

       <div id="page-wrapper">

           <div class="container-fluid">

               <!-- Page Heading -->
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">
                           Welcome To Admin
                           <small>Author</small>
                       </h1>
                       
                       <div class="col-xs-6">


                       <?php InsertCategories(); ?>
                       

                       <?php    // UPDATE AND INCLUDE QUERY 

                            if(isset($_GET['edit'])) {

                            $cat_id = $_GET['edit'];

                            include_once "includes/update_category.php";

                            } else {

                                ?>
                                    <form action="" method="post">
                                    <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" name="cat_title" id="" class="form-control" placeholder="Categories Name" >
                                    </div>
                                    <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                    </div>
                                    </form>
                                        
                                    
                            <?php } ?>
                       
                       </div>

                       <!-- Add Category table -->
        
                       <div class="col-xs-6">
                       <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Category Title</th>
                               </tr>
                           </thead>
                           <tbody>
                               
                                   <!-- FINDING ALL CATEGORIES FUNCTION -->    
                                    <?php FindAllCategories(); ?>
                                   
                                   <!--  DELETING CATEGORY FUNCTION -->
                                   <?php DeleteCategories();  ?>

                                   

                           </tbody>
                       </table>
                       </div>
                   </div>
               </div>
               <!-- /.row -->

           </div>
           <!-- /.container-fluid -->

       </div>
       <!-- /#page-wrapper -->

   <!-- footer.php -->
   <?php include "includes/admin_footer.php"; ?> 
  