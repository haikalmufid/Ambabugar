<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Massage Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md max-w-md">
        <h1 class="text-2xl text-center font-semibold mb-6">Massage Reservation</h1>
        <form action="../Controller/reserveController.php" method="post" class="grid grid-cols-2 gap-4">
            <div class="mb-4 col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-600">Nama:</label>
                <input type="text" id="name" name="nama" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-600">Date:</label>
                <input type="date" id="date" name="date" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="time" class="block text-sm font-medium text-gray-600">Time:</label>
                <input type="time" id="time" name="time" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <div class="mb-4 col-span-2">
                <p>Paket 1 (Pijat Full Body) </p>
                <p>Paket 2 (Pijat Full Body + Bekam Kering / Kop)</p>
                <p>Paket 3 (Pijat Full Body + Bekam Basah)</p>
            </div>
            <div class="mb-4 col-span-2">
                <label for="paket" class="block text-sm font-medium text-gray-600">Pilih Paket:</label>
                <select name="paket" class="mt-1 p-2 w-full border rounded-md" id="paket" onchange="calculateTotal()">
                    <option value="paket-1">Paket 1 = Rp. 85.000</option>
                    <option value="paket-2">Paket 2 = Rp. 100.000</option>
                    <option value="paket-3">Paket 3 = Rp. 150.000</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="tempat-pijat" class="block text-sm font-medium text-gray-600">Tempat:</label>
                <select name="tempat-pijat" class="mt-1 p-2 w-full border rounded-md" id="tempat-pijat" onchange="calculateTotal()">
                    <option value="ditempat">Ditempat</option>
                    <option value="panggilan">Panggilan + Rp. 30.000</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="pembayaran" class="block text-sm font-medium text-gray-600">Metode Pembayaran:</label>
                <select name="pembayaran" class="mt-1 p-2 w-full border rounded-md" id="pembayaran">
                    <option value="Cash">Bayar Langsung</option>
                    <option value="E-Money">E-Money</option>
                </select>
            </div>

            <div class="mb-4 col-span-2">
                <label for="totalharga" class="block text-sm font-medium text-gray-600">Harga:</label>
                <input id="totalharga" name="totalharga" class="mt-1 p-2 w-full border rounded-md" readonly>
            </div>

            <div class="mb-4 col-span-2">
                <label for="location" class="block text-sm font-medium text-gray-600">Location:</label>
                <textarea type="text" id="location" name="lokasi" class="mt-1 p-2 w-full border rounded-md" required></textarea>
            </div>

            <button type="submit" onclick="showAlert()" class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                Submit
            </button>

            <button onclick="goBack()" class="px-4 py-2 rounded-md bg-gray-500 text-white hover:bg-gray-600 focus:outline-none transition-colors">
                Back
            </button>
        </form>
    </div>

    <script>
        var hargaPaket = 0; // Harga paket default
        var tambahanOngkir = 0; // Tambahan ongkir default
        var selectedPaket = ""; // Pilihan paket
        var selectedTempat = ""; // Pilihan tempat

        function calculateTotal() {
            // Reset harga dan ongkir
            hargaPaket = 0;
            tambahanOngkir = 0;

            // Ambil nilai dari pilihan paket
            selectedPaket = document.getElementById("paket").value;

            // Hitung harga berdasarkan pilihan paket
            if (selectedPaket === "paket-1") {
                hargaPaket = 85000;
            } else if (selectedPaket === "paket-2") {
                hargaPaket = 100000;
            } else if (selectedPaket === "paket-3") {
                hargaPaket = 150000;
            }

            // Tampilkan harga paket
            document.getElementById("totalharga").value = hargaPaket;

            // Ambil nilai dari pilihan tempat
            selectedTempat = document.getElementById("tempat-pijat").value;

            // Hitung tambahan ongkir untuk pijat panggilan
            if (selectedTempat === "panggilan") {
                tambahanOngkir = 30000;
            }

            // Tambahkan ongkir ke harga total
            var totalHarga = hargaPaket + tambahanOngkir;

            // Tampilkan harga total
            document.getElementById("totalharga").value = totalHarga;
        }
        function showAlert() {
            alert("Reservation successful! Terima kasih atas pemesanannya.");
        }
                // Function to go back to the previous page
        function goBack() {
            history.back();
        }
    </script>
</body>
</html>
