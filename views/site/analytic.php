<form>
<div class="row" >
    <div class="col-4" >
        <label>Start Date</label>
        <input class="form-control" value="<?=$startDate ?>" name="start_date" id="start_date" type="date" >
    </div>
    <div class="col-4" >
        <label>End Date</label>
        <input class="form-control" value="<?=$endDate?>" name="end_date" id="end_date" type="date" >
    </div>
    <div class="col-4" >
        <button style="margin-top: 32px;" class="btn btn-success" >Filter</button>
    </div>
</div>
</form>

<?php if(!empty($searchData)): ?>
<table class="table table-bordered" >
    <thead>
    <tr>
        <th>дата</th>
        <th>поступило чеков</th>
        <th>обработано чеков из текущего дня</th>
        <th>обработано чеков из предыдущих дней</th>
        <th>не обработано чеков из текущего дня</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($searchData as $data): ?>
    <tr>
        <td><?=$data['ticket_date']?></td>
        <td><?=$data['enter_count']?></td>
        <td><?=$data['proced_tickets']?></td>
        <td><?=$data['procit_ticket_till']?></td>
        <td><?=$data['not_proced_tickets']?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
