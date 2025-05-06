function showAlert(message, type) {
  const alertDiv = document.getElementById("alert");
  alertDiv.textContent = message;
  alertDiv.className = `alert ${type} show`;

  // Remove the alert after 3 seconds
  setTimeout(() => {
    alertDiv.className = "alert";
  }, 3000);
}

// Check for alerts on page load
document.addEventListener("DOMContentLoaded", function () {
  const alertData = document.getElementById("alert-data");
  if (alertData) {
    const message = alertData.getAttribute("data-message");
    const type = alertData.getAttribute("data-type");
    if (message && type) {
      showAlert(message, type);
    }
  }
});
