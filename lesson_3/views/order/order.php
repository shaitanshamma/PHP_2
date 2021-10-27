<h2>Заказ</h2>

<?php foreach ($order as $item):?>
    <div>
        <h3>name: <?=$item['name']?></h3>
        <p>uid: <?=$item['session_uid']?></p>
        <p>phone: <?=$item['phone']?></p>
        <p>date: <?=$item['date']?></p>
        <p>price: <?=$item['total']?></p>
    </div>
<?php endforeach;?>
