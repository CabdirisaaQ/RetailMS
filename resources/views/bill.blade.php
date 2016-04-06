<div class="modal fade" id="myBill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h1 class="modal-title text-center" id="myModalLabel">The total amount for this bill is</h1>
            </div>
            <div class="modal-body">
                <h2 class="bill text-center">
                </h2>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-lg btn-block" id="bill-ok-btn" value="ok">OK</button>
                <button type="button" class="btn btn-primary btn-lg btn-block" id="bill-back-btn" value="back" data-dismiss="modal">Go Back</button>
<!--                 <input id="itemId" type="hidden" name="id" value="">
 -->                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </div>
        </div>
    </div>
</div>