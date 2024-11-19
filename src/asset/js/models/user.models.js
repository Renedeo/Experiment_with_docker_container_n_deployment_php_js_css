export class User {
    constructor(username, password) {
        this.username = username;
        // hash password
        // this.password = password;
        this.password = password; // Use btoa to hash the password
    }

    toJSON() {
        return JSON.parse(JSON.stringify({
            username: this.username,
            password: this.password
        }));
    }
}