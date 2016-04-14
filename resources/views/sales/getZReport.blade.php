        <!-- Modal -->
        <div id="GetZReport-modal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Z-Report Dailog</h4>
              </div>
              <div class="modal-body">
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
            </div>
          </div>
        </div>
