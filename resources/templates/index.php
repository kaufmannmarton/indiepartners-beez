<h4>Beez</h4>
<ul>
    <?php foreach($bees as $bee): ?>
    <li><?=$this->e($bee['role'])?> - <?=$this->e($bee['hp'])?></li>
    <?php endforeach ?>
</ul>
<form method="POST" action="/attack">
    <input type="submit" value="Attack" />
</form>
