<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit page</title>
</head>

<body>
    <h1>Edit a product</h1>
    

    <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
        @csrf

        <div>
            <label for="">Name</label>
            <input type="text" name="name" id="" placeholder="Name" value="{{ $product->name }}">
        </div>
        <div>
            <label for="">Qty</label>
            <input type="text" name="qty" id="" placeholder="Qty" value="{{ $product->qty }}">
        </div>
        <div>
            <label for="">Price</label>
            <input type="text" name="price" id="" placeholder="Price" value="{{ $product->price }}">
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" id="" placeholder="Description"
                value="{{ $product->description }}">
        </div>
        <div>
            <input type="submit" value="Update product">
        </div>
    </form>
</body>

</html>
