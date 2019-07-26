<h2>Tickets</h2>
<?php if(!empty($tickets)): ?>

<input id="search_ticket" placeholder="Search" class="form-control" type="text" >

<table id="group_tickets" class="table table-bordered" >
    <thead>
    <tr>
        <th>Number</th>
        <th>Tracking Number</th>
        <th>File</th>
        <th>Sent Date</th>
        <th>Enter Date</th>
        <th>Follower</th>
        <th>Journal</th>
        <th>Status</th>
        <th>Manage</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($tickets as $ticket): ?>
            <tr>
                <td><?=$ticket['number']?></td>
                <td><?=$ticket['tracking_number']?></td>
                <td><?=$ticket['file']?></td>
                <td><?=$ticket['sent_date']?></td>
                <td><?=$ticket['enter_date']?></td>
                <td><?=!empty($ticket['user_id'])? $ticket['user_name']: '' ?></td>
                <td><?=!empty($ticket['journal_id'])? $ticket['journal_title']: ''?></td>
                <td><?=$model->statusData[$ticket['status']] ?></td>
                <td><a href="/site/edit/<?=$ticket['id']?>" >Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<p>No ticket found</p>
<?php endif; ?>