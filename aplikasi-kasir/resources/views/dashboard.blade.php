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
            <img id="ham-menu" class="max-w-[30px] max-h-[30px] cursor-pointer" src="/pictures/icons8-hamburger-menu-100.png" alt="ham-menu">
            <div id="ham-nav" class="bg-white text-gray-500 flex flex-col text-start absolute top-8 left-36 hidden transition-all ease-in-out">
                <a href="{{url('member')}}" class="border-b pl-5 pr-7 pb-2 pt-3 hover:bg-gray-200 border-gray-500">Member</a>
                <button id="katalogBtn" class="border-b pl-3 pr-7 py-2 hover:bg-gray-200 border-gray-500">Katalog</button>
                <a href="{{url('history-transaksi')}}" class="border-b pl-5 pr-7 py-2 hover:bg-gray-200 border-gray-500">History</a>
                <a href="" class="text-[#cd4cfb] pl-5 pr-7 pt-2 pb-3 hover:bg-gray-200">Logout</a>
            </div>
            <a href="{{url('dashboard')}}">Vilion Apparel</a>
        </div>
        <div class="flex text-white items-center gap-5">
            <a href="">Admin</a>
            <a href=""><img class="rounded-full max-w-[50px] max-h-[50px]" src="/pictures/VL.png" alt="vl"></a>
        </div>
    </nav>
    <!-- SECTION NAVBAR -->

    <!-- MAIN SECTION -->
    <div class="mx-14 my-10 flex gap-16 justify-center">
        <!-- ROW LEFT -->
        <div class="w-full flex flex-col gap-5 w-[940px]">
        <div class="bg-white p-14 flex flex-col gap-10 max-h-[550px] overflow-auto shadow-xl">
            <div class="flex justify-between items-center bg-white">
                <a href="{{url('nAddProduk')}}" class="bg-gradient-to-b from-[#7e5ca6] to-[#cd4cfb] text-transparent bg-clip-text">
                    <h1 class="font-bold">+ New Katalog</h1>
                </a>
                <div class="flex items-center gap-5">
                    <input class="outline-2 outline-fuchsia-600 px-10 bg-gray-200 rounded-xl py-2" name="search-input" type="text" placeholder="Search Katalog Jas">
                    <button><img class="bg-gradient-to-b from-[#7e5ca6] to-[#cd4cfb] max-w-[45px] p-2 max-h-[45px] rounded-full" src="/pictures/icons8-search-90 (1).png" alt="search"></button>
                </div>
            </div>

            <div class="grid grid-cols-5 gap-y-10 justify-between">
                @foreach ($produk as $item)
                <form action="{{url('addcart', $item->id)}}" method="post" id="add-to-cart-{{$item->id}}">
                    @csrf
                    <input type="hidden" name="namaProduk" value="{{$item->nama}}">
                    <input type="hidden" name="kuantitasProduk" value="1">
                    <input type="hidden" name="hargaProduk" value="{{$item->harga}}">
                    <div class="grid grid-cols-5 gap-y-10 justify-between">
                        <a href="javascript:void(0)" onclick="document.getElementById('add-to-cart-{{$item->id}}').submit();" class="flex flex-col items-center gap-2 max-w-[130px]">
                            <img class="rounded-lg max-w-[120px] max-h-[120px]" src="images/foto-produk/{{$item->fotoP}}" alt="">
                            <h1 class=" text-xs">{{$item->nama}}</h1>
                            <h1 class="font-semibold text-[10px]">Rp. {{$item->harga}}</h1>
                        </a>
                    </div>
                </form>
                @endforeach
            </div>


        </div>
        <div class="flex gap-11">
            <a href="{{url('filterMale')}}" class="shadow-xl">
                <button class="text-lg text-gray-600 font-medium hover:text-[#cd4cfb] bg-white py-7 px-10 rounded-lg hover:border-2 hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#eaeaea]">
                Jas Pria
                </button>
            </a>

            <a href="{{url('filterFemale')}}" class="shadow-xl">
                <button class="text-lg text-gray-600 font-medium hover:text-[#cd4cfb] bg-white py-7 px-10 rounded-lg hover:border-2 hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#eaeaea]">
                    Jas Perempuan
                </button>
            </a>

            <a href="{{url('filterSetelan')}}" class="shadow-xl">
                <button class="text-lg text-gray-600 font-medium hover:text-[#cd4cfb] bg-white py-7 px-10 rounded-lg hover:border-2 hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#eaeaea]">
                    Setelan
                </button>
            </a>

            <a href="{{url('filterCelana')}}" class="shadow-xl">
                <button class="text-lg text-gray-600 font-medium hover:text-[#cd4cfb] bg-white py-7 px-10 rounded-lg hover:border-2 hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#eaeaea]">
                    Celana                
                </button>
            </a>

            <a href="{{url('filterBaju')}}" class="shadow-xl">
                <button class="text-lg text-gray-600 font-medium hover:text-[#cd4cfb] bg-white py-7 px-10 rounded-lg hover:border-2 hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#eaeaea]">
                    Baju
                </button>
            </a>
        </div>
        <div class="flex gap-11 justify-end">
            <button id="goPayment" class="bg-transparent py-3 px-12 rounded-lg hover:border-2 hover:bg-white hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#aa3ed1]">
                <span class="text-lg font-semibold text-[#aa3ed1]">Payment</span>
            </button>
            <button id="cancelBtn" class="bg-transparent py-3 px-12 rounded-lg hover:border-2 hover:bg-white hover:border-[#cd4cfb] hover:shadow-lg border-2 border-[#d00202]">
                <span class="text-lg font-semibold text-[#d00202]">Cancel Order</span>
            </button>
        </div>
        </div>

        <!-- ROW LEFT -->
        <!-- ROW RIGHT -->
        <div id="rightRow" class="w-full max-w-[400px] flex flex-col gap-6">
        <div class="bg-white flex flex-col py-8 gap-5 rounded-xl shadow-xl">
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
                <a href="{{url('member')}}" class="text-xs text-gray-600">add member</a>
                <span class="text-xs text-gray-600">id member</span>
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
            <button id="paymentBtn" class="text-lg font-semibold text-white hover:text-[#cd4cfb] bg-[#cd4cfb] w-full py-3 px-12 rounded-lg hover:border-2 hover:bg-transparent hover:border-[#cd4cfb]  hover:shadow-lg border-2 border-[#eaeaea]">
            PAYMENT
            </button>
            <a href="{{url('history-transaksi')}}" id="historyBtn" class="hidden text-center text-lg font-semibold text-white hover:text-[#cd4cfb] bg-[#cd4cfb] w-full py-3 px-12 rounded-lg hover:border-2 hover:bg-transparent hover:border-[#cd4cfb]  hover:shadow-lg border-2 border-[#eaeaea]">
            HISTORY TRANSAKSI
            </a>
        </div>

    </div>
        <!-- ROW RIGHT -->
    </div>

    <!-- MAIN SECTION -->

    <script src="js\dashboard.js"></script>
</body>
</html>