$( document ).ready(function() {
    $("#vacancy_comment_add_submit").on("click",addComment)
    $(".filters_category_wrapper").on("click", toggleSearchTag)
});

function addComment() {
    const el = $("#vacancy_comment_add_textarea");
    const text = el.val(); 
    const vacancy_id = el.attr("data-vacancy");

    var _token = $("meta[name='csrf-token']").attr("content");
    if(text) {
        $.ajax({
            type:"POST",
            url: `/vacancies/comments`,
            data: {
                _token: _token,
                text: text,
                vacancy_id: vacancy_id,
            },
            dataType:'json',
            success:function(response){
                if(response && response.text && response.name && response.create_at){
                    const container = $("#vacancy_comment_list");
                    const html  = `
                    <div class="vacancy-comment">
                        <div class="vacancy-comment-name-block">
                            <div class="vacancy-worker-avatar">
                                <img src="/img/avatar-default.svg" alt="avatar">
                            </div>
                            <div class="vacancy-comment-right">
                                <div class="vacancy-worker-name">${response.name}</div>
                                <button class="btn flare-effect">${response.contact || "Contact"}</button>
                            </div>
                        </div>
                        <div class="vacancy-comment-text">
                          ${response.text}
                        </div>
                        <div class="vacancy-comment-date">${response.posted || "Posted"}: ${response.create_at}</div>
                    </div>`;
                    el.val("");
                    container.prepend(html);
                }
            },
            error:function(response){
                console.log(response)
            },
        })
    }
}


function toggleSearchTag(e) {
    const el = $(e.target);
    const checkbox = el.siblings("input");

    if(checkbox) {
        el.toggleClass("active");
        if(checkbox.attr("checked")){
            checkbox.removeAttr("checked");
        } else {
            checkbox.attr("checked", "checked");
        }
    }
}
