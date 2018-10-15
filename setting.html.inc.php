<div id="edit_body">
  <div id="edit_account">
    <table>
      <tr>
        <td><?php echo $_SESSION['username']; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo $_SESSION['avatar']; ?>" alt=""></td>
      </tr>
      <tr>
        <td><span id="change_photo">Change photo</span></td>
        <td id="avatar_setting">
          <!-- <a href="?load_new_current_photo">Load new</a> -->
          <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="new_avatar" value="">
            <input type="hidden" name="load_new_current_photo" value="">
            <input type="submit" name="" value="Add photo">
          </form>
          <a href="?delete_current_photo">Delete current photo</a>
          <a href="?close_setting_avatar" id="cansel_setting_avatar">Cansel</a>
        </td>
      </tr>
      <form action="" method="post" id="setting_form_personal_data">
      <tr>
        <td><input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="user_name" value="<?php echo $_SESSION['username']; ?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="name" value="<?php echo $_SESSION['name']; ?>"></td>
      </tr>
      <tr>
        <td>
          <select name="b_day">
            <option value="day">Day</option>
            <?php for($i = 1; $i <= 31; $i++): ?>
              <option value="<?php echo $i; ?>"<?php if($i == $_SESSION['b_day']) echo "selected"; ?>><?php echo $i; ?></option>
            <?php endfor; ?>
          </select>
          <select name="b_month">
              <option value="month">Month</option>
              <option value="january" <?php if($_SESSION['b_month'] == "january") echo selected; ?>>January</option>
              <option value="february" <?php if($_SESSION['b_month'] == "february") echo selected; ?>>February</option>
              <option value="march" <?php if($_SESSION['b_month'] == "march") echo selected; ?>>March</option>
              <option value="april" <?php if($_SESSION['b_month'] == "april") echo selected; ?>>April</option>
              <option value="may" <?php if($_SESSION['b_month'] == "may") echo selected; ?>>may</option>
              <option value="june" <?php if($_SESSION['b_month'] == "june") echo selected; ?>>June</option>
              <option value="july" <?php if($_SESSION['b_month'] == "july") echo selected; ?>>July</option>
              <option value="august" <?php if($_SESSION['b_month'] == "august") echo selected; ?>>August</option>
              <option value="september" <?php if($_SESSION['b_month'] == "september") echo selected; ?>>September</option>
              <option value="october" <?php if($_SESSION['b_month'] == "october") echo selected; ?>>October</option>
              <option value="november" <?php if($_SESSION['b_month'] == "november") echo selected; ?>>November</option>
              <option value="december" <?php if($_SESSION['b_month'] == "december") echo selected; ?>>December</option>
            </select>
          </select>
          <select name="b_year">
            <option value="year">Year</option>
            <?php for($i = 2018; $i >= 1905; $i--): ?>
              <option value="<?php echo $i; ?>" <?php if($i == $_SESSION['b_year']) echo "selected"; ?>><?php echo $i; ?></option>
            <?php endfor; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <select name="sex">
            <option value="sex">Sex</option>
            <option value="woman" <?php if($_SESSION['sex'] == "woman") echo selected; ?>>Woman</option>
            <option value="man" <?php if($_SESSION['sex'] == "man") echo selected; ?>>Man</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><input type="button" name="" value="Save" id="setting_button_change_personal_data"></td>
      </tr>
    </table>
    <input type="hidden" name="setting_personal_data" value="">
  </form>
  <table>
    <form action="" method="post" id="setting_form_password">
      <tr>
        <td><input type="text" name="new_password" value=""></td>
      </tr>
      <tr>
        <td><input type="text" name="new_password_again" value=""></td>
      </tr>
      <tr>
        <td><input type="text" name="old_password" value=""></td>
      </tr>
      <tr>
        <td><input type="button" name="" value="Change" id="setting_button_change_password"></td>
      </tr>
      <input type="hidden" name="setting_change_password" value="">
    </form>
  </table>
  <div id="message">
    <?php if (isset($_GET['error_login'])) {
      echo $_GET['error_login'];
    } ?>
  </div>
  </div>
</div>
<?php exit(); ?>
