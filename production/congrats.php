
      <?php session_start(); ?>
      <div class="body content">
          <div class="alert alert-success"><?php $_SESSION['message'] ?></div>
          <div>Welcome</div>
          <div><span class="user"><img src='<?= $_SESSION['account_image'] ?>' ></span></div>
      </div>
