<form method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="form-group modal-content">
        <span class="close1">&times;</span>
        <h3 class="card-title text-primary text-left mb-5 mt-4">Add category</h3>
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
        
    </div>
    
</form>

