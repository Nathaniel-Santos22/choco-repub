<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/admin_style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Dashboard</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <img src="assets/images/logo.svg" alt="">
        </a>
        <ul class="side-menu">
            <li class="active"><a href="admin_dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="admin_sales.php"><i class='bx bx-dollar-circle'></i>Sales</a></li>
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
                    <h1>Dashboard</h1>
                </div>
            </div>

            <!-- Bar Chart -->
            <div>
                <canvas id="myChart" style="height: 90px; width: 200px;"></canvas>
            </div>

        </main>

    </div>

    <script src="assets/js/admin_script.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Monthly Sales',
                    data: [12, 25, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>