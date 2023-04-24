<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($user->getId(), 'user_edit', $user) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_username">
  <?php echo $user->getUsername() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_encryptedPassword">
  <?php echo $user->getEncryptedPassword() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_employee_id">
  <?php echo $user->getEmployeeId() ?>
</td>
