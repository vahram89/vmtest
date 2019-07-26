<h2>Edit Ticket</h2>

<form method="post">
    <div class="form-group" >
        <label>Number</label>
        <input class="form-control" name="number" type="number" value="<?=$ticket['number']?>" >
    </div>
    <div class="form-group" >
        <label>Tracking Number</label>
        <input class="form-control" name="tracking_number" type="text" value="<?=$ticket['tracking_number']?>" >
    </div>
    <div class="form-group" >
        <label>Follower</label>
        <select id="follower_select" name="user_id" class="form-control" >
            <?php if($ticket['user_id']): ?>
                <option value="<?=$ticket['user_id']?>" ><?=$ticket['user_name']?></option>
            <?php endif; ?>
        </select>
    </div>
    <div class="form-group" >
        <label>Journal</label>
        <select id="journal_select" <?=empty($userJournals)? 'disabled': ''?> name="journal_id" class="form-control" >
            <?php if(!empty($userJournals)): ?>
                <?php foreach ($userJournals as $journal): ?>
                    <option value="<?=$journal['id']?>" <?=($journal['id'] == $ticket['journal_id'])? 'selected': '' ?> ><?=$journal['title']?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="form-group" >
        <label>Status</label>
        <select name="status" class="form-control" >
            <?php foreach ($model->statusData as $key => $status): ?>
                <option value="<?=$key?>" <?=($key == $ticket['status'])? 'selected': '' ?> ><?=$status?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group" >
        <label>Sent date</label>
        <input id="sent_date" name="sent_date" type="date" class="form-control" value="<?=$ticket['sent_date']?>" >
    </div>

    <button class="btn btn-success" >Save</button>
</form>
