<h3 class="text-primary mb-4">Dashboard</h3>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card">
                <div class="dropdown setting">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?category=modify"><span class="glyphicon glyphicon-adjust"></span>Modify</a></li>
                        <li><a class="dropdown-item" href="index.php?category=list"><span class="glyphicon glyphicon-list"></span>List</a></li>
                    </ul>
                </div>
                <div class="card-block">
                    <h4 class="card-title font-weight-normal text-success"><?php echo "{$rowcount}";?></h4>
                    <p class="card-text">Categories</p>
                    <div class="progress">
                        <div class="chart-wrapper" role="progressbar" style="width: 75%">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card">
                <div class="dropdown setting">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#"><span class="glyphicon glyphicon-adjust"></span>Modify</a></li>
                        <li><a class="dropdown-item" href="#"><span class="glyphicon glyphicon-list"></span>List</a></li>
                        <li><a class="dropdown-item" href="#"><span class="glyphicon glyphicon-list"></span>Sold</a></li>
                    </ul>
                </div>
                <div class="card-block">
                    <h4 class="card-title font-weight-normal text-info">75632</h4>
                    <p class="card-text ">Items</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                            aria-valuemax="100">40%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card">
                <div class="dropdown setting">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#"><span class="glyphicon glyphicon-adjust"></span>Modify</a></li>
                        <li><a class="dropdown-item" href="#"><span class="glyphicon glyphicon-list"></span>List</a></li>
                    </ul>
                </div>
                <div class="card-block">
                    <h4 class="card-title font-weight-normal text-warning">2156</h4>
                    <p class="card-text">Stocks</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100">25%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card">
                <div class="dropdown setting">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><span class="glyphicon glyphicon-adjust"></span>Modify</a></li>
                                <li><a class="dropdown-item" href="#"><span class="glyphicon glyphicon-list"></span>List</a></li>
                            </ul>
                </div>
                <div class="card-block">
                    <h4 class="card-title font-weight-normal text-danger">89623</h4>
                    <p class="card-text">Accounting</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                            aria-valuemax="100">65%</div>
                    </div>
                </div>
            </div>
        </div>