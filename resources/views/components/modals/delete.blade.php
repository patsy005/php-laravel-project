<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="deleteForm">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete
                    <strong id="itemNameInModal"></strong> (ID:
                    <span id="itemIdInModal"></span>)?
                </div>

                <div class="modal-footer d-flex gap-2">
                    <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="button button-danger">Yes, delete</button>
                </div>
            </form>
        </div>
    </div>
</div>