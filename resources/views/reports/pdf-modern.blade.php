<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>

    <style>
        @page {
            margin: 22px 22px 55px 22px;
        }

        body {
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
            font-size: 11px;
            color: #2c3e50;
            line-height: 1.4;
        }

        * {
            box-sizing: border-box;
        }

        h1,
        h2,
        h3,
        h4,
        p {
            margin: 0;
        }

        /* ======================
           HEADER
        ====================== */

        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        .header-table td {
            vertical-align: middle;
        }

        .logo {
            width: 80px;
        }

        .logo img {
            width: 90px;
        }

        .institution {
            text-align: center;
        }

        .institution h2 {
            font-size: 18px;
            font-weight: bold;
        }

        .institution h3 {
            font-size: 15px;
            margin-top: 2px;
        }

        .institution h1 {
            font-size: 22px;
            color: #0f4c81;
            margin-top: 12px;
            letter-spacing: .8px;
        }

        .institution p {
            font-size: 11px;
            margin-top: 4px;
            color: #666;
        }

        .line {
            border-bottom: 3px solid #0f4c81;
            margin-top: 10px;
            margin-bottom: 18px;
        }

        /* ======================
           FOOTER
        ====================== */

        .footer{
            position: fixed;
            bottom:-35px;
            left:0;
            right:0;
            height:30px;
            border-top:1px solid #bfc8d6;
            color:#666;
            font-size:10px;
        }

        .footer table{
            width:100%;
        }

        .footer td{
            padding-top:6px;
        }

        /* ======================
           INFO
        ====================== */

        .info-box {
            width: 100%;
            border: 1px solid #d7dce2;
            background: #f8fafc;
            border-radius: 6px;
            padding: 10px 14px;
            margin-bottom: 20px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 3px 2px;
            font-size: 11px;
        }

        .label {
            width: 140px;
            font-weight: bold;
            color: #444;
        }

        /* ======================
           SUMMARY
        ====================== */

        .summary-title {
            font-size: 14px;
            font-weight: bold;
            color: #0f4c81;
            margin-bottom: 10px;
        }

        .summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 8px;
            margin-bottom: 22px;
        }

        .summary-card{
            background:white;
            border:1px solid #d5dce5;
            border-top:5px solid #0f4c81;
            padding:16px;
            text-align:center;
        }

        .summary-label {
            font-size: 11px;
            color: #666;
            margin-bottom: 8px;
        }

        .summary-value{
            font-size:28px;
            color:#0f4c81;
            font-weight:bold;
            margin-top:4px;
        }

        .summary-small {
            margin-top: 4px;
            font-size: 10px;
            color: #888;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #0f4c81;
            margin-bottom: 8px;
            margin-top: 10px;
        }

                /* ======================
        TABLE
        ====================== */

        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .report-table thead th {
            background: #0f4c81;
            color: #ffffff;
            padding: 10px 6px;
            font-size: 10px;
            text-align: center;
            font-weight: bold;
            border: 1px solid #d6dce3;
        }

        .report-table tbody td {
            border: 1px solid #d6dce3;
            padding: 7px 6px;
            font-size: 10px;
            vertical-align: middle;
        }

        .report-table tbody tr:nth-child(even) {
            background: #f7f9fc;
        }

        .text-center{
            text-align:center;
        }

        .text-right{
            text-align:right;
        }

        .status{
            display:inline-block;
            padding:3px 8px;
            border-radius:12px;
            font-size:9px;
            font-weight:bold;
        }

        .status-selesai{
            background:#d8f5dd;
            color:#1d7a32;
        }

        .status-dilayani{
            background:#dbeafe;
            color:#1d4ed8;
        }

        .status-menunggu{
            background:#fff3cd;
            color:#8a6d3b;
        }

        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        tr {
            page-break-inside: avoid;
        }

        .report-table {
            page-break-inside: auto;
        }

        .report-table tr {
            page-break-inside: avoid;
        }

        .report-table thead {
            display: table-header-group;
        }
    </style>

</head>

