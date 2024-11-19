export class Message {
    // constructor(id, user_id, content, created_at) {
    //     this.message_id = id;
    //     this.user_id = user_id;
    //     this.content = content;
    //     this.created_at = created_at;
    // }

    constructor(data){
        this.message_id = data.id;
        this.user_id = data.user_id;
        this.userName = data.userName;
        this.content = data.content;
        this.created_at = data.created_at;
    }

    toJSON() {
        return JSON.parse(JSON.stringify({
            id: this.message_id,
            user_id: this.user_id,
            userName: this.userName,
            content: this.content,
            created_at: this.created_at
        }));
    }
}
