<div id="GetZReport-modal" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div id="transaction-history-content" class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Z Report form</h4>
      </div>
      <div class="modal-body right">
        <form id="GetZReportform" class="form-vertical" role="form" method="POST" action="{{ route('/sales/ZReport') }}">           
            
            <div class="form-group">
                <label for="user" class="control-label">Select user</label>
                <select id="usersList" name="users" class="form-control">
                     
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Generate Z-report</button>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
       </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>