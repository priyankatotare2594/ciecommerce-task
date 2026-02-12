<!DOCTYPE html>
<html>
<head>
    <title>Products</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #f1f3f6;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #343a40;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .add-btn {
            background:#007bff;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:5px;
        }

        img{
            border-radius:5px;
        }
    </style>
</head>

<body>

<div class="container">

<h2>🛒 Product Management</h2>

<div style="margin-bottom:15px;">
    Total Products: <?= count($products) ?>
    <a class="add-btn" href="<?= site_url('admin/products/create') ?>">➕ Add Product</a>
</div>

<?php if(!empty($products)): ?>

<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Images</th>
        <th>Action</th>
    </tr>

    <?php foreach ($products as $index => $p): ?>
    <tr>
        <td><?= $index+1 ?></td>

        <td><?= $p->name ?></td>

        <td>₹ <?= $p->price ?></td>

        <td>
            <?php if(!empty($p->images)): ?>
                <?php foreach($p->images as $img): ?>
                    <img src="<?= $img ?>" width="60">
                <?php endforeach; ?>
            <?php endif; ?>
        </td>

        <td>
            <a href="<?= site_url('admin/products/edit/'.$p->id) ?>">✏ Edit</a> |
            <a href="<?= site_url('admin/products/delete/'.$p->id) ?>"
               onclick="return confirm('Delete this product?')">🗑 Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<?php else: ?>
    <p>No products found</p>
<?php endif; ?>

</div>
