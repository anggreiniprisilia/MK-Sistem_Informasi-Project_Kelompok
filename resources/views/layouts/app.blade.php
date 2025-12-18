<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SIPMAS') - Sistem Informasi Pengaduan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        
        /* Modal overlay */
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }
    </style>
</head>
<body class="bg-gray-50">
    @yield('content')
    
    @if(session('success'))
    <script>
        setTimeout(() => {
            const alert = document.getElementById('success-alert');
            if (alert) alert.remove();
        }, 3000);
    </script>
    @endif
</body>
</html>