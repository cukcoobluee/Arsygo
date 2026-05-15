<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice Pembayaran - ArsyGo</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #f4f6f9;
            padding: 40px;
            color: #333;
        }

        .invoice-container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 35px 45px;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            border: 1px solid #e2e8f0;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h2 {
            font-size: 28px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 5px;
        }

        .header p {
            color: #6b7280;
            font-size: 14px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #111;
            border-left: 5px solid #ff8a00;
            padding-left: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 14px;
        }

        td {
            padding: 10px 0;
            font-size: 15px;
        }

        td:first-child {
            width: 35%;
            font-weight: 600;
            color: #444;
        }

        .divider {
            margin: 25px 0;
            border-bottom: 2px dashed #e5e7eb;
        }

        .total-box {
            text-align: right;
            padding: 18px 0;
        }

        .total-label {
            font-size: 18px;
            font-weight: 700;
            color: #111;
        }

        .total-value {
            font-size: 24px;
            font-weight: 800;
            color: #f97316;
        }

        .footer {
            margin-top: 35px;
            text-align: center;
            color: #6b7280;
            font-size: 13px;
        }

        .brand {
            font-weight: 800;
            color: #f97316;
        }
    </style>
</head>

<body>

    <div class="invoice-container">

        <!-- HEADER -->
        <div class="header">
            <h2>INVOICE PEMBAYARAN</h2>
            <p>Private Trip — ArsyGo Adventure</p>
        </div>

        <!-- INFORMASI PEMESAN -->
        <h3 class="section-title">Detail Pemesan</h3>

        <table>
            <tr>
                <td>Nama</td>
                <td>{{ $data['nama'] }}</td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>{{ $data['telepon'] }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $data['email'] }}</td>
            </tr>
        </table>

        <div class="divider"></div>

        <!-- INFORMASI TRIP -->
        <h3 class="section-title">Detail Trip</h3>

        <table>
            <tr>
                <td>Tanggal Trip</td>
                <td>{{ $data['tanggal'] }}</td>
            </tr>
            <tr>
                <td>Jumlah Peserta</td>
                <td>{{ $data['jumlah_peserta'] }} Orang</td>
            </tr>
            <tr>
                <td>Harga per Orang</td>
                <td>Rp {{ number_format($data['harga_per_orang'],0,',','.') }}</td>
            </tr>
            @if(!empty($data['catatan']))
            <tr>
                <td>Catatan</td>
                <td>{{ $data['catatan'] }}</td>
            </tr>
            @endif
        </table>

        <div class="divider"></div>

        <!-- TOTAL -->
        <div class="total-box">
            <div class="total-label">Total Pembayaran</div>
            <div class="total-value">Rp {{ number_format($data['total_bayar'],0,',','.') }}</div>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            Terima kasih telah mempercayai <span class="brand">ArsyGo</span> sebagai partner perjalanan Anda.
            <br>Semoga perjalanan Anda menyenangkan!
        </div>

    </div>

</body>
</html>
