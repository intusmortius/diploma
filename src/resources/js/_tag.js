
const inputWrapper = document.querySelector("#tag_input_wrapper");
const inputEl = document.querySelector("#tag_input_field");
const tagContainer = document.querySelector("#tag_container");
const tagRemoveBtn = document.querySelectorAll(".tag_remove_btn");
const suggestedTagContainer = document.querySelector("#suggested_tag_list");

//add event listeners
if(inputWrapper)
    inputWrapper.addEventListener("click", inputFocus);
if(inputEl) {
    inputEl.addEventListener("focusout", blurInput);
    inputEl.addEventListener("keydown", preventFromSubmit);
    inputEl.addEventListener("keyup", showSuggestedTags);
}
if(tagContainer)
    tagContainer.addEventListener("click", removeTag);
if(suggestedTagContainer)
    suggestedTagContainer.addEventListener("click", addSuggestedTag);


// functions

function inputFocus() {
    inputEl.focus();
    inputWrapper.classList.add("focus");
}

function blurInput() {
    inputWrapper.classList.remove("focus");
}

function addSuggestedTag(e) {
    if(e.target.closest(".suggested-tag-item")) {
        inputEl.value = e.target.closest(".suggested-tag-item").innerText;
        addTag();
        suggestedTagContainer.classList.add("hide");
    }
}

function addTag() {
    const val = inputEl.value.trim();

    if(val){
        
        const tags = [...document.querySelector("#tag_container").children];
        const isExist = tags.find((tag)=>{
            return tag.innerText === val;
        });

        if(!isExist){
            const li = `
            <li class="tag-input-item">
            <input type="checkbox" name="tags[]" value="${val}" class="tag-checkbox" checked>
                <span class="tag-input-item-name">${val}</span>
                <button type="button" class="tag-input-item-btn tag_remove_btn">
                    <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.77812 0.707076C8.16865 0.316552 8.80181 0.316552 9.19234 0.707077V0.707077C9.58286 1.0976 9.58286 1.73077 9.19234 2.12129L2.12127 9.19236C1.73075 9.58288 1.09758 9.58288 0.707056 9.19236V9.19236C0.316532 8.80183 0.316532 8.16867 0.707056 7.77814L7.77812 0.707076Z"
                            fill="white" />
                        <rect y="1.70706" width="2" height="12" rx="1"
                            transform="rotate(-45 0 1.70706)" fill="white" />
                    </svg>
                </button>
            </li>`;
            tagContainer.innerHTML += li;
            inputEl.value = "";
        }
        inputEl.value = "";
    }
}

function removeTag(e) {
    if(e.target.closest(".tag-input-item-btn")){
        e.target.closest(".tag-input-item").remove();
    }    
}

function preventFromSubmit(e) {
    if(e.keyCode == 13) {
        e.preventDefault();
        return;
    }
}

function showSuggestedTags(e) {
    if(e.keyCode == 32 || e.keyCode == 13){
        e.preventDefault();
        addTag();
    }

    const val = inputEl.value;

    $.ajax({
        type:"GET",
        url: `/tags/suggested`,
        data: {
            _token: $("meta[name='csrf-token']").attr("content"),
            name: val,
        },
        dataType:'json',
        success:function(response){
            if(response){
                suggestedTagContainer.classList.remove("hide");
                suggestedTagContainer.innerHTML = "";
                response.forEach(el => {
                    const li = document.createElement("li");
                    li.classList.add("suggested-tag-item");
                    li.innerText = el;
                    suggestedTagContainer.appendChild(li);
                });
            } else {
                suggestedTagContainer.classList.add("hide");
            }
        },
        error:function(response){
            // console.log(response)
        },
    })
    
}
