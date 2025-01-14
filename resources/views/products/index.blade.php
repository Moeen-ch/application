<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>

<body>
    <h1>This is index page</h1>
    <div>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <br>
    <a href="{{ route('product.create') }}">Create new record</a>
    <br><br>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('product.destroy', $product->id) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
