@if (isset($portfolio))
<div class="modal fade" id="portfolio-edit-{{$portfolio->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Portfolio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ websiteUpdateRoute('portfolio',$portfolio->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    @include('website::layouts.portfolio.edit_add')
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="{{ websiteEditRoute('portfolio',$portfolio->id) }}" class="btn btn-warning">Mass Edit</a>
                <button type="submit" class="btn btn-primary" title="Delete Post">Edit</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endif