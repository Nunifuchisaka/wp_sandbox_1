<div class="l_container_1">



<form name="loginform" id="loginform" action="<?php echo wp_login_url(); ?>" method="post">
  <table class="table_4">
    <tbody class="table_4__tbody">
      <tr class="table_4__tr">
        <th class="table_4__th">
          <label for="user_login">ログインID</label>
        </th>
        <td class="table_4__td">
          <input name="log" id="user_login" class="input input_1" value="" size="20" type="text">
        </td>
      </tr>
      <tr class="table_4__tr">
        <th class="table_4__th">
          <label for="user_pass">パスワード</label>
        </th>
        <td class="table_4__td">
          <input name="pwd" id="user_pass" class="input input_1" value="" size="20" type="password">
        </td>
      </tr>
      <tr class="table_4__tr is_submit">
        <th class="table_4__th"></th>
        <td class="table_4__td">
          <p class="login-submit">
            <input name="wp-submit" id="wp-submit" class="button button_4" value="ログイン" type="submit">
            <input name="redirect_to" value="<?php home_url(); ?>" type="hidden">
          </p>
        </td>
      </tr>
    </tbody>
  </table><!-- /.table_4 -->
  <!-- <p class="login-remember"><label><input name="rememberme" id="rememberme" value="forever" type="checkbox"> ログイン状態を保存する</label></p> -->
</form><!-- /#loginform -->



</div><!-- /.l_container_1 -->