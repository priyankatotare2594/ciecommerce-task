<h2>Cart Items</h2>

<table border="1" cellpadding="10">
<tr>
<th>Name</th>
<th>Price</th>
<th>Qty</th>
<th>Total</th>
</tr>

<?php $grand=0; foreach($items as $i): ?>
<tr>
<td><?= $i->name ?></td>
<td><?= $i->price ?></td>
<td><?= $i->qty ?></td>
<td><?= $i->price*$i->qty ?></td>
</tr>
<?php $grand+= $i->price*$i->qty; endforeach; ?>

<tr>
<td colspan="3"><b>Grand Total</b></td>
<td><?= $grand ?></td>
</tr>
</table>
