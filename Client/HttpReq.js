const reqUrl = "http://localhost:8888/chat_tool/weather/";
const request = new XMLHttpRequest();
let txtPlaceId;
let txtId;

window.onload = () => {
    txtPlaceId = document.querySelector(".PlaceId");
    txtId = document.querySelector(".Id");
    request.onload = () => {
        ResponseShow(request);
    }
}
const GetRequest = () => {
    request.open("GET", reqUrl + txtPlaceId.value, true);
    request.send(null);
}

const PostRequest = () => {
    request.open("POST", reqUrl + txtPlaceId.value, true);
    request.send(null);
}

const DeleteRequest = () => {
    request.open("DELETE", reqUrl + txtId.value, true);
    request.send(null);
}

const PutRequest = () => {
    request.open("PUT", reqUrl + txtId.value + "/" + txtPlaceId.value, true);
    request.send(null);
}

//命名
const ResponseShow = (request) => {
    let res = document.querySelector(".Response");
    res.innerHTML = request.responseText;
    console.log(request.response);
}

