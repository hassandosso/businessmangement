<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Business Management</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--	<link href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono&subset=greek,cyrillic">
        <link rel="stylesheet" href="Style/indexstyle.css">
        <link rel="stylesheet" href="Style/loginstyle.css">
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top mynav">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false" aria-controls="navbar">
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>                        
      		    </button>
                            
                <a class="navbar-brand" href="index.php"><h2>Business Management</h2></a>
			</div>
                    <div class="mybtn"><button id="myBtn">Connect</button></div>
                    <div class="menu">
                        <?php include 'includes/menubar.php'; ?>
                    </div>
			
                </div>
       </div>
       <div class="container-fluid afternav">
                    <h3 class="text-primary mb-4">Dashboard</h3>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title font-weight-normal text-success">7874</h4>
                                    <p class="card-text">Stock Available</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                            aria-valuemax="100">75%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title font-weight-normal text-info">75632</h4>
                                    <p class="card-text ">Items sold</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                            aria-valuemax="100">40%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title font-weight-normal text-warning">2156</h4>
                                    <p class="card-text">Items Ordered</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100">25%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title font-weight-normal text-danger">89623</h4>
                                    <p class="card-text">our Items</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                            aria-valuemax="100">65%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
       </div>
                   <!-- all Modal content --> 
                 <div class="row">
            <section class="col-xs-3">
<!--                 The Modal -->
                <div id="myModal-login" class="modal">

<!--                   Modal content -->
                    <?php include 'includes/loginpage.php'; ?>
                </div>
                
                <div id="myModal-category" class="modal" >

<!--                   Modal content -->
                    <?php include 'includes/addcategory.php'; ?>
                </div>
                
                <div id="myModal-item" class="modal">

<!--                   Modal content -->
                    <?php include 'includes/additem.php'; ?>
                </div>
                 <div id="myModal-newStock" class="modal">

<!--                   Modal content -->
                    <?php include 'includes/newstock.php'; ?>
                </div>
                
            </section>
        </div>
    </body>
    <script src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript"
            src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js">
        </script>
        
        <script src="JavaScript/loginpage.js"></script>
       
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</html>


