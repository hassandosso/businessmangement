<div class="modal-dialog" role="document">    
<div class="form-group modal-content">
        <div class="modal-header">
        <span class="close1">&times;</span>
        <h3 class="modal-title">Add category</h3>
        </div>
        <div class="modal-body">
        <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-inline">
              <input type="radio" name="addcate" class="form-control catradio" value="addcat" checked="checked">Add
              <input type="radio" name="addcate" class="form-control catradio" value="importcat">Import csv file
            </div>
            <div class="hideitem">
            <input type="text" name="catId" placeholder="Id" class="form-control">
            <input type="text" name="category" placeholder="Category's name" class="form-control">
            </div>
            <div id="category_csv" class="form-inline hidden">
              <input type='file' name='importcat' class='removefile'>
            </div>
            <input type="submit" name="savecat" value="Save" class="form-control btn btn-danger btn-cat">
        </form>

        </div>
    </div>
</div>  
    

