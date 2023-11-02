<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="pos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="pos-container">
        <div class="header">
            <div class="business-name">Your Business Name</div>
            <div class="user-name">User: John Doe</div>
        </div>
        <div class="content">
            <div class="product-box">
                <h2 style="color: white">Product List</h2>
                <div class="product-list">
                    <div class="product">
                        <h3>Product 1</h3>
                        <p>Price: ₱10.00</p>
                        <label>Qty: <input type="number" value="1"></label>
                        <button class="add-to-cart" data-barcode="123456" id="submit-input">Add to Cart</button>
                    </div>
                    <div class="product">
                        <h3>Product 2</h3>
                        <p>Price: ₱15.00</p>
                        <label>Qty: <input type="number" value="1"></label>
                        <button class="add-to-cart" data-barcode="789012">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="scanned-box">
                <h2 style="color: white">Scanned Products</h2>
                <input type="text" id="barcode-input" placeholder="Scan a product by barcode">
                <div id="scanned-products-list">
                </div>
                <div class="total-amount">
                    <h2 style="color: white">Total Amount: ₱0.00</h2>
                </div>
            </div>
        </div>
        <div class="checkout-buttons">
            <button class="checkout-button">Checkout</button>
            <button type="submit" class="print-receipt-button">Print Receipt</button>
        </div>
    </div>
    <?php
    include '../database/db.php';
    $query = "SELECT * FROM products";
    $result = $conn->query($query);
    if ($result = $conn->query($query)) {
        $productname = array();
        $productcode = array();
        $productprice = array();
        while ($row = $result->fetch_assoc()) {
            $productname[] = $row["productname"];
            $productcode[] = $row["productcode"];
            $productprice[] = $row["productprice"];
        }
    }

    ?>
    <script>
        const productnames = <?php echo json_encode($productname); ?>;
        const productprice = <?php echo json_encode($productprice); ?>;
        const productcode = <?php echo json_encode($productcode); ?>;
        const scannedProductsList = document.getElementById('scanned-products-list');
        const barcodeInput = document.getElementById('barcode-input');
        const submitInput = document.getElementById('submit-input');
        const totalAmount = document.querySelector('.total-amount h2');
        let cart = {}; // Keeps track of scanned items

        // Add event listener to the barcode input field
        barcodeInput.addEventListener('keyup', (event) => {

            const barcode = barcodeInput.value;
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
                    //alert('Product not found.');
                }
            }
            barcodeInput.value = ''; // Clear the input field
            updateScannedProducts();
        });
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
        // Update the scanned products list and total amount
        let total1 = 0;
        function updateScannedProducts() {
            scannedProductsList.innerHTML = '';
            let total = 0;
            let i = 1;
            for (const barcode in cart) {
                const product = cart[barcode];
                const listItem = document.createElement('div');
                listItem.className = "product";
                listItem.id = i;
                total += product.price * product.qty;
                total1 = total;
                
                listItem.innerHTML = `<h3>${product.name}</h3> <h5>Qty: x<input type="number" value=${(product.qty)} onclick="qtyFunction()"></input>
                </h5> <h5>Price: ₱${(product.price * product.qty).toFixed(2)}</h5><button onclick="myFunction(this)" 
                data-id = ${(i)} data-qty =  ${(product.qty)} data-price = ${(product.price)} data-total = ${(total)}>Remove</button>`;
                scannedProductsList.appendChild(listItem);
                i++;
          
            }
            totalAmount.innerHTML = `<h2>Total Amount: ₱${total.toFixed(2)}</h2>`;
        }
        let myFunction = button => {
            let id = button.getAttribute('data-id');
            let price = button.getAttribute('data-price');
            let qty = button.getAttribute('data-qty');
            let total = button.getAttribute('data-total');

            let finaltotal = total1 - price * qty;
            alert(finaltotal);
            const element = document.getElementById(id);
            element.remove();
            total1 = finaltotal;
          
            totalAmount.innerHTML = `<h2>Total Amount: ₱${total1.toFixed(2)}</h2>`
        }
        
            


    </script>
</body>

</html>