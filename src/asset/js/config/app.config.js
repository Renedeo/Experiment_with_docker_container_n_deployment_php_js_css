var appConfig = {
  "username": null,
  "message_container": {
    "messages_container_length": 0,
    "messages_container_interval": 0,
    // messages_container_limit = 10
  },
  "ajax": {
    "url": {
      "baseURL": window.location.origin + '/',
      "messages": "server/getAllMessage.serverRequest.php",
      "sendMessage": "server/save.serverRequest.php",
      "loginUser": "server/Auth_server_side/isUser.auth.serverRequest.php",
      "registerUser": "server/Auth_server_side/User.save.serverRequest.php"
    }
  }
};


export default appConfig;
