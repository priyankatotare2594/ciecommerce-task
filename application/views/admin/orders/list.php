<h3>Orders</h3>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>User</th>
<th>Total</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php foreach($orders as $o): ?>

<tr>
<td><?=$o->id?></td>
<td><?=$o->user_id?></td>
<td>₹ <?=$o->total?></td>
<td><?=$o->created_at?></td>
<td>
<a href="<?=site_url('admin/orders/view/'.$o->id)?>" class="btn btn-info btn-sm">View</a>
</td>
</tr>

<?php endforeach; ?>

</table>
