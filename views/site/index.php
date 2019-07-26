<h2>Groups</h2>
<?php if(!empty($groups)): ?>
<div class="row" >
    <div class="col-6" >
        <?php foreach ($groups as $group): ?>
            <p><a href="/site/group/<?=$group['id'] ?>" ><?=$group['name']?></a></p>
        <?php endforeach; ?>
    </div>
    <div class="col-6" >
        <a class="btn btn-info" href="/site/analytic" >Analytic</a>
    </div>
</div>

<?php else: ?>
    <p>We don't have any group</p>
<?php endIf; ?>