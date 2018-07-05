<div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand logo" href="#"><?php if(isset($_SESSION['company'])){echo "{$_SESSION['company']}";} ?></a>
                </div>
                    <ul class="nav navbar-nav menu">
                        <li><a href="home.php">Home</a></li>
                        <li class="dropdown" >
                                <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-shopping-cart"></span>
                                    Items<span class="caret"></span></a>
                                        <ul class="dropdown-menu undermenu">
                                            <li><a id="addcategory" class="btn btn-danger btn-block">Add Category</a></li>
                                            <li><a id="additem" class="btn btn-danger btn-block">Add Item</a></li>
                                        </ul>
                         </li>
                        <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-floppy-save"></span>
                                    Stocks<span class="caret"></span></a>
                                <ul class="dropdown-menu undermenu">
                                    <li><a id="newstock" class="btn btn-danger">New stock</a></li>
                                </ul>
                            </li>
                            <?php
                                if(isset($_SESSION['role']) &&( $_SESSION['role']=='admin' ||
                                        $_SESSION['role']=='accountant' || $_SESSION['role']=='cashier')){
                                    echo '<li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-usd"></span>
                                    Account<span class="caret"></span></a>
                                <ul class="dropdown-menu undermenu">
                                    <li><a id="orderform" class="btn btn-info btn-block">Order form</a></li>
                                    <li><a id="deliveryorder" class="btn btn-info btn-block">Delivery order</a></li>
                                    <li><a href="stock.php" id="bill" class="btn btn-info btn-block">Bill</a></li>
                                </ul>
                            </li>  ';
                                }
                            ?>
                            <li class="dropdown" >
                                
                                <a class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-dashboard"></span>Dashboard<span class="caret"></span> </a>
                                <ul class="dropdown-menu undermenu">
                                    <li><a href="?boards" id="" class="btn btn-info btn-block"><i class="fa fa-table"></i>boards</a></li>
                                    <li><a href="?charts" id=""  class="btn btn-info btn-block"><i class="fa fa-area-chart"></i>charts</a></li>
                                </ul>
                            </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-user"></span>
                                    <?php if(isset($_SESSION['user']) && !isset($_SESSION['subuser'])){echo "{$_SESSION['user']}";}
                                    else if(isset ($_SESSION['user']) && isset ($_SESSION['subuser'])){
                                        echo $_SESSION['user']."@".$_SESSION['subuser'];}?><span class="caret"></span></a>
                                    <ul class="dropdown-menu undermenu">
                                        <?php
                                            if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
                                                echo '<li><a href="#" id="adduser"><span class="glyphicon glyphicon-plus"></span>Add user</a></li>';
                                            }
                                        ?>
                                        <li><a href="Includes_action_client_server/logout.php" id="logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                                    </ul>
                        </li>
                    </ul>
            </div>