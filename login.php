<?php
require_once('assets/includes/head.php')
?>
<body>
<div class="auth-form-outer-sec">
  <div class="auth-form-inner-sec">
    <div class="auth-inner-padding">
      <div class="auth-form-header">
        <img src="assets/images//logo.png">
      </div>

      <form id="loginForm">
        <div class="auth-form-sec">
          <div class="form-group">
            <label for="">Username/Email</label>
            <input type="text" class="form-control cus-input" name="email" ngModel formControlName="email" id="email"
              placeholder="Username/Email">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control cus-input" name="password" ngModel formControlName="password"
              id="password" placeholder="Password">
          </div>
          <div>
            <button type="submit" class="submit-btn btn">Login</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<script src="assets/js/main.js"></script>
</body>
</html>