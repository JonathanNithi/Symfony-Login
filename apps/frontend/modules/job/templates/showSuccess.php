<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $employee->getId() ?></td>
    </tr>
    <tr>
      <th>E:</th>
      <td><?php echo $employee->getEId() ?></td>
    </tr>
    <tr>
      <th>Fname:</th>
      <td><?php echo $employee->getFname() ?></td>
    </tr>
    <tr>
      <th>Lname:</th>
      <td><?php echo $employee->getLname() ?></td>
    </tr>
    <tr>
      <th>Address:</th>
      <td><?php echo $employee->getAddress() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('job/edit?id='.$employee->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('job/index') ?>">List</a>
