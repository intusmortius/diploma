const chatDeleteBtn = document.querySelector("#chat_delete_btn");

chatDeleteBtn.addEventListener("click", deleteChat);

function deleteChat(e) {
    const el = e.target;

    if(el){
        const id = el.getAttribute("data-id");

        $.ajax({
            type:"POST",
            url: `/chat/delete`,
            data: {
                _token: $("meta[name='csrf-token']").attr("content"),
                id: id,
            },
            dataType:'json',
            success:function(response){
                if(response){
                    const chatEl = document.querySelector(`.chat_list_item[data-id='${id}']`);
                    $('#chatDeleteModal').modal('toggle');
                    chatEl.remove();
                    $("#chat_no_room").show();
                    $("#chat_messenger_wrapper").hide();
                } 
            },
            error:function(response){
                console.log(response)
            },
        })
    }
}