document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("modernForm");
  const inputs = form.querySelectorAll("input");

  const validations = {
    username: {
      pattern: /^[a-zA-Z0-9_]{3,20}$/,
      message:
        "Username must be 3-20 characters and contain only letters, numbers, and underscores",
    },
    email: {
      pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
      message: "Please enter a valid email address",
    },
    password: {
      pattern: /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/,
      message:
        "Password must be at least 8 characters with at least one letter and one number",
    },
  };

  inputs.forEach((input) => {
    input.addEventListener("input", function () {
      validateInput(input);
    });
  });

  form.addEventListener("submit", function (e) {
    let isValid = true;

    inputs.forEach((input) => {
      if (!validateInput(input)) {
        isValid = false;
      }
    });

    if (!isValid) {
      e.preventDefault();
    }
  });

  function validateInput(input) {
    const validation = validations[input.id];
    const errorElement = input.nextElementSibling.nextElementSibling;

    if (!validation.pattern.test(input.value)) {
      errorElement.textContent = validation.message;
      input.style.borderBottomColor = "var(--error-color)";
      return false;
    } else {
      errorElement.textContent = "";
      input.style.borderBottomColor = "var(--primary-color)";
      return true;
    }
  }
});
