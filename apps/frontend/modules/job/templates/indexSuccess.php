<h1>Welcome!!!!</h1>

<table>
  <thead>
    <tr>
      <th>Full name</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($employees as $employee): ?>
    <tr>
      <td><?php echo $employee->getFname() ?> <?php echo $employee->getLname() ?></td>
      <td><?php echo $employee->getAddress() ?></td>
      <td><a href="<?php echo url_for('job/show?id='.$employee->getId().'&fname='.$employee->getFname()) ?>">
          <?php echo $employee->getId() ?>
        </a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  