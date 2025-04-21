<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Product</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="/admin/css/add_produk.css" />
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2><i class="fas fa-box-open"></i> Add New Product</h2>
        <a href="{{ route('my_store') }}" class="back-link"><i class="fas fa-arrow-left"></i> Back to My Store</a>
      </div>

      <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
          <label for="name">Product Name</label>
          <input type="text" id="name" name="name" placeholder="Ex: Dendeng Balado Premium" required>
        </div>

        <div class="form-group">
          <label for="category">Category</label>
          <input type="text" id="category" name="category" placeholder="Ex: Dendeng, Snacks, etc." required>
        </div>

        <div class="form-group">
          <label for="price">Harga (Rp)</label>
          <input type="number" id="price" name="price" placeholder="Contoh: 15000" required>
        </div>        

        <div class="form-group">
          <label for="image">Upload Image</label>
          <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn primary"><i class="fas fa-save"></i> Save Product</button>
          <a href="{{ route('my_store') }}" class="btn secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
