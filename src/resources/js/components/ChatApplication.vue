<template>
    <div class="h-100">
        <div class="chat-container">
            <div class="chat-users">
                <h3 class="chat-users-title">Users list</h3>
                <ul class="chat-list flex-column">
                    <li v-for="user in users" class="chat-list-item chat_list_item" :key="user.id" @click="openChat(user.id)" 
                        :class="{ 'font-weight-bold': chatUserID === user.id }" :data-id="user.id">
                        <a href="#">{{ user.name }}</a>
                        <div class="chat-user-delete" data-toggle="modal" data-target="#chatDeleteModal" v-on:click.prevent="addDeleteId" :data-id="user.id" >
                            <svg width="10" height="11" viewBox="0 0 10 11"  xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.77812 0.707076C8.16865 0.316552 8.80181 0.316552 9.19234 0.707077V0.707077C9.58286 1.0976 9.58286 1.73077 9.19234 2.12129L2.12127 9.19236C1.73075 9.58288 1.09758 9.58288 0.707056 9.19236V9.19236C0.316532 8.80183 0.316532 8.16867 0.707056 7.77814L7.77812 0.707076Z"/>
                                <rect y="1.70706" width="2" height="12" rx="1" transform="rotate(-45 0 1.70706)"/>
                            </svg>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="chat-messenger">
                <div id="chat_messenger_wrapper" class="chat-messenger-wrapper" v-show="chatOpen && !loadingMessages">
                    <div class="chat-message-container" ref="messageBox">
                      <div class="chat-message-line" v-for="message in messages.slice().reverse()"
                          :class="{ 'chat-self': message.sender_id !== chatUserID }">
                          <div class="chat-message-text-wrapper">
                              <small class="chat-message-name">{{ message.sender.name }} at
                                  {{ message.created_at }}</small>
                              <p class="chat-message-text">{{ message.message }}</p>
                          </div>
                      </div>
                      <div class="chat-messages-empty" v-show="messages.length === 0">
                        There are no messages yet
                      </div>
                    </div>
                    <div class="chat-message-send" v-on:click="focusTextarea">
                        <resizable-textarea ref="resize">
                            <textarea id="chat_input" type="text" class="chat-message-input" rows="1" placeholder="New message"
                                aria-label="New message" aria-describedby="button-addon2" v-model="newMessage"
                                maxlength="2000"></textarea>
                        </resizable-textarea>
                        <button class="btn flare-effect chat-message-btn" type="button" id="button-addon2"
                            @click="sendMessage">
                            Send
                        </button>
                    </div>
                </div>

                <div v-show="loadingMessages">
                    <p>Loading messages... Please wait</p>
                </div>
                <div id="chat_no_room" v-show="!chatOpen && !loadingMessages">
                    <p>
                        No chat room is open. Please click on user to start a conversation
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ChatApplication",
        data: () => {
            return {
                users: [],
                messages: [],
                chatOpen: false,
                chatUserID: null,
                loadingMessages: false,
                newMessage: "",
            };
        },
        created() {
            let app = this;
            app.loadUsers();
        },
        watch: {
            messages: function () {
                let element = this.$refs.messageBox;
                element.scrollTop = element.scrollHeight;
            },
        },
        methods: {
            openChat(userID) {
                let app = this;
                const el = $("#chat_no_room");
                
                if (app.chatUserID !== userID) {
                    app.chatOpen = true;
                    app.chatUserID = userID;

                    // Start pusher listener
                    Pusher.logToConsole = true;

                    var pusher = new Pusher("5251a3e1bd64fc28ac0e", {
                        cluster: "eu",
                        forceTLS: true,
                    });

                    var channel = pusher.subscribe(
                        "newMessage-" + app.chatUserID + "-" + app.$root.userID
                    ); // newMessage-[chatting-with-who]-[my-id]

                    channel.bind("App\\Events\\MessageSent", function (data) {
                        if (app.chatUserID) {
                            app.messages.push(data.message);
                        }
                    });
                    // End pusher listener
                    app.loadMessages();

                    el.hide();
                } else {
                    el.show();
                }
            },
            loadUsers() {
                let app = this;
                axios.get("api/users").then((resp) => {
                    app.users = resp.data;
                });
            },
            loadMessages() {
                let app = this;
                app.loadingMessages = true;
                app.messages = [];
                axios
                    .post("api/messages", {
                        sender_id: app.chatUserID,
                    })
                    .then((resp) => {
                        app.messages = resp.data;
                        app.loadingMessages = false;
                    });
            },
            sendMessage() {
                let app = this;
                if (app.newMessage !== "") {
                    axios
                        .post("api/messages/send", {
                            sender_id: app.$root.userID,
                            receiver_id: app.chatUserID,
                            message: app.newMessage,
                        })
                        .then((resp) => {
                            app.messages.push(resp.data);
                            app.newMessage = "";
                        });
                }
            },
            triggerInput() {
                this.$nextTick(() => {
                    this.$refs.resize.$el.dispatchEvent(new Event("input"));
                });
            },
            focusTextarea(){
                const textarea = document.querySelector("#chat_input");
                textarea.focus();
            },
            addDeleteId(e){
                const el = e.target.closest(".chat-user-delete")
                const deleteEl = document.querySelector("#chat_delete_btn");
                if(el && el.getAttribute("data-id")){
                    deleteEl.setAttribute("data-id", el.getAttribute("data-id"));
                }
            }
        },
    };

</script>
