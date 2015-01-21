try {
    var _veo=_veo || [];
    var request = new XMLHttpRequest();
    var json = array2json(_veo);
    request.open("POST", "/catch_error/", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    request.setRequestHeader("Content-length", json.length);
    request.setRequestHeader("Connection", "close");
    request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    request.send("tags="+encodeURIComponent(json));
} catch(e) {
    /*console.log(e.message, e.stack);*/
}
