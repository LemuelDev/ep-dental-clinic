<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EP-CLINIC (PATIENT)</title>
    @vite('resources/css/app.css')
    @vite('resources/js/lightDark.js')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: "Poppins", sans-serif;
        }
    </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    @if (request()->route()->getName() === "patient.calendar")

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>    
    @vite('resources/js/app.js')
    <style>
        /* Ensure FullCalendar header is responsive */
        .fc-toolbar {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
        }   

        @media (max-width: 658px) {
            .fc-toolbar {
                flex-direction: column;
                align-items: center;
            }
            
            .fc-toolbar > * {
                margin-bottom: 10px;
            }
        }
    </style>
    @endif

</head>
<body>

    @yield('navbar')
    @yield('content')
    
    
</body>
</html>