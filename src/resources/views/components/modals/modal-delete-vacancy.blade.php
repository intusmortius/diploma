<div class="modal fade" id="vacancyDeleteModal" tabindex="-1" role="dialog" aria-labelledby="vacancyDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vacancyDeleteModalLabel">{{ __("Vacancy closure") }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body chat-modal-text">
                {{ __("Are you sure you want to close this vacancy ?") }}
            </div>
            <div class="modal-footer chat-modal-footer">
                <button type="button" class="btn btn-secondary chat-modal-close-btn"
                    data-dismiss="modal">{{ __("Cancel") }}</button>
                <button id="vacancy_delete_btn" type="button"
                    class="btn btn-primary chat-modal-delete-btn">{{ __("Close") }}</button>
            </div>
        </div>
    </div>
</div>