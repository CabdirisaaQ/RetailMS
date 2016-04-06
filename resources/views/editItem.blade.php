<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content col-lg-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Item Detail</h4>
            </div>
            <div class="modal-body">
                <form id="editItem" name="editItem" class="form-horizontal" method="post" action="{{ route('/sales/editItem',26) }}" novalidate="">
                    @if (Auth::user()->isAdmin())
                    <div class="form-group error">
                        <label for="edit-unitPrice" class="col-sm-4 control-label">Unit Price</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control has-error" id="edit-unitPrice-txt" name="unitPrice" placeholder="Unit Price" value="">
                        </div>
                    </div>
                    @else
                    <div class="form-group error">
                        <label for="edit-unitPrice" class="col-sm-4 control-label">Unit Price</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control has-error" id="edit-unitPrice-txt" name="unitPrice" placeholder="Unit Price" value="" disabled>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="edit-qty" class="col-sm-4 control-label">Quantity</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="edit-qty-txt" name="qty" placeholder="eg. 500" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block" id="item-save-btn" value="update">Save</button>
                <button type="button" class="btn btn-primary btn-block" id="item-delete-btn" value="delete">Remove</button>
                <button type="button" class="btn btn-primary btn-block" id="item-uom-btn" value="changeUOM">Change UOM</button>
                <input id="itemId" type="hidden" name="id" value="">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
<!--                 <meta name="_token" content="{!! csrf_token() !!}" />
 -->            </div>
        </div>
    </div>
</div>