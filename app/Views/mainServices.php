<div class="container">

<?php echo anchor('main/service/edit/','novo','class="btn btn-primary"');?>

<table class="table">
    <tr>
    <th>Service Name</th>
    <th>Service</th>
    </tr>

    <?php foreach($services as $service): ?>
        <tr>
            <td><?php echo $service['serviceName'];?></td>
            <td><?php echo $service['service'];?></td>
            <td><?php echo anchor('main/service/edit/'.$service['id_service'],'[ed]');?></td>
            <td><?php echo anchor('main/service/delete/'.$service['id_service'],'[X]');?></td>
        </tr> 
    <?php endforeach; ?>
</table>
<?php echo $pages->links(); ?>
</div>