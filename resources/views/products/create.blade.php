<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create page</title>
</head>

<body>
    <h1>Create page here!</h1>
    <form method="POST" action="{{ route('product.store') }}">
        @csrf
        <div>
            <label for="">Name</label>
            <input type="text" name="name" id="" placeholder="Name">
        </div>
        <div>
            <label for="">Qty</label>
            <input type="text" name="qty" id="" placeholder="Qty">
        </div>
        <div>
            <label for="">Price</label>
            <input type="text" name="price" id="" placeholder="Price">
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" id="" placeholder="Description">
        </div>
        <div>
            <input type="submit" value="Save a New Product">
        </div>
    </form>
</body>

</html>
