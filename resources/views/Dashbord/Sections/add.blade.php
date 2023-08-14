<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashbord/Section/SectionTable_Trans.add_sections')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{trans('Dashbord/Section/SectionTable_Trans.name_sections')}}</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashbord/Section/SectionTable_Trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashbord/Section/SectionTable_Trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>