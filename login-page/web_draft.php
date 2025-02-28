<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<style>
body {
  font-family: sans-serif;
  background-color: #f4f4f4;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  margin: 0;
  background-image: url('neubg.jpg'); 
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  //filter: blur(3px); 
}

nav {
  background-color: rgba(255, 255, 255);
  color: black; 
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
  position: relative; 
  z-index: 10;
}

nav .circle {
  width: 40px;
  height: 40px;
  background-color: white;
  border-radius: 50%;
  margin-right: 10px;
  display: flex; 
  justify-content: center;
  align-items: center;
}

nav .circle img {
  max-width: 80%; 
  max-height: 80%;
}

nav .nav-title {
  flex-grow: 1;
  text-align: center;
  font-weight: bold;
}

nav .hamburger {
  cursor: pointer;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  width: 30px;
  height: 25px;
}

nav .hamburger .bar {
  width: 30px;
  height: 3px;
  background-color: black;
}

.login-container {
background-color: rgba(255, 255, 255);
  padding: 40px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: 350px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex; 
  flex-direction: column;
  align-items: center;
  z-index: 10;
}

.login-container h2 {
  text-align: center;
  margin-bottom: 25px;
  color: #333;
}

.login-container img {
  max-width: 100px; 
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  margin-bottom: 5px;
  color: #555;
}

.form-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-sizing: border-box;
}

.form-group button {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
}

.form-group button:hover {
  background-color: #45a049;
}

.form-group .error-message {
  color: red;
  margin-top: 5px;
}

.dropdown-menu {
  position: fixed;
  top: 0;
  right: -300px;
  width: 300px;
  height: 100%;
  background-color: #333;
  color: white;
  transition: right 0.3s ease;
  padding-top: 60px;
  z-index: 1000;
}

.dropdown-menu.show {
  right: 0;
}

.dropdown-menu ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.dropdown-menu ul li {
  padding: 15px 20px;
  border-bottom: 1px solid #555;
  cursor: pointer;
}

.dropdown-menu .close-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
  font-size: 20px;
  z-index: 1001;
}

.dropdown-menu .back-btn {
  position: absolute;
  bottom: 10px;
  left: 10px;
  cursor: pointer;
  font-size: 24px;
}

.hamburger.active .bar:nth-child(1) {
  transform: translateY(8px) rotate(45deg);
}

.hamburger.active .bar:nth-child(2) {
  opacity: 0;
}

.hamburger.active .bar:nth-child(3) {
  transform: translateY(-8px) rotate(-45deg);
}

hamburger.active {
  position: relative;
  z-index: 1001;
}

.welcome-message {
  display: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 4em;
  font-weight: bold;
  color: white;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
  z-index: 10; 
}

footer {
  background-color: rgba(0, 0, 0, 0.3);
  color: white;
  text-align: center;
  padding: 10px 0;
  width: 100%;
  margin-top: auto;
  position: relative; 
  z-index: 10; 
}

</style>
</head>
<body>

<nav>
  <div class="circle">
    <img src="neulogo.png" alt="Logo">
  </div>
  <div class="nav-title">NEU Kung Ano Man Tawag (i forgot)</div>
  <div class="hamburger">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </div>
</nav>

<div class="dropdown-menu">
  <span class="close-btn">&times;</span>
  <ul>
    <li>About</li>
    <li>Contact Us</li>
    <li>Privacy Notice</li>
  </ul>
  <div class="back-btn">&larr;</div> </div>

<div class="login-container">
  <img src="neulogo.png" alt="Logo">
  <h2>Login</h2>
  <form id="login-form" method="post" action="process_login.php">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
      <button id="login-btn" type="submit">Login</button>
    </div>
    <?php
      if (isset($_GET['error'])) {
        echo '<div class="form-group error-message">' . $_GET['error'] . '</div>';
      }
    ?>
  </form>
</div>

<div class="welcome-message">
    BULAGA WELCOME
</div>

<footer>
  Copyright chuchu bahala na kayo mag lagay HAHAHA
</footer>

<script>
  const hamburger = document.querySelector('.hamburger');
  const dropdownMenu = document.querySelector('.dropdown-menu');
  const closeBtn = document.querySelector('.dropdown-menu .close-btn');
  const backBtn = document.querySelector('.dropdown-menu .back-btn');
  const loginForm = document.getElementById('login-form');
  const loginBtn = document.getElementById('login-btn');
  const welcomeMessage = document.querySelector('.welcome-message');

  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    dropdownMenu.classList.toggle('show');
  });

  closeBtn.addEventListener('click', () => {
    dropdownMenu.classList.remove('show');
    hamburger.classList.remove('active');
  });

  backBtn.addEventListener('click', () => { 
    dropdownMenu.classList.remove('show');
    hamburger.classList.remove('active');
  });

  loginBtn.addEventListener('click', (e) => {
    e.preventDefault();
    loginForm.style.display = 'none';
    welcomeMessage.style.display = 'block';
  });

</script>

</body>
</html>
