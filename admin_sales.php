<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/admin_style.css" type="text/css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }
</style>

<body>
    <?php include 'database/db.php'; ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <img src="assets/images/logo.svg" alt="">
        </a>
        <ul class="side-menu">
            <li><a href="admin_dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li class="active"><a href="admin_sales.php"><i class='bx bx-dollar-circle'></i>Sales</a></li>
            <li><a href="admin_product.php"><i class='bx bx-store'></i>Products</a></li>
            <li><a href="#"><i class='bx bx-box' style='color:#ffffff'></i>Inventory</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="index.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>

            <p style="color: white;">Admin</p>
            <a href="#" class="profile">
                <i class='bx bx-user'></i>
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Products</h1>

                </div>
                <div class="add-button">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">ADD</button>
                </div>
            </div>

            <!-- Data Table -->
            <div class="bottom-data">

                <div class="orders">

                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Products</h3>
                        <!-- <i class='bx bx-filter'></i> -->
                        <i class='bx bx-search'></i>
                        <div class="search-bar">
                            <input type="text" class="search-box" placeholder="Search...">
                            <span class="search-line"></span>
                        </div>

                    </div>

                    <?php

                    if (isset($_GET['page_no']) && $_GET['page_no'] !== "") {
                        $page_no = $_GET['page_no'];
                    } else {
                        $page_no = 1;
                    }
                    $total_records_perpage = 10;
                    $offset = ($page_no - 1) * $total_records_perpage;
                    $next_page = $page_no + 1;
                    $previous_page = $page_no - 1;
                    $query = "SELECT * FROM products limit $offset, $total_records_perpage";

                    $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM choco_repub.products") or die(mysqli_error($conn));
                    $records = mysqli_fetch_array($result_count);
                    $total_records = $records['total_records'];
                    $total_no_of_pages = ceil($total_records / $total_records_perpage);
                    ?>

                    <!-- Table -->
                    <table class="table">
                        <thead>
                            <tr class="table-dark">
                                <td>No.</td>
                                <td>Images</td>
                                <td>Product name</td>
                                <td>Product qty</td>
                                <td>Product price</td>
                                <td>Product code</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <?php
                        $number = 1;
                        if ($result = $conn->query($query)) {
                            while ($row = $result->fetch_assoc()) {
                                $ID = $row["id"];
                                $Images = $row["images"];
                                $Product_name = $row["productname"];
                                $Product_Qty = $row["productqty"];
                                $Product_price = $row["productprice"];
                                $Product_code = $row["productcode"];
                                ?>
                                <tbody>
                                    
                                    <tr class="table-dark">
                                        <td>
                                            <?php echo $number ?>
                                        </td>
                                        <td>
                                            <?php echo '<img src="uploads/' . $Images . '" style="height: 100px; weight: 100px">' ?>
                                        </td>
                                        <td>
                                            <?php echo $Product_name ?>
                                        </td>
                                        <td>
                                            <?php echo $Product_Qty ?>
                                        </td>
                                        <td>
                                            <?php echo $Product_price ?>
                                        </td>
                                        <td>
                                            <?php echo $Product_code ?>
                                        </td>
                                        <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update</button></td>
                                    </tr>
                                </tbody>

                                <?php
                                $number++;
                            }
                            $result->free();
                        } ?>
                    </table>

                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" <?= ($page_no <= 1) ?
                            'disabled' : ''; ?> <?= ($page_no > 1) ? 'href=?page_no=' .
                                $previous_page : ''; ?>>Previous</a></li>


                        <?php for ($counter = 1; $counter <= $total_no_of_pages; $counter++) { ?>
                            <?php if ($page_no != $counter) { ?>
                                <li class="page-item"><a class="page-link" href="?page_no=<?=
                                    $counter; ?>">
                                        <?= $counter; ?>
                                    </a></li>
                            <?php } else { ?>
                                <li class="page-item"><a class="page-link active">
                                        <?= $counter; ?>
                                    </a></li>
                            <?php } ?>
                        <?php } ?>


                        <li class="page-item"><a class="page-link <?= ($page_no >=
                            $total_no_of_pages) ? 'disabled' : '' ?>" <?= ($page_no <
                                $total_no_of_pages) ? 'href=?page_no=' . $next_page : ''; ?>>Next</a></li>
                    </ul>
                    <div class="p-10">
                        <strong>Page
                            <?= $page_no; ?> of
                            <?= $total_no_of_pages; ?><strong>
                    </div>

                </div>

            </div>
            <!-- End of Data Table -->
        </main>



    </div>

    <script src="assets/js/admin_script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

</body>

</html>


