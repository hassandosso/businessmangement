<h5 class="text-primary mb-4" style="margin-top: 40px;">Dashboard</h5>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="panel" style="background-color: #222; border-color: red;">
                <div class="panel-heading">
                <div class="dropdown setting">
                    <button class="btn theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a id="catlist" href="#" class="dropdown-item glyphicon glyphicon-list">List</a></li>
                        <li><a id="action" href="#" class="dropdown-item glyphicon glyphicon-adjust">Actions</a></li>
                    </ul>
                </div>
                <div class="card-block" style="color: white">
                    <h4 class="card-title font-weight-normal"><?php echo "{$rowcount}";?></h4>
                    <p class="card-text">Categories</p>
                </div>
                </div>
                <div class="panel-footer" style="height: 50px">
                  
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="panel panel-danger" style="border-color: #222">
                <div class="panel-heading">
                <div class="dropdown setting">
                    <button class="btn dropdown-toggle theme-toggle text-light"  data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a id="itemlist" href="#" class="dropdown-item glyphicon glyphicon-list">List</a></li>
                        <li><a id="Item-action" href="#" class="dropdown-item glyphicon glyphicon-adjust">Actions</a></li>
                    </ul>
                </div>
                <div class="card-block" style="color: #222">
                    <h4 class="card-title font-weight-normal"><?php echo "{$rowcount_item}";?></h4>
                    <p class="card-text">Items</p>
                </div>
                </div>
                <div class="panel-footer" style="height: 50px">
                    <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100">25%</div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="panel" style="background-color: #222; border-color: red;">
                <div class="panel-heading">
                <div class="dropdown setting">
                    <button class="btn dropdown-toggle theme-toggle text-light" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a id="stockList" class="dropdown-item" href="#"><span class="glyphicon glyphicon-adjust"></span>List</a></li>
                        <li><a class="dropdown-item" href="#"><span class="glyphicon glyphicon-list"></span>Action</a></li>
                    </ul>
                </div>
                    <div class="card-block" style="color: white">
                        <h4 class="card-title font-weight-normal"><?php echo "{$rowcount_stock}";?></h4>
                        <p class="card-text">Stocks</p>
                    </div>
                </div>
                <div class="panel-footer" style="height: 50px">
                    <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100">25%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="panel panel-danger" style="border-color: #222">
                <div class="panel-heading">
                <div class="dropdown setting">
                    <button class="btn dropdown-toggle theme-toggle text-light" data-toggle="dropdown">
                        <i class="fa fa-cog fa-1x"></i>
                    </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" id="soldDetails" href="#"><span class="fa fa-info-circle"></span>Detail</a></li>
                            </ul>
                </div>
                <div class="card-block" style="color: #222">
                    <h4 class="card-title font-weight-bold"><i class="fa fa-inr fa-1x"></i><?php echo number_format($all_amount['globalSold'],3); ?></h4>
                    <p class="card-text">Accounting</p>
                </div>
                </div>
                <div class="panel-footer" style="height: 50px">
                    <h4 class="card-title font-weight-normal " style="display: inline-block"><?php echo $billnum['billnum']; ?></h4>
                    <p class="card-text text-right" style="display: inline-block">bill(s)</p>
                </div>
            </div>
        </div>

