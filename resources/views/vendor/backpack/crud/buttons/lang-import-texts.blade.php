<div class="btn-group mt-2 mb-2">
    <button class="btn btn-secondary buttons-collection btn-sm" tabindex="0" aria-controls="crudTable"
        type="button" data-toggle="modal" data-style="zoom-in" data-backdrop="false"
        data-target="#importExcel">
        <span>
            <i class="la la-file-import"></i> {{ trans('translationsystem.import_texts.title') }}
        </span>
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" style="background-color:#0000005c">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
