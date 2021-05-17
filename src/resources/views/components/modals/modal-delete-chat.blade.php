<div class="modal fade" id="chatDeleteModal" tabindex="-1" role="dialog" aria-labelledby="chatDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatDeleteModalLabel">{{ __("Chat deletion") }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body chat-modal-text">
                {{ __("Are you sure you want to delete this chat ?") }}
            </div>
            <div class="modal-footer chat-modal-footer">
                <button type="button" class="btn btn-secondary chat-modal-close-btn"
                    data-dismiss="modal">{{ __("Close") }}</button>
                <button id="chat_delete_btn" type="button"
                    class="btn btn-primary chat-modal-delete-btn">{{ __("Delete") }}</button>
            </div>
        </div>
    </div>
</div>