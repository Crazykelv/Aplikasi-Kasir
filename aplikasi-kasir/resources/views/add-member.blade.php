<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Add Member</title>
</head>
<body class="bg-[#dedede]">
    <header class=" bg-gradient-to-b from-[#7e5ca6] to-[#cd4cfb]">
        <a class="flex gap-5 px-16 items-center" href="{{url('member')}}">
            <img class="w-20 h-20" src="pictures\icons8-arrow-96.png" alt="back">
            <h1 class="font-semibold text-white">Vilion Apparel</h1>
        </a>
    </header>

    <div class="flex justify-center">
        <form method="POST" action="{{url('addMemberData')}}" enctype="multipart/form-data">
            @csrf
            <div class="bg-white flex flex-col p-6 gap-7 rounded-xl w-[350px] my-28 shadow-xl">
                <h1 class="font-semibold">Add Member</h1>
                <input type="text" placeholder="Nama" name="namaMember" class="w-full px-5 py-2 font-semibold border border-gray-500 rounded-lg outline-[#cd4cfb]">
                <input type="text" placeholder="WhatsApp" name="noTelepon" class="w-full px-5 py-2 font-semibold border border-gray-500 rounded-lg outline-[#cd4cfb]">
                <button type="submit" class="bg-gradient-to-b from-[#7e5ca6] to-[#cd4cfb] text-white px-5 py-2 font-semibold rounded-md hover:bg-transparent hover:outline-[#cd4cfb]">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>