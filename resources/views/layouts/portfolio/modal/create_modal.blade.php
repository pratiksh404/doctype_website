<div class="modal fade" id="portfolio-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Portfolio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ websiteStoreRoute('portfolio') }}" method="POST">
                    @csrf
                    @include('website::layouts.portfolio.edit_add')
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="{{websiteCreateRoute('portfolio')}}" class="btn btn-info">Mass Image Assignment</a>
                <button type="submit" class="btn btn-primary" title="Delete Post">Create</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>