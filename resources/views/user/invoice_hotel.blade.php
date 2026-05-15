<!doctype html>
<html>
<head><meta charset="utf-8"><title>Invoice Hotel</title>
<style>body{font-family: Arial, sans-serif; padding:20px;} h2{color:#333;} table{width:100%;}</style>
</head>
<body>
    <h2>Invoice Booking Hotel #{{ $booking->id }}</h2>
    <p>Nama: {{ $booking->nama }}</p>
    <p>Hotel: {{ $booking->hotel->nama ?? '-' }}</p>
    <p>Check-in: {{ $booking->check_in }}</p>
    <p>Check-out: {{ $booking->check_out }}</p>
    <hr>
    <p><strong>Total:</strong> Rp {{ number_format($booking->payment_amount ?? $booking->total_harga ?? 0,0,',','.') }}</p>
</body>
</html>
