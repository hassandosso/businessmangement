<div style="float: right; margin-top: 50px;">
    <button class="btn btn-small btn-danger todonote">Today TODO</button>
    <button class="btn btn-small btn-danger todonote">Current Week TODO</button>
    <button class="btn btn-small btn-danger todonote">All TODO</button>
</div>
<ul class="notes" style="margin-top: 50px;" id="takenote">
    <li>
        <div>
            <form class="noteform">
            <small class="date" readonly="readonly"></small>
            <small class="id hidden"></small>
            <input style="width: 70%; margin-bottom: 10px; margin-top:10px" class="title" placeholder="Title">
            <textarea style="width: 100%; height:50%" class="content" placeholder="write something" rows="4"></textarea>
            <label>Set reminder:</label>
            <input type="date" style="margin-bottom: 10px" class="reminder">
            <span style="float:right" class="btn btn-default btn-small save">save</span>
            </form>
        </div>
    </li>
</ul><br>
<ul class="notes" id="registered-note">
    
</ul>