<div class="modal fade" id="sugFeedbackDeleteModal<?php echo $suggestion['id']; ?>" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this suggestion?
            </div>
            <form action="core/operations.php" method="post">
                <input type="hidden" name="suggestion_id" value="<?php echo $suggestion['id']; ?>">
                <input type="hidden" name="remove_sug_feedback" value="1">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>