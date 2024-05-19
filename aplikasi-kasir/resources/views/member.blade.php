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
            <span class="font-semibold">Member Management</span>
            <div class="flex gap-5">
                <div class="flex items-center gap-5 ">
                    <input class=" outline-2 outline-fuchsia-600 px-10 bg-white rounded-md py-2" name="search-input" type="text" placeholder="Search Member">
                    <button><img class="bg-gradient-to-b from-[#7e5ca6] to-[#cd4cfb] max-w-[45px] p-2 max-h-[45px] rounded-full" src="/pictures/icons8-search-90 (1).png" alt="search"></button>
                </div>
                <a href="{{url('addMember')}}" class="bg-[#cd4cfb] px-10 py-2 text-white font-semibold rounded-lg border-2 border-[#dedede] hover:bg-transparent hover:border-[#cd4cfb] hover:text-[#cd4cfb]">Add Member</a>
            </div>
        </div>
        <div class="bg-white rounded-xl py-10 shadow-xl">
            <div>
                <table class="w-full">
                    <thead>
                        <th></th>
                        <th class="pr-52">Nama</th>
                        <th>Member ID</th>
                        <th>WhatsApp</th>
                        <th>Discount</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="" class="w-7 h-7 cursor-pointer" id="check"></td>
                            <td class="pr-52">Faiq patayat</td>
                            <td>227006069</td>
                            <td><button class="text-[#45b289] bg-gray-200 font-semibold px-4 py-1 rounded-xl border-white border-2 hover:bg-transparent hover:border-[#45b289] hover:text-[#45b289]">Whatsapp</button></td>
                            <td class="font-semibold text-lg flex items-center py-8 gap-2">
                                <img id="reduceBtn" src="pictures\left-arrow-with-outline.png" class="cursor-pointer max-h-[20px] max-w-[20px]" alt="arrow">
                                30%
                                <img id="addBtn" src="pictures\right-arrow-with-outline.png" class="cursor-pointer max-h-[20px] max-w-[20px]" alt="arrow">    
                            </td>
                            <td><img src="pictures\trash.png" alt="delete" class="cursor-pointer w-7 h-7"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" class="w-7 h-7 cursor-pointer" id="check"></td>
                            <td class="pr-52">Faiq patayat</td>
                            <td>227006069</td>
                            <td><button class="text-[#45b289] bg-gray-200 font-semibold px-4 py-1 rounded-xl border-white border-2 hover:bg-transparent hover:border-[#45b289] hover:text-[#45b289]">Whatsapp</button></td>
                            <td class="font-semibold text-lg flex items-center py-8 gap-2">
                                <img id="reduceBtn" src="pictures\left-arrow-with-outline.png" class="cursor-pointer max-h-[20px] max-w-[20px]" alt="arrow">
                                30%
                                <img id="addBtn" src="pictures\right-arrow-with-outline.png" class="cursor-pointer max-h-[20px] max-w-[20px]" alt="arrow">    
                            </td>
                            <td><img src="pictures\trash.png" alt="delete" class="cursor-pointer w-7 h-7"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-end mt-14 px-14"><button class="bg-[#cd4cfb] px-5 py-1 text-white font-semibold rounded-lg border-2 border-white hover:bg-transparent hover:border-[#cd4cfb] hover:text-[#cd4cfb]">Submit</button></div>
        </div>
    </div>
</body>
</html>