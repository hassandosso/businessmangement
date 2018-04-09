<div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><?php if(isset($_SESSION['company'])){echo "{$_SESSION['company']}";} ?></a>
                </div>
                    <ul class="nav navbar-nav menu">
                        <li><a href="home.php">Home</a></li>
                        <li class="dropdown" >
                                <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-shopping-cart"></span>
                                    Items<span class="caret"></span></a>
                                        <ul class="dropdown-menu undermenu">
                                            <li><button id="addcategory" class="btn btn-danger btn-block">Add Category</button></li>
                                            <li><button id="additem" class="btn btn-danger btn-block">Add Item</button></li>
                                            <li><a href="index.php?category=category" id="listitems" class="btn btn-danger btn-block">List Items</a></li>
                                        </ul>
                         </li>
                        <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-floppy-save"></span>
                                    Stocks<span class="caret"></span></a>
                                <ul class="dropdown-menu undermenu">
                                    <li><button id="newstock" class="btn btn-danger btn-block">New stock</button></li>
                                    <li><button id="stockavalaible" class="btn btn-danger btn-block">Stock available</button></li>
                                </ul>
                            </li>
                        <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-usd"></span>
                                    Account<span class="caret"></span></a>
                                <ul class="dropdown-menu undermenu">
                                    <li><button id="orderform" class="btn btn-danger btn-block">Order form</button></li>
                                    <li><button id="deliveryorder" class="btn btn-danger btn-block">Delivery order</button></li>
                                    <li><button id="bill" class="btn btn-danger btn-block">Bill</button></li>
                                </ul>
                            </li>   
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="Includes_action_client_server/logout.php" id="logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
            </div>