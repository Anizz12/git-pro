<?php

@include 'config.php';



if(isset($_POST['send'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'message sent already!';
    }else{
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
        $message[] = 'message sent successfully!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section id="page-header" class="about-header">
         <h3>#Let's Talk</h3>
         
         <p><b>LEAVE A MESSAGE, We love to hear from you!</b></p>
      
    </section>

   <section id="contact-details" class="section-p1">
    <div class="details">
        <span>GET IN TOUCH</span>
        <h2>contact us </h2>
        <div>
            <li>
                <i class="far fa-envelope"></i>
                <p>contactus@gmail.com</p>
            </li>
            <li>
                <i class="fas fa-phone-alt"></i>
                <p>9810363017</p>
            </li>
            <li>
                <i class="far fa-clock"></i>
                <p>24hour</p>
            </li>
        </div>
    </div>

    <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3529.450301140067!2d85.5242515!3d27.6334231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb0f33b1a23b53%3A0xe8ec0b92bdf38a54!2sBanepa!5e0!3m2!1sen!2snp!4v1632728325302!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
   </section>

   <section id="form-details">
       <form action="">
           <span>LEAVE A MESSAGE</span>
           <h2>We love to hear from you</h2>
           
       </form>

       <div class="people">
           <div>
               <img src="image/about/anish.jpg"  alt="">
               <p><span>Anish kc</span>Member <br> Phone:9868836723 <br> E-mail:anishkecy12@gmmail.com</p>
           </div>
       </div>
   </section>





<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>