<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/our_product.css" rel="stylesheet">
</head>
<?php include 'database/db.php' ?>

<body>

    <header class="header">
        <center>
            <h1>Our Products</h1>
        </center>
    </header>
    <main>
        <?php
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $Images = $row["images"];
            $Product_name = $row["productname"];
            $Product_Qty = $row["productqty"];
            $Product_price = $row["productprice"];
            $Product_code = $row["productcode"];
            ?>

            <div class="card">
                <div class="image">
                    <?php echo '<img src="uploads/' . $Images . '" >' ?>
                </div>
                <h3 class="product_name"><?php echo $Product_name ?></h5>
                <p class="price">Price: ₱<?php echo $Product_price ?></p>
                <button class="add">Add to cart</button>

            </div>

            <?php
        }
        ?>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>