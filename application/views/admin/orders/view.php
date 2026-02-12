<h3>Order #<?=$order->id?></h3>

<p><b>Total:</b> ₹ <?=$order->total?></p>

<table class="table table-bordered">

<tr>
<th>Product</th>
<th>Qty</th>
<th>Price</th>
<th>Total</th>
</tr>

<?php foreach($items as $i): ?>

<tr>
<td><?=$i->name?></td>
<td><?=$i->qty?></td>
<td><?=$i->price?></td>
<td><?=$i->qty*$i->price?></td>
</tr>

<?php endforeach; ?>

</table>

<a href="<?=site_url('admin/orders')?>" class="btn btn-secondary">Back</a>
