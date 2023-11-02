<!DOCTYPE html>
<html>

<head>
    <!-- Include your CSS and Bootstrap links here -->
    <link rel="stylesheet" type="text/css" href="pos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        #checkout-fields {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border: 2px solid #333;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 2;
            width: 300px;
        }

        #checkout-fields h2 {
            text-align: center;
        }

        #checkout-fields button {
            display: block;
            margin: 0 auto;
        }

        #notification {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    // Include your database connection code here
    include '../database/db.php';

    $productname = array();
    $productcode = array();
    $productprice = array();

    $query = "SELECT * FROM products";
    $result = $conn->query($query);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $productname[] = $row["productname"];
            $productcode[] = $row["productcode"];
            $productprice[] = $row["productprice"];
        }
    }
    ?>

    <div class="pos-container">
        <div class="header">
            <div class="business-name">CHOCO POS</div>
            <div class="user-name">User: Armando Herno</div>
        </div>
        <div class="content">
            <div class="product-box">
                <h2 style="color: white">Scan a Product</h2>
                <input type="text" id="barcode-input" placeholder="Scan a product by barcode" autofocus>
                
            </div>
            <div class="scanned-box">
                <h2 style="color: white">Scanned Products</h2>
                <div id="scanned-products-list">
                </div>
                <div class="total-amount">
                    <h2 style="color: white">Total Amount: ₱0.00</h2>
                </div>
                <button class="checkout-button" id="proceed-checkout">Checkout</button>
            </div>
        </div>
    </div>

    <div id="checkout-fields">
        <h2>Checkout</h2>
        <button id="close-checkout">Close</button>
        <div>
            <label for="cash-received">Cash Tendered: ₱</label>
            <input type="number" id="cash-received" step="0.01">
        </div>
        <div>
            <label>Change: ₱<span id="change">0.00</span></label>
        </div>
        <button class="btn btn-primary" id="calculate-change">Calculate Change</button>
        <button class="btn btn-success" id="proceed-transaction">Proceed</button>
    </div>

    <script>
        const productnames = <?php echo json_encode($productname); ?>;
        const productprice = <?php echo json_encode($productprice); ?>;
        const productcode = <?php echo json_encode($productcode); ?>;
        const scannedProductsList = document.getElementById('scanned-products-list');
        const totalAmount = document.querySelector('.total-amount h2');
        const checkoutFields = document.getElementById('checkout-fields');
        const cashReceivedInput = document.getElementById('cash-received');
        const changeAmount = document.getElementById('change');
        const addQtyButton = document.getElementById('add-qty-button');
        const closeCheckoutButton = document.getElementById('close-checkout');
        let cart = {}; // Keeps track of scanned items

        // Function to get product info by barcode (you can replace this with your actual product database)
        function getProductInfoByBarcode(barcode) {
            const index = productcode.indexOf(barcode);
            if (index !== -1) {
                return {
                    name: productnames[index],
                    price: productprice[index]
                };
            }
            return null;
        }

        // Function to automatically add a product based on barcode
        function addProductToCart(barcode) {
            if (cart[barcode]) {
                cart[barcode].qty += 1;
            } else {
                const productInfo = getProductInfoByBarcode(barcode);
                if (productInfo) {
                    cart[barcode] = {
                        name: productInfo.name,
                        price: productInfo.price,
                        qty: 1
                    };
                } else {
                    // Handle product not found
                    // You can display a notification here
                    document.getElementById('notification').textContent = 'Product not found.';
                    document.getElementById('notification').style.display = 'block';
                    setTimeout(function () {
                        document.getElementById('notification').style.display = 'none';
                    }, 2000);
                }
            }
            updateScannedProducts();
        }

        // Update the scanned products list and total amount
        function updateScannedProducts() {
            scannedProductsList.innerHTML = '';
            let total = 0;
            for (const barcode in cart) {
                const product = cart[barcode];
                const listItem = document.createElement('div');
                listItem.className = "product";
                listItem.innerHTML = `
                    <h3>${product.name}</h3>
                    <h5>Qty: x${product.qty}</h5>
                    <h5>Price: ₱${(product.price * product.qty).toFixed(2)}</h5>
                    <button class="delete-product" data-barcode="${barcode}">Delete</button>
                    <button class="add-qty-product" data-barcode="${barcode}">Add Quantity</button>`;
                scannedProductsList.appendChild(listItem);
                total += product.price * product.qty;
            }
            totalAmount.innerHTML = `<h2>Total Amount: ₱${total.toFixed(2)}</h2>`;
        }

        // Add event listener to the checkout button
        const checkoutButton = document.getElementById('proceed-checkout');
        checkoutButton.addEventListener('click', () => {
            // Show the checkout fields
            checkoutFields.style.display = 'block';
        });

        // Add event listener to the "Add Quantity" button
        

        // Add event listener to the "Close" button
        closeCheckoutButton.addEventListener('click', () => {
            // Hide the checkout panel when the "Close" button is clicked
            checkoutFields.style.display = 'none';
        });

        // Add event listener to the "Calculate Change" button
        const calculateChange = document.getElementById('calculate-change');
        calculateChange.addEventListener('click', () => {
            const cashReceived = parseFloat(cashReceivedInput.value);
            const totalAmountValue = parseFloat(totalAmount.textContent.split('₱')[1]);
            if (!isNaN(cashReceived)) {
                if (cashReceived >= totalAmountValue) {
                    const change = cashReceived - totalAmountValue;
                    changeAmount.textContent = change.toFixed(2);
                } else {
                    alert('Cash received is less than the total amount.');
                }
            }
        });

        // Add event listener to the "Proceed" button
        const proceedButton = document.getElementById('proceed-transaction');
        proceedButton.addEventListener('click', () => {
            const cashReceived = parseFloat(cashReceivedInput.value);
            const totalAmountValue = parseFloat(totalAmount.textContent.split('₱')[1]);
            if (!isNaN(cashReceived)) {
                if (cashReceived >= totalAmountValue) {
                    const change = cashReceived - totalAmountValue;
                    changeAmount.textContent = change.toFixed(2);
                    const receipt = generateReceipt(cart, change);
                    displayReceipt(receipt);
                } else {
                    alert('Cash received is less than the total amount.');
                }
            }
        });


        // Function to generate a receipt from the cart data
        function generateReceipt(cart) {
            let receipt = 'Receipt:\n';
            let totalAmount = 0;

            for (const barcode in cart) {
                const product = cart[barcode];
                const itemTotal = product.price * product.qty;
                totalAmount += itemTotal;
                receipt += `${product.name} x${product.qty}: ₱${itemTotal.toFixed(2)}\n`;
            }

            receipt += `Total Amount: ₱${totalAmount.toFixed(2)}`;

            return receipt;
        }

        function clearEntries() {
            
            cart = {};
            window.location.href = "pos.php";
        }


        function displayReceipt(receipt) {
            // Display the receipt content in a popup or an element on your page
            alert(receipt);

            // Add a delay of 3 seconds (3000 milliseconds) before clearing entries or refreshing
            setTimeout(function () {
                console.log('Delay completed. Clearing entries...');
                clearEntries(); // You need to implement the clearEntries function
                // Alternatively, you can refresh the page with: window.location.reload();
            }, 3000);
        }

        function generateReceipt(cart, change) {
            let receipt = 'Receipt:\n';
            let totalAmount = 0;

            for (const barcode in cart) {
                const product = cart[barcode];
                const itemTotal = product.price * product.qty;
                totalAmount += itemTotal;
                receipt += `${product.name} x${product.qty}: ₱${itemTotal.toFixed(2)}\n`;
            }

            receipt += `Total Amount: ₱${totalAmount.toFixed(2)}\n`;
            receipt += `Change: ₱${change.toFixed(2)}`;

            return receipt;
        };

        // Add event listener to the delete buttons
        scannedProductsList.addEventListener('click', (event) => {
            if (event.target.classList.contains('delete-product')) {
                const barcode = event.target.getAttribute('data-barcode');
                if (cart[barcode]) {
                    if (cart[barcode].qty > 1) {
                        cart[barcode].qty -= 1;
                    } else {
                        delete cart[barcode];
                    }
                    updateScannedProducts();
                }
            }
        });

        // Add event listener to the "Add Quantity" buttons
        scannedProductsList.addEventListener('click', (event) => {
            if (event.target.classList.contains('add-qty-product')) {
                const barcode = event.target.getAttribute('data-barcode');
                if (cart[barcode]) {
                    cart[barcode].qty += 1;
                    updateScannedProducts();
                }
            }
        });

        // Add event listener to the barcode input field
        const barcodeInput = document.getElementById('barcode-input');
        barcodeInput.addEventListener('input', () => {
            const barcode = barcodeInput.value;
            if (barcode.length > 0) {
                addProductToCart(barcode);
                barcodeInput.value = ''; // Clear the input field after adding the product
            }
        });
    </script>
</body>

</html>