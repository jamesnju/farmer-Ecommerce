<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
<?php
        include('./header.php');
    ?>
    <div class="contc">
        <h1>Reach us</h1>
        <h2>We Would like</h2>
        <h3>to hear from you</h3>
        <p>use the form below if you have any query, concern
            on our services.
        </p>
        <p>We will reach you within before 24 hours Elapse.</p>
    </div>
    <div>
        <section>
            <div class="call">
                <h1><i class="fa-solid fa-phone"></i> +2345677</h1>
            </div>
            <div class="email">
                <h1><i class="fa-solid fa-envelope-open"></i> farmer@ac.ke</h1>
            </div>
        </section>
    </div>
    <div>
    <fieldset>
        <form action="">
            <label for="">
                <input type="text" class="form" placeholder="Enter Your Name" name="usename">
            </label>
            <label for="">
                <input type="email" class="form"placeholder="Enter Email" name="email">
            </label>
            <label for="">
                <input type="text" class="form" placeholder="Subject" name="subject">
            </label>
            <label for="">
                <input type="text" class="form" placeholder="Message" name="message">
            </label>
            <button class="sendbtn">Send message</button>
        </form>
    </fieldset>
    </div>
    <?php include('./footer.php') ?>
  
</body>
</html>