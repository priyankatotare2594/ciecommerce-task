<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background: #fff;
            width: 420px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        h2 { text-align:center; }
        .form-group { margin-bottom:15px; }
        input, button {
            width:100%; padding:10px;
            border-radius:6px;
        }
        button {
            background:#667eea;
            border:none;
            color:#fff;
            font-weight:bold;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>➕ Add Product</h2>

<form method="post" action="<?= site_url('admin/products/store') ?>" enctype="multipart/form-data">


       <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" required>
        </div>

        <div class="form-group">
            <label>Images</label>
            <input type="file" name="images[]" multiple>

        </div>

        <button type="submit">Save Product</button>
    </form>
</div>

</body>
</html>
