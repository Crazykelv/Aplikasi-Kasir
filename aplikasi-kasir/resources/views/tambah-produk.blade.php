<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body class="flex items-center justify-center">
    <form method="POST" action="{{url('addProduk')}}" enctype="multipart/form-data">
        @csrf
        <div class="bg-opacity-60 bg-black mt-52 px-7 py-24 rounded-xl flex flex-col gap-14">
            <div class="flex flex-col gap-10">
                <input class="px-5 py-2 rounded-lg text-xl outline-1 outline-purple-700 border-2 border-gray-400 text-purple-700" type="text" name="nama" placeholder="Nama">
                <input class="px-5 py-2 rounded-lg text-xl outline-1 outline-purple-700 border-2 border-gray-400 text-purple-700" type="text" name="kelamin" placeholder="Kelamin">
                <input class="px-5 py-2 rounded-lg text-xl outline-1 outline-purple-700 border-2 border-gray-400 text-purple-700" type="text" name="kategori" id="password" placeholder="Kategori">
                <input class="px-5 py-2 rounded-lg text-xl outline-1 outline-purple-700 border-2 border-gray-400 text-purple-700" type="number" name="harga" placeholder="Harga">
                <input class="px-5 py-2 rounded-lg text-xl outline-1 outline-purple-700 border-2 border-gray-400 text-purple-700" type="number" name="stok" placeholder="Stok">
                <input class="px-5 py-2 rounded-lg text-xl outline-1 outline-purple-700 border-2 border-gray-400 text-purple-700" type="file" name="foto" id="password" placeholder="Password">
            </div>
            <div>
                <button type="submit" class="text-white w-full bg-transparent border-2 border-white font-semibold px-32 py-2 rounded-lg hover:bg-white hover:text-purple-700">LOGIN</button>
            </div>
        </div>
    </form>
</body>
</html>