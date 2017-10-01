var conn = new WebSocket("https:\\www.yahoo.com");
conn.onopen = function(evt) { onOpen(evt) };
conn.onclose = function(evt) { onClose(evt) };
conn.onmessage = function(evt) { onMessage(evt) };
conn.onerror = function(evt) { onError(evt) };

function onOpen(evt)
{
    console.log(evt);
}
function onClose(evt)
{
    console.log(evt);
}
function onMessage(evt)
{
    console.log(evt);
}
function onError(evt)
{
    console.log(evt);
}