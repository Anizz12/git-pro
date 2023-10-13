<?php

@include 'config.php';


if(isset($_POST['add_to_wishlist'])){

   $user_id = $_POST['user_id'];
   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
  

  

   
   $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_wishlist_numbers) > 0){
       $message[] = 'already added to wishlist';
   }elseif(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{
       mysqli_query($conn, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
       $message[] = 'product added to wishlist';
   }

}

if(isset($_POST['add_to_cart'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{

       $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

       if(mysqli_num_rows($check_wishlist_numbers) > 0){
           mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
       }

       mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
       $message[] = 'product added to cart';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

    <section id="home">
         <h3>Communicate your tomorrow</h3><br>
         <h1>BEST IN STYLE COLLECTION FOR YOU</h1><br>
         <p><b>Get the Shoes according to choice <br>
             Look smarter from here.</b>
         </p><br>
         <button>Shop Now</button>
    </section>

    <section id="new">
        <h2>New Arrival</h2>
        <p>Lets try new classic foot wear</p>
        <div class="pro-container">
            <div class="pro" onclick="window.location.href='sproduct.html'">
                <img src="image/Nike.jpg">
                <div class="Des">
                    <h5>Nike Run Swift 3 Men's Road Running Shoes</h5>
                    <h4>Rs.7,500</h4>  
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a> 
                </div>
            </div>
            <div class="pro">
                <img src="image/Navy.jpg">
                <div class="Des">
                    <h5>Handmade Navy Blue Suede Shoes, Men's Dress Formal Slip On Loafers Shoes</h5>
                    <h4>Rs.5,790</h4>  
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a> 
                </div>
            </div>
            <div class="pro">
                <img src="image/caliber.jpg">
                <div class="Des">
                    <h5>Caliber Shoes Black Lace Up Formal Shoes For Men ( P 443 C ) – Caliber Shoes</h5>
                    <h4>Rs.3,450</h4>  
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a> 
                </div>
            </div>

            <div class="pro">
                <img src="image/bluesneaker.jpg">
                <div class="Des">
                    <h5>light blue sneaker</h5>
                    <h4>Rs.2,500</h4>  
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a> 
                </div>
            </div>

            <div class="pro">
                <img src="image/ak.jpg">
                <div class="Des">
                    <h5>Nike air jordan shoes</h5>
                    <h4>Rs.5,000</h4>  
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a> 
                </div>
            </div>

           

            <div class="pro">
                <img src="image/DrMartin.jpg">
                <div class="Des">
                    <h5>Dr Martens jadon 8 eye boots in black</h5>
                    <h4>Rs.7,000</h4>  
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a> 
                </div>
            </div>

            <div class="pro">
                <img src="image/avril.jpg">
                <div class="Des">
                    <h5>White converse </h5>
                    <h4>Rs.6000</h4>  
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a> 
                </div>
            </div>

            





        </div>
    </section>




<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>