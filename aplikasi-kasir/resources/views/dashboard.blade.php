<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="public/css/dashboard.css">
</head>
<body class="bg-[#eaeaea] flex flex-col">

    <!-- SECTION NAVBAR -->
    <nav class="flex bg-gradient-to-b from-[#7e5ca6] to-[#cd4cfb] justify-between items-center px-24 py-5">
        <div class="flex text-white items-center gap-5">
            <a href=""><img class="max-w-[50px] max-h-[50px]" src="/pictures/icons8-hamburger-menu-100.png" alt="ham-menu"></a>
            <a href="{{url('dashboard')}}">Vilion Apparel</a>
        </div>
        <div class="flex text-white items-center gap-5">
            <a href="">Admin</a>
            <a href=""><img class="rounded-full max-w-[50px] max-h-[50px]" src="/pictures/VL.png" alt="vl"></a>
        </div>
    </nav>
    <!-- SECTION NAVBAR -->

    <!-- MAIN SECTION -->
    <div class="mx-14 my-10 flex gap-16 justify-between">
        <!-- ROW LEFT -->
        <div class="w-full flex flex-col gap-5">
        <div class="bg-white p-14 flex flex-col gap-10 max-h-[550px] overflow-auto">
            <div class="flex justify-between items-center bg-white">
                <a href="{{url('nAddProduk')}}" class="bg-gradient-to-b from-[#7e5ca6] to-[#cd4cfb] text-transparent bg-clip-text">
                    <h1 class="font-bold">+ New Katalog</h1>
                </a>
                <div class="flex items-center gap-5">
                    <input class="outline-2 outline-fuchsia-600 px-10 bg-gray-200 rounded-xl py-2" name="search-input" type="text" placeholder="Search Katalog Jas">
                    <button><img class="bg-gradient-to-b from-[#7e5ca6] to-[#cd4cfb] max-w-[45px] p-2 max-h-[45px] rounded-full" src="/pictures/icons8-search-90 (1).png" alt="search"></button>
                </div>
            </div>

            @foreach ($produk as $item)
            <div class="grid grid-cols-5 gap-y-10 justify-between">
                <a href="" class="flex flex-col items-center gap-2 max-w-[130px]">
                    <img class="rounded-lg max-w-[120px] max-h-[120px]" src="images/foto-produk/{{$item->fotoP}}" alt="">
                    <h1 class=" text-xs">{{$item->nama}}</h1>
                    <h1 class="font-semibold text-[10px]">Rp. {{$item->harga}}</h1>
                </a>
            </div>
            @endforeach

        </div>
        <div class="flex gap-11">
            <a href="{{url('filterMale')}}">
                <button class="bg-white py-7 px-10 rounded-lg hover:border-2 hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#eaeaea]">
                <span class="text-lg text-gray-600 font-medium hover:text-[#cd4cfb]">Jas Pria</span>
                </button>
            </a>

            <a href="{{url('filterFemale')}}">
                <button class="bg-white py-7 px-10 rounded-lg hover:border-2 hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#eaeaea]">
                <span class="text-lg text-gray-600 font-medium hover:text-[#cd4cfb]">Jas Perempuan</span>
                </button>
            </a>

            <a href="{{url('filterSetelan')}}">
                <button class="bg-white py-7 px-10 rounded-lg hover:border-2 hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#eaeaea]">
                <span class="text-lg text-gray-600 font-medium hover:text-[#cd4cfb]">Setelan</span>
                </button>
            </a>

            <a href="{{url('filterCelana')}}">
                <button class="bg-white py-7 px-10 rounded-lg hover:border-2 hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#eaeaea]">
                <span class="text-lg text-gray-600 font-medium hover:text-[#cd4cfb]">Celana</span>
                </button>
            </a>

            <a href="{{url('filterBaju')}}">
                <button class="bg-white py-7 px-10 rounded-lg hover:border-2 hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#eaeaea]">
                <span class="text-lg text-gray-600 font-medium hover:text-[#cd4cfb]">Baju</span>
                </button>
            </a>
        </div>
        <div class="flex gap-11 justify-end">
            <button class="bg-transparent py-3 px-12 rounded-lg hover:border-2 hover:bg-white hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#cd4cfb]">
                <span class="text-lg font-semibold text-[#cd4cfb]">Member</span>
            </button>
            <button class="bg-transparent py-3 px-12 rounded-lg hover:border-2 hover:bg-white hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#d00202]">
                <span class="text-lg font-semibold text-[#d00202]">Cancel Order</span>
            </button>
        </div>
        </div>

        <!-- ROW LEFT -->
        <!-- ROW RIGHT -->
        <div class="w-full max-w-[400px] flex flex-col gap-6">
        <div class="bg-white flex flex-col py-8 gap-5 rounded-xl">
            <h1 class="text-2xl font-bold text-center">Checkout</h1>
            <div class="px-10 h-[350px] overflow-auto">
            <table class="table-auto text-start border-spacing-y-3 w-full">
                <thead class=" border-b border-gray-900 mb-4 sticky top-0 bg-white">
                <tr class="text-left my-10">
                    <th>Nama Produk</th>
                    <th>QTY</th>
                    <th>Price</th>  
                </tr>
                </thead>
                <tbody class="mt-6 ">
                
                @foreach ($cart as $cart)
                <tr>
                    <td class="text-[12px]">{{$cart->namaProduk}}</td>
                    <td class="flex items-center gap-2 text-[12px]">
                        <button><img class="max-h-[12px] max-w-[12px] border rounded-full border-[#CA3DFC]" src="/pictures/left-arrow.png" alt="arrow"></button>
                        <span>{{$cart->kuantitasProduk}}</span>
                        <button><img class="max-h-[12px] max-w-[12px] border rounded-full border-[#CA3DFC]" src="/pictures/right-arrow.png" alt="arrow"></button>
                    </td>
                    <td class="text-[12px]">RP. {{$cart->hargaProduk}}</td>
                </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
        <div class="bg-white">
            <div class="flex justify-between px-10 border-t border-b border-[#cd4cfb] py-3">
                <button class="text-xs text-gray-600">add member</button>
                <button class="text-xs text-gray-600">id member</button>
            </div>
            <div class="flex justify-between px-10 py-3">
                <span class="text-xs text-gray-600">discount %</span>
                <span class="text-xs text-gray-600">20</span>
            </div>
            <div class="flex justify-between px-10 border-b border-[#cd4cfb] py-3">
                <span class="text-xs text-gray-600">Sub Total</span>
                <span class="text-xs text-gray-600">277.000</span>
            </div>
            <div class="flex justify-between px-10 items-center pt-4">
                <span class="text-lg font-semibold ">Total</span>
                <span class="text-lg font-semibold text-gray-600">RP 270.000</span>
            </div>
        </div>
        </div>
        <div class="flex gap-11 justify-center">
            <button class="bg-transparent w-full py-3 px-12 rounded-lg hover:border-2 hover:bg-white hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#cd4cfb]">
                <span class="text-lg font-semibold text-[#cd4cfb]">Member</span>
            </button>
        </div>

    </div>
        <!-- ROW RIGHT -->
    </div>

    <!-- MAIN SECTION -->
</body>
</html>