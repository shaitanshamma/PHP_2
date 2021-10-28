<h2>Заказ</h2>

<?php foreach ($cart as $item):?>
    <div>
        <h3>name: <?=$item['name']?></h3>
        <p>uid: <?=$item['session_uid']?></p>
        <p>quant: <?=$item['quant']?></p>
        <p>prod_id: <?=$item['prod_id']?></p>
    </div>
<?php endforeach;?>

<a href="/?c=cart&a=cart&page=<?=$page?>">Еще</a>