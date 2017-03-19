chrome.runtime.sendMessage({sessionData: sessionStorage.getItem('portal.user.id')}, function(response) {
  console.log(response);
});