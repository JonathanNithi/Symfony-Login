<td colspan="4">
  <?php echo __('%%id%% - %%username%% - %%encryptedPassword%% - %%employee_id%%', array('%%id%%' => link_to($user->getId(), 'user_edit', $user), '%%username%%' => $user->getUsername(), '%%encryptedPassword%%' => $user->getEncryptedPassword(), '%%employee_id%%' => $user->getEmployeeId()), 'messages') ?>
</td>
