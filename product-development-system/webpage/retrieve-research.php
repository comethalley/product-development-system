<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDIS | Archives</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./css/suggestion.css">
    <script src="https://kit.fontawesome.com/a1366662c0.js" crossorigin="anonymous"></script>
</head>

<body>


    <?php
    if ($_SESSION['username']) {
        $username = $_SESSION['username'];
    } else {
        header("location: ../index.php");
    }
    ?>
    <div class="navbar navbar-expand-lg navbar-light    ">
    <a class="navbar-brand" href="#"><h5>Product Development </h5></a>
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

<h6>Research Archived</h6>

</div>
                    <div class="container">

                        <div class="card">
                            <div class="card-body">

                                <?php
                                include_once '../webpage/includes/db-connection.php';

                                $query = "select * from `tbl_research` where archive ='true'";
                                $query_run = mysqli_query($conn, $query);
                                ?>
                                <table id="researchtableid" class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col"> ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Introduction </th>
                                            <th scope="col">Market Research</th>
                                            <th scope="col">User Research</th>
                                            <th scope="col">Technical Research</th>
                                            <th scope="col"> Conclusion </th>
                                            <th scope="col"> RETRIEVE </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($query_run) {
                                            foreach ($query_run as $row) {
                                        ?>
                                                <tr>
                                                    <td> <?php echo $row['id']; ?> </td>
                                                    <td> <?php echo $row['title']; ?> </td>
                                                    <td> <?php echo $row['introduction']; ?> </td>
                                                    <td> <?php echo $row['market']; ?> </td>
                                                    <td> <?php echo $row['user']; ?> </td>
                                                    <td> <?php echo $row['technical']; ?> </td>
                                                    <td> <?php echo $row['conclusion']; ?> </td>
                                                    <td>
                                                        <button type="button" class="btn btn-function btn-success retrievebtn2"><i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> RETRIEVE</button>
                                                    </td>
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

                <!-- RETRIEVE RESEARCH POP UP FORM -->
                <div class="modal fade" id="retrievemodal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Retrieve Research Data </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form id="myForm" method="POST">

                                <div class="modal-body">

                                    <input type="hidden" name="retrieve_id" id="retrieve_id">
                                    <h4> Do you want to retrieve this data?</h4>
                                    <div class="form-group">
                                        <label> Title </label>
                                        <textarea type="text" name="retrieve_title" id="retrieve_title" class="form-control"   rows="3" disabled></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label> Introduction </label>
                                        <textarea type="text" name="retrieve_introduction" id="retrieve_introduction" class="form-control" rows="5" disabled>
                                    </div>

                                    <div class="form-group">
                                <label>Market Research</label>
                                <textarea class="form-control" name="retrieve_market" id="retrieve_market" rows="5"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>User Research</label>
                                <textarea class="form-control" name="retrieve_user" id="retrieve_user" rows="5" disabled></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Market Research</label>
                                <textarea class="form-control" name="retrieve_technical" id="retrieve_technical" rows="5" disabled></textarea>
                            </div>

                                    <div class="form-group">
                                        <label> Conclusion </label>
                                        <textarea type="text" class="form-control" name="retrieve_conclusion" id="retrieve_conclusion" rows="5" disabled></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="submit" name="updatedata" class="btn btn-primary"><i class="fa fa-check-circle"></i> Yes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


    </main>
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
    <script src="./js/retrieveresearch.js"></script>

</body>

</html>