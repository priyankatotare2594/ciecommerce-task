<h2>Edit Product</h2>

<form method="post" action="<?= base_url('admin/products/update/'.$product->id) ?>">

    <input type="text" name="name" value="<?= $product->name ?>" required>
    <br><br>

    <input type="number" name="price" value="<?= $product->price ?>" required>
    <br><br>

    <h4>Images:</h4>

    <?php foreach($images as $img): ?>
        <img src="<?= base_url('uploads/products/'.$img->image) ?>" width="80">
    <?php endforeach; ?>

    <br><br>

    <button type="submit">Update</button>
</form>
