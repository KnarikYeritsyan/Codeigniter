<?php
/*echo 'Hello from '.$name.' home view <br> Age: '.$age.'<br> Location: '.$location.'<br> Base url: ';
echo base_url();*/?>
<table>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Location</th>
    </tr>
<?php foreach ($users as $user):?>
    <tr>
      <!--  <td><?php /*echo $user['first_name'];*/?></td>
        <td><?php /*echo $user['last_name'];*/?></td>
        <td><?php /*echo $user['age'];*/?></td>
        <td><?php /*echo $user['location'];*/?></td>-->
        <td><?php echo $user->first_name;?></td>
        <td><?php echo $user->last_name;?></td>
        <td><?php echo $user->age;?></td>
        <td><?php echo $user->gender;?></td>
        <td><?php echo $user->location;?></td>
    </tr>
<?php endforeach; ?>
</table>