<? 
include 'connect.php';
include 'header.php'; 
?>


<script>
function notifyMe() {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
	alert("This browser does not support desktop notification");
  }

  // Let's check if the user is okay to get some notification
  else if (Notification.permission === "granted") {
	// If it's okay let's create a notification
	var notification = new Notification("Hi there!");
  }

  // Otherwise, we need to ask the user for permission
  // Note, Chrome does not implement the permission static property
  // So we have to check for NOT 'denied' instead of 'default'
  else if (Notification.permission !== 'denied') {
	Notification.requestPermission(function (permission) {

	  // Whatever the user answers, we make sure we store the information
	  if(!('permission' in Notification)) {
		Notification.permission = permission;
	  }

	  // If the user is okay, let's create a notification
	  if (permission === "granted") {
		var notification = new Notification("Hi there!");
	  }
	});
  }

  // At last, if the user already denied any notification, and you 
  // want to be respectful there is no need to bother him any more.
}
</script>

<button onclick="notifyMe()"> test notifications </button>

<script>
	var Notification = window.Notification || window.mozNotification || window.webkitNotification;

	Notification.requestPermission(function (permission) {
		// console.log(permission);
	});

	function show() {
		window.setTimeout(function () {
			var instance = new Notification(
				"test", {
					body: "test"
				}
			);

			instance.onclick = function () {
				// Something to do
			};
			instance.onerror = function () {
				// Something to do
			};
			instance.onshow = function () {
				// Something to do
			};
			instance.onclose = function () {
				// Something to do
			};
		}, 0);

		return false;
	}
</script>

<a href="#" onclick="return show()">Notify me!</a>