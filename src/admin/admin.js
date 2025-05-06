document.addEventListener("DOMContentLoaded", function () {
  const table = document.querySelector(".users-table");

  table.addEventListener("click", function (e) {
    if (e.target.classList.contains("delete-btn")) {
      const userId = e.target.dataset.id;
      if (confirm("Are you sure you want to delete this user?")) {
        deleteUser(userId, e.target.closest("tr"));
      }
    }
  });
});

async function deleteUser(userId, row) {
  try {
    const response = await fetch("delete-user.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ id: userId }),
    });

    if (response.ok) {
      row.remove();
    } else {
      alert("Error deleting user");
    }
  } catch (error) {
    console.error("Error:", error);
    alert("Error deleting user");
  }
}