<body>

    {{-- HEADER --}}

    <table class="header-table">

        <tr>

            <td class="logo">
                @if(file_exists(public_path('image/bnn-logo.png')))
                    <img src="{{ public_path('image/bnn-logo.png') }}">
                @endif
            </td>

            <td class="institution">
                <h2>BADAN NARKOTIKA NASIONAL</h2>
                <h3>PROVINSI JAWA BARAT</h3>
                <P>Jl. Soekarno-Hatta Jalan Haji Hasan No.1, Cisaranten Kidul, 
                    Kec. Gedebage, Kota Bandung, 
                    Jawa Barat 40295</P>
                <h1>LAPORAN KUNJUNGAN TAMU</h1>
                <p>Sistem Informasi Buku Tamu Digital (SITADIGI)</p>
            </td>
        </tr>

    </table>

    <div class="line"></div>

    {{-- INFORMASI LAPORAN --}}

    <div class="info-box">

        <table class="info-table">

            <tr>
                <td class="label">Periode</td>
                <td>
                    :
                    @if($start_date && $end_date)
                        {{ \Carbon\Carbon::parse($start_date)->format('d F Y') }}
                        s/d
                        {{ \Carbon\Carbon::parse($end_date)->format('d F Y') }}
                    @else
                        Seluruh Data
                    @endif
                </td>
            </tr>

            <tr>
                <td class="label">Tanggal Cetak</td>
                <td>:
                    {{ \Carbon\Carbon::parse($date_generated)->format('d F Y H:i') }} WIB
                </td>
            </tr>

            <tr>
                <td class="label">Dicetak Oleh</td>
                <td>:
                    {{ $printed_by ?? 'Administrator' }}
                </td>
            </tr>

            <tr>
                <td class="label">Report ID</td>
                <td> : {{ $report_id ?? ('LP-' . now()->format('YmdHis')) }}
                </td>
            </tr>

        </table>

    </div>

    {{-- SUMMARY --}}

    <div class="summary-title">

        Ringkasan Laporan

    </div>

    <table class="summary-table">

        <tr>

            <td width="25%">

                <div class="summary-card">

                    <div class="summary-label">
                        Total Kunjungan
                    </div>

                    <div class="summary-value">
                        {{ $guests->count() }}
                    </div>

                    <div class="summary-small">
                        Tamu
                    </div>

                </div>

            </td>

            <td width="25%">

                <div class="summary-card">

                    <div class="summary-label">
                        Total Selesai
                    </div>

                    <div class="summary-value">
                        {{ $guests->where('status','selesai')->count() }}
                    </div>

                    <div class="summary-small">
                        Tamu
                    </div>

                </div>

            </td>

            <td width="25%">

                <div class="summary-card">

                    <div class="summary-label">
                        Total Durasi
                    </div>

                    <div class="summary-value">
                        {{ round($guests->sum('duration_seconds')/60) }}
                    </div>

                    <div class="summary-small">
                        Menit
                    </div>

                </div>

            </td>

            <td width="25%">

                <div class="summary-card">

                    <div class="summary-label">
                        Rata-rata
                    </div>

                    <div class="summary-value">
                        {{ $guests->count() ? round(($guests->sum('duration_seconds')/$guests->count())/60) : 0 }}
                    </div>

                    <div class="summary-small">
                        Menit / Tamu
                    </div>

                </div>

            </td>

        </tr>

    </table>

    <div class="section-title">
        Data Kunjungan Tamu
    </div>

<table class="report-table">

    <thead>

        <tr>
            <th width="4%">No</th>
            <th width="16%">Nama</th>
            <th width="11%">Telepon</th>
            <th width="20%">Alamat</th>
            <th width="12%">Keperluan</th>
            <th width="7%">Masuk</th>
            <th width="7%">Keluar</th>
            <th width="8%">Durasi</th>
            <th width="8%">Status</th>
            <th width="7%">Tanggal</th>
        </tr>

    </thead>

    <tbody>

    @forelse($guests as $guest)

        <tr>

            <td class="text-center">
                {{ $loop->iteration }}
            </td>

            <td>
                <strong>{{ $guest->name }}</strong>
            </td>

            <td>
                {{ $guest->phone }}
            </td>

            <td>
                {{ \Illuminate\Support\Str::limit($guest->address,45) }}
            </td>

            <td>
                {{ ucwords($guest->purpose) }}
            </td>

            <td class="text-center">
                {{ $guest->created_at->format('H:i') }}
            </td>

            <td class="text-center">
                {{ $guest->completed_at ? \Carbon\Carbon::parse($guest->completed_at)->format('H:i') : '-' }}
            </td>

            <td class="text-center">

                @php
                    $minutes = floor($guest->duration_seconds/60);
                    $hours = floor($minutes/60);
                    $minutes = $minutes%60;
                @endphp

                @if($hours>0)
                    {{ $hours }}j {{ $minutes }}m
                @else
                    {{ $minutes }}m
                @endif

            </td>

            <td class="text-center">
                <span class="status status-selesai">
                    Selesai
                </span>
            </td>

            <td class="text-center">
                {{ $guest->created_at->format('d-m-Y') }}
            </td>

        </tr>

    @empty
        <tr>
            <td colspan="10" style="padding:20px;text-align:center;">
                Tidak ada data.
            </td>
        </tr>
    @endforelse

    </tbody>

</table>

<div class="footer">

<table>

    <tr>
        <td> Dicetak otomatis oleh
            <strong>SITADIGI</strong>
        </td>
            <td style="text-align:center"> BNN Provinsi Jawa Barat </td>

        <td style="text-align:right"> {{ \Carbon\Carbon::parse($date_generated)->format('d-m-Y H:i') }}
        </td>

    </tr>

</table>
        <br><br>
        <table width="100%">
            <tr>
                <td width="60%">
                <strong>Ringkasan</strong>

        <br><br>
        Jumlah Pengunjung :
        {{ $total_guest }}
        <br>
        Total Durasi :
        {{ round($total_duration/60) }}
        Menit
                    </td>

        <td width="40%" style="text-align:center;">
            Bandung,
            {{ \Carbon\Carbon::parse($date_generated)->format('d F Y') }}
            <br><br><br>
            Mengetahui,
            <br>
            Kepala Bagian Umum
            <br><br><br><br><br>

            (........................................)

            </td>

            </tr>

</table>
</div>

</body>

</html>