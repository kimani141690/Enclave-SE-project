function makeReplyVisible(){
    console.log("Called");
    var reply = document.querySelector("#forum-reply");

    reply.style.display='block';
}  
function makeReplyDisappear(){
    var reply = document.querySelector("#forum-reply");

    reply.style.display='none';
}    