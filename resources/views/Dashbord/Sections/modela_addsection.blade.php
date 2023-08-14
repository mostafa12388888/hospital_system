<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashbord/Section/SectionTable_Trans.add_section')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('Sections_admin.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{trans('Dashbord/Section/SectionTable_Trans.section_name')}}</label>
                    <input type="text" name="name" require autofocus class="form-control">
                </div>
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{trans('Dashbord/Section/SectionTable_Trans.description_section')}}</label>
                    <!-- <input type="textarea" name="description" require  class="form-control"> -->
                    <textarea name="description" require  class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashbord/Section/SectionTable_Trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashbord/Section/SectionTable_Trans.submit')}}</button>
                </div>
            </form>
      </div>
     
    </div>
  </div>
</div>