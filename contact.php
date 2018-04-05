<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Business Management</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
<!--        Bootstrap and awesome icon-->
	<link href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">   
        <link href="fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono&subset=greek,cyrillic">
        
<!--        CSS link-->
        
        <link rel="stylesheet" href="Style/contactstyl.css">
        <link rel="stylesheet" href="Style/home_contact_ModalStyle.css">
        <link rel="stylesheet" href="Style/footerstyle.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <?php include 'includes/navbar.php'; ?>
        </nav>
        <div class="container afternav">
            <div class="row">
                <section class="col-md-4">
                    <div class="modal" id="myModal-login">
                        <?php include 'includes/loginpage.php'; ?>
                    </div>
                </section>
            </div>
            <div class="row col-md-12">
            <aside class="col-md-3"></aside>
                <section class="section col-md-6">

                    <!--Section heading-->
                    <h2 class="section-heading h1 pt-4">Contact us</h2>
                    <!--Section description-->
                    <p class="section-description">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                        matter of hours to help you.</p>
                        <form id="contact-form" name="contact-form" action="" method="POST" class="">
                                
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Your name"><br>
                                <input type="email" id="email" name="email" class="form-control" placeholder="your email">
                            </div>
                            <div class="form-group">
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea type="text" id="message" name="message" rows="5" class="form-control md-textarea" placeholder="write something"></textarea>
                            </div>
                            <div class="form-group sendbtn">
                                <input type="submit" name="sendmail" value="Send" class="btn btn-success">
                            </div>

                                
                        </form>

                </section>
            <aside class="col-md-3"></aside>
            </div>
           
        </div>
        <div class="foot">
                   <?php include 'includes/footer.php'; ?>
        </div>
<!--Section: Contact v.2-->
        
    </body>
    <script src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript"
            src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js">
            
        </script>
    <script src="JavaScript/signup_signin.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</html>
