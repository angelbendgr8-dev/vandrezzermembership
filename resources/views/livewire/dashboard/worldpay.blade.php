<!-- Please note the code on this page is provided by Worldpay as a working example only.   -->
<!-- Any changes you make to the copies of these pages will not be supported by us.     -->

<html>
<!-- The name, style, and properties of the page are defined in between the 'head' tags. -->

<head>
    <title>HTML Redirect 0.1</title>
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="description" content="HTML Redirect Example 0.1">
    <meta name="keywords" content="Redirect, html">
    <style type="text/css">
        td {
            text-align: "left";
            vertical-align: "middle";
            font-family: "arial";
            color: "black"
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        h7 {
            text-align: "center";
            vertical-align: "middle";
            font-family: "arial";
            color: "black"
        }
    </style>
</head>

<!-- The content to be used on the page is placed between the 'body' tags. -->

<body>
    <!-- This is an order details submission form, for more information on the elements within a form see the sections 3.5 to 3.7 -->

    <form action="https://secure-test.worldpay.com/wcc/purchase" name="BuyForm" method="POST">
        <input type="hidden" name="testMode" value="100">
        <!-- These first four elements are mandatory. -->
        <input type="hidden" name="instId" value="1449617">
        <input type="hidden" name="cartId" value="abc123">
        <input type="hidden" name="currency" value="USD">
        <input type="hidden" name="amount" value="200">

        <!-- These elements below are optional. -->
        <input type="hidden" name="desc" value="Blue T-Shirt, Medium">
        <input type="hidden" name="name" value="CAPTURED">

        <!-- End of order details submission form elements. -->

        <!-- JavaScript is used to give functionality to some of the pages elements. -->
        <!-- This function defines the price of each product. To add the product edit further down the page. -->
        <script language=JavaScript>
            function calc(productNo) {
                if (productNo == 1) {
                    document.BuyForm.amount.value = 5.00;
                    document.BuyForm.desc.value = "Product 1";
                } else if (productNo == 2) {
                    document.BuyForm.amount.value = 10.00;
                    document.BuyForm.desc.value = "Product 2";
                }
                // To add a new product price, copy from here
                else if (productNo == 3) {
                    document.BuyForm.amount.value = 15.00;
                    document.BuyForm.desc.value = "Product 3";
                }
                //...to here, and paste directly below.
                // You will need to alter the 'productNo' and its price value.
            }
        </script>

        <h1>One-Stop Shop</h1>

        <!-- This table provides layout for the products listed on the webpage. -->
        <table align="center" cellpadding="3" border="2">
            <tr>
                <td>Product 1</td>
                <td> Price: &pound;5.00</td>
                <td><input type="submit" value="Buy button" onClick="calc(1)"></td>
            </tr>
            <tr>
                <td>Product 2</td>
                <td>Price: &pound;10.00</td>
                <td><input type="submit" value="Buy button" onClick="calc(2)"></td>
            </tr>
            <!-- To add a new product, copy from here... -->
            <tr>
                <td>Product 3</td>
                <td>Price: &pound;15.00</td>
                <td><input type="submit" value="Buy button" onClick="calc(3)"></td>
            </tr>
            <!-- ...to here, and paste directly below. You will need to alter three things: product number, price, and calc (put product number here) -->
        </table>
    </form>
</body>

</html>
