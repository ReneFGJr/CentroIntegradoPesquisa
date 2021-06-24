<div class="container">
<table class="table">
    <tr>
    <th>Service Name</th>
    <th>Service</th>
    </tr>

    <?php foreach($services as $service): ?>
        <tr>
            <td><?php echo $service['serviceName'];?></td>
            <td><?php echo $service['service'];?></td>
            <td><?php echo anchor('main/edit/'.$service['id_service'],'[ed]');?></td>
            <td><?php echo anchor('main/delete/'.$service['id_service'],'[X]');?></td>
        </tr> 
    <?php endforeach; ?>
</table>
<?php echo $pages->links(); ?>
</div>