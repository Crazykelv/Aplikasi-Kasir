<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="css\member.css">
</head>
<body class="bg-[#dedede]">
    <header class=" bg-gradient-to-b from-[#7e5ca6] to-[#cd4cfb]">
        <a class="flex gap-5 px-16 items-center" href="{{url('dashboard')}}">
            <img src="pictures\icons8-arrow-96.png" class="w-20 h-20" alt="back">
            <h1 class="font-semibold text-white">Vilion Apparel</h1>
        </a>
    </header>
    <div class="mx-24 my-10">
        <div class="flex justify-between my-10 ">
            <span class="font-bold text-2xl">History Transaksi</span>
        </div>
        <div class="bg-white rounded-xl py-10 shadow-xl">
            <div>
                <table class="w-full">
                    <thead>
                        <th></th>
                        <th class="pr-52">Tanggal</th>
                        <th>ID Member</th>
                        <th>ID Transaksi</th>
                        <th>Cost</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="" class="w-7 h-7 cursor-pointer" id="check"></td>
                            <td class="pr-52">16/05/2024</td>
                            <td>227006069</td>
                            <td>001</td>
                            <td class="font-semibold text-lg">Rp 159.000</td>
                            <td><img src="pictures\trash.png" alt="delete" class="cursor-pointer w-7 h-7"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" class="w-7 h-7 cursor-pointer" id="check"></td>
                            <td class="pr-52">16/05/2024</td>
                            <td>227006069</td>
                            <td>001</td>
                            <td class="font-semibold text-lg">Rp 159.000</td>
                            <td><img src="pictures\trash.png" alt="delete" class="cursor-pointer w-7 h-7"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" class="w-7 h-7 cursor-pointer" id="check"></td>
                            <td class="pr-52">16/05/2024</td>
                            <td>227006069</td>
                            <td>001</td>
                            <td class="font-semibold text-lg">Rp 159.000</td>
                            <td><img src="pictures\trash.png" alt="delete" class="cursor-pointer w-7 h-7"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-end mt-14 px-14"><button class="bg-[#cd4cfb] px-5 py-1 text-white font-semibold rounded-lg border-2 border-white hover:bg-transparent hover:border-[#cd4cfb] hover:text-[#cd4cfb]">Download Excel</button></div>
        </div>
    </div>
</body>
</html>