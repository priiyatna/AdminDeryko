<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminDeryko</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #334d7e, #d16b40);
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container {
            max-width: 800px;
            padding: 20px;
        }

        h1 {
            font-size: 2.5em;
        }

        .calendar-container {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .navigation {
            margin-bottom: 20px;
        }

        .navigation button {
            padding: 10px;
            font-size: 1em;
            background-color: #f0a500;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            margin: 5px;
        }

        /* Kalender CSS */
        table {
            width: 100%;
            margin: 10px 0;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: rgba(0, 0, 0, 0.6);
        }

        td {
            background-color: rgba(255, 255, 255, 0.1);
        }

        td.today {
            background-color: rgba(240, 165, 0, 0.8);
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>SELAMAT DATANG DI ADMIN TOKO DERYKO, SILAHKAN LOGIN</h1>
        <div class="calendar-container">
            <div id="calendarContainer"></div>
            <div class="navigation">
                <button id="prevMonth">Bulan Sebelumnya</button>
                <button id="nextMonth">Bulan Berikutnya</button>
            </div>
        </div>
    </div>
  
    @if (Route::has('login'))
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark me-2">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-dark me-2">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-dark">Register</a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif


    <script>
        // Mendapatkan tanggal hari ini
        var today = new Date();
        var currentYear = today.getFullYear();
        var currentMonth = today.getMonth();
        var currentDate = today.getDate();

        var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        // Fungsi untuk menghasilkan kalender untuk bulan tertentu
        function generateCalendar(month, year) {
            var calendarContainer = document.getElementById("calendarContainer");
            calendarContainer.innerHTML = ""; // Hapus isi sebelumnya

            var tbl = document.createElement("table");
            var caption = document.createElement("caption");
            caption.innerHTML = months[month] + " " + year;
            tbl.appendChild(caption);

            // Header hari-hari dalam seminggu
            var headerRow = document.createElement("tr");
            var daysOfWeek = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];

            for (var i = 0; i < daysOfWeek.length; i++) {
                var th = document.createElement("th");
                th.innerHTML = daysOfWeek[i];
                headerRow.appendChild(th);
            }
            tbl.appendChild(headerRow);

            // Menghitung jumlah hari di bulan tersebut
            var firstDay = new Date(year, month).getDay();
            var daysInMonth = 32 - new Date(year, month, 32).getDate();

            var date = 1;
            for (var i = 0; i < 6; i++) { // Membuat 6 baris (maksimal)
                var row = document.createElement("tr");

                for (var j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDay) {
                        var cell = document.createElement("td");
                        var cellText = document.createTextNode("");
                        cell.appendChild(cellText);
                        row.appendChild(cell);
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        var cell = document.createElement("td");
                        var cellText = document.createTextNode(date);
                        if (date === currentDate && year === today.getFullYear() && month === today.getMonth()) {
                            cell.classList.add("today"); // Menandai tanggal hari ini
                        }
                        cell.appendChild(cellText);
                        row.appendChild(cell);
                        date++;
                    }
                }

                tbl.appendChild(row);
            }

            calendarContainer.appendChild(tbl);
        }

        // Fungsi untuk berpindah ke bulan sebelumnya
        document.getElementById("prevMonth").addEventListener("click", function() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            generateCalendar(currentMonth, currentYear);
        });

        // Fungsi untuk berpindah ke bulan berikutnya
        document.getElementById("nextMonth").addEventListener("click", function() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentMonth, currentYear);
        });

        // Menampilkan kalender awal untuk bulan dan tahun ini
        generateCalendar(currentMonth, currentYear);
    </script>
    <!-- Optional JavaScript and Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

