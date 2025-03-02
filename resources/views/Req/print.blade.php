<!DOCTYPE html>
<html>
<head>
    <title>Surat Perintah Lembur</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; font-weight: bold; margin-bottom: 20px; }
        .content { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid #ddd; padding: 8px; }
        .signature { margin-top: 50px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>SURAT PERINTAH LEMBUR</h2>
        <p>{{ $spl->id }}</p>
    </div>
    
    <div class="content">
        <p>Pada tanggal {{ $spl->created_at->format('d-m-Y') }}, dengan ini memberikan perintah lembur kepada :</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>: {{ $spl->nama }}</td>
            </tr>
            <tr>
                <td>Posisi</td>
                <td>: {{ $spl->posisi }}</td>
            </tr>
            <tr>
                <td>Tanggal Lembur</td>
                <td>: {{ $spl->tanggal_lembur }}</td>
            </tr>
            <tr>
                <td>Jam Mulai</td>
                <td>: {{ $spl->jam_mulai }}</td>
            </tr>
            <tr>
                <td>Jam Selesai</td>
                <td>: {{ $spl->jam_selesai }}</td>
            </tr>
            <tr>
                <td>Durasi (Jam)</td>
                <td>: {{ $spl->durasi }} jam</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $spl->pekerjaan }}</td>
            </tr>
        </table>
    </div>
    
    <div class="signature">
        <p>Disetujui oleh:</p>
        <br><br><br>
        <p>{{ $spl->manager }}</p>
        <p>Manager</p>
    </div>
</body>
</html>