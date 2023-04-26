const username = document.getElementById("username");
const password = document.getElementById("password");
const err = document.getElementById("error");

username.addEventListener("focus", function() {
  err.style.display = 'none';
});

password.addEventListener("focus", function() {
  err.style.display = 'none';
});







