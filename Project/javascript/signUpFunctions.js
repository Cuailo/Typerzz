let eyeicon = document.getElementById("eyeicon");
let password = document.getElementById("password");
let password2 = document.getElementById("password2");
let submitBtn = document.getElementById("submitBtn");
let errorMsg = document.getElementById("errorMsg");

eyeicon.onclick = function () {
  if (password.type === "password" && password2.type === "password") {
    password.type = "text";
    password2.type = "text";
    eyeicon.src = "./images/eye-open.png";
  } else {
    password.type = "password";
    password2.type = "password";
    eyeicon.src = "./images/eye-close.png";
  }
};

function checkPasswords() {
  if (password.value !== "" && password2.value !== "" && password.value === password2.value) {
    submitBtn.disabled = false;
    errorMsg.style.display = "none";
  } else {
    submitBtn.disabled = true;

    if (password.value !== "" && password2.value !== "") {
      errorMsg.style.display = "block";
    } else {
      errorMsg.style.display = "none";
    }
  }
}

password.addEventListener('input', checkPasswords);
password2.addEventListener('input', checkPasswords);
