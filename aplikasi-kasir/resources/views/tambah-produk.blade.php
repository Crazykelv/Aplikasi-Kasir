<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="public/css/login.css">
</head>

<body class="bg-[#dedede]">
    <header class=" bg-gradient-to-b from-[#7e5ca6] to-[#cd4cfb]">
        <a class="flex gap-5 px-16 items-center" href="{{url('dashboard')}}">
            <img class="w-20 h-20" src="pictures\icons8-arrow-96.png" alt="back">
            <h1 class="font-semibold text-white">Vilion Apparel</h1>
        </a>
    </header>

    <form method="POST" action="{{url('addProduk')}}" enctype="multipart/form-data">
        @csrf
            <div class="flex flex-col gap-10 my-10 items-center">
                <div class="file-input-wrapper">
                    <img id="imgChange" class="cursor-pointer max-h-[120px] max-w-[120px] rounded-full" src="pictures\plus.png" alt="click for change">
                    <input name="foto" type="file" id="fileInput" class="hidden">
                </div>
                <div class="bg-white flex flex-col p-6 gap-7 rounded-xl w-[350px]">
                    <input type="text" placeholder="Nama Produk" name="nama" class="w-full px-5 py-2 font-semibold border border-gray-500 rounded-lg outline-[#cd4cfb]">
                    <input type="text" placeholder="Harga" name="harga" class="w-full px-5 py-2 font-semibold border border-gray-500 rounded-lg outline-[#cd4cfb]">
                    <select class="font-semibold text-gray-500 outline-[#cd4cfb] px-4 py-2 border border-gray-500 rounded-lg" name="kelamin">
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                    <select class="font-semibold text-gray-500 outline-[#cd4cfb] px-4 py-2 border border-gray-500 rounded-lg" name="kategori">
                        <option value="setelan">Setelan</option>
                        <option value="celana">Celana</option>
                        <option value="baju">Baju</option>
                    </select>
                    <input type="number" placeholder="Stok" name="stok" class="w-full px-5 py-2 font-semibold border border-gray-500 rounded-lg outline-[#cd4cfb]">
                    {{-- <div class="flex items-center gap-3">
                        <h1 class="font-bold text-gray-600">Stok</h1>
                        <img id="reduceBtn" src="pictures\left-arrow-with-outline.png" class="cursor-pointer max-h-[20px] max-w-[20px]" alt="arrow">
                        <input class="max-w-[30px]" type="number" name="stok" id="value" class="text-2xl font-semibold">
                        <img id="addBtn" src="pictures\right-arrow-with-outline.png" class="cursor-pointer max-h-[20px] max-w-[20px]" alt="arrow">
                    </div> --}}
                    <button class="bg-gradient-to-b from-[#7e5ca6] to-[#cd4cfb] text-white px-5 py-2 font-bold rounded-xl hover:bg-transparent hover:outline-[#cd4cfb]">Submit</button>
                </div>
            </div>        
        </div>
    </form>

    <script>
        document.querySelector('.file-input-wrapper').addEventListener('click', () => {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imgChange').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        })

        document.getElementById('reduceBtn').addEventListener('click', () => {
            let valueElement =  document.getElementById('value');
            let value = parseInt(valueElement.textContent, 10);
            value -= 1;
            valueElement.textContent = value;
        });

        document.getElementById('addBtn').addEventListener('click', () => {
            let valueElement =  document.getElementById('value');
            let value = parseInt(valueElement.textContent, 10);
            value += 1;
            valueElement.textContent = value;
        });
    </script>

</body>
</html>