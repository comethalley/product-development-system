<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Concept | PDIS</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./css/suggestion.css">
    <script src="https://kit.fontawesome.com/a1366662c0.js" crossorigin="anonymous"></script>
</head>
<?php
if ($_SESSION['username']) {
    $username = $_SESSION['username'];
} else {
    header("location: ../index.php");
}
?>

<body>
    <!--Navbar-->
    <div class="navbar navbar-expand-lg navbar-light    ">
    <a class="navbar-brand" href="#">
            <h5>Product Development </h5>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi, <?php echo $username; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item logout-btn" type="button">Logout</a>
                        </div>
                    </div>

                </ul>

            </form>
        </div>
    </div>

    <main>
        <div class="container ">
            <div class="cont-left">
            <nav>
                    <ul class="">
                        <li class="">
                            <i class="fa-solid fa-clipboard" style="color: #b8b8b8;"></i> <a class="" href="suggestion.php">Suggestion <span class="sr-only">(current)</span></a>
                        </li>
                        <div class="line"></div>
                        <li class="">
                            <i class="fa-solid fa-flask" style="color: #b8b8b8;"></i> <a class="" href="ingredient.php">Ingredients</a>
                        </li>
                       
                        <div class="line"></div>
                        <li class="">
                            <i class="fa-brands fa-product-hunt" style="color: #b8b8b8;"></i> <a class="" href="product-concept.php">Concept Products</a>
                        </li>
                        <div class="line"></div>
                        <li class="">
                            <i class="fa-solid fa-chart-simple" style="color: #b8b8b8;"></i> <a class="" href="analysis-report.php">Analysis Report</a>
                        </li>
                        <div class="line"></div>
                        <li class="">
                            <i class="fa-solid fa-chart-simple" style="color: #b8b8b8;"></i> <a class="" href="survey.php">Survey</a>
                        </li>
                        <div class="line"></div>
                        <li class="">
                            <i class="fa-solid fa-box-archive" style="color: #b8b8b8;"></i> <a class="" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
                                Archive


                            </a>
                        </li>
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="box-card card-body">
                                        <a href="retrieve-user.php">Suggestions</a>
                                    </div>
                                    <div class="box-card card-body">
                                        <a href="retrieve-research.php">Research</a>
                                    </div>
                                    <div class="box-card card-body">
                                        <a href="retrieve-ingredient.php">Ingredient</a>
                                    </div>
                                    <div class="box-card card-body">
                                        <a href="retrieve-product-concept.php">Product Concept</a>
                                    </div>
                                    <div class="box-card card-body">
                                        <a href="retrieve-report.php">Survey Report</a>
                                    </div>
                                    <div class="box-card card-body">
                                        <a href="rejected-product.php">Rejected Products</a>
                                    </div>
                                    <div class="box-card card-body">
                                        <a href="retrieve-question.php">Rejected Question</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="line"></div>
                    </ul>
                </nav>
            </div>
            <div class="cont-right">
            <div class="card card-header">

<h6>Product Concept</h6>

</div>
                <div class="container">

                    <div class="card">
                        <div class="card-body">

                            <?php
                            include_once '../webpage/includes/db-connection.php';

                            $query = "SELECT * FROM tbl_ingredient INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID WHERE tbl_concept.archive='false'";
                            $query_run = mysqli_query($conn, $query);
                            ?>
                            <table id="datatableid" class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col"> ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">IngredientID</th>
                                        <th scope="col"> Edit </th>
                                        <th scope="col"> Archive </th>
                                        <th scope="col"> Survey Form </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($query_run) {
                                        foreach ($query_run as $row) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><img src="../../admin/productimages/uploads/<?php echo $row['image']; ?>" alt="image.jpg" width="100px" height="100px"></td>
                                                <td><img src="../../admin/productimages/uploads/<?php echo $row['image2']; ?>" alt="image.jpg" width="100px" height="100px"></td>
                                                <td><img src="../../admin/productimages/uploads/<?php echo $row['image3']; ?>" alt="image.jpg" width="100px" height="100px"></td>
                                                <td><?php echo $row['ingredientID']; ?></td>
                                                <td>
                                                    <button type="button" data-id='<?php echo $row['id']; ?>' class="btn btn-function btn-success editbtn editbtn"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> Edit </button>
                                                </td>
                                                <td>
                                                    <button type="button" data-id='<?php echo $row['id']; ?>' class="btn btn-function btn-danger archivebtn archive"><i class="fa-solid fa-box-archive" style="color: #ffffff;"></i> Archive</button>
                                                </td>
                                                <td><a href="survey-form.php?id=<?php echo $row['id']; ?>">Survey Form</a></td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "No Record Found";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </main>




    <!-- EDIT POP UP FORM -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Product Concept Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

    <!--Archive Product Concept-->
    <div class="modal fade" id="archivemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Archive Concept Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    <div class="footer-cont">
        <footer>
            © 2023 Violetea. All rights reserved. Developed by CHO<span style="color: #e69cfb;">BO</span>.
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/logoutajax.js"></script>
    <script src="../webpage//js/product-concept.js"></script>



</body>

</html>