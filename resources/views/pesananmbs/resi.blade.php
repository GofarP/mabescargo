<!DOCTYPE html>
<html>
<head>
    <title>Resi MBS</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin: 0;
            padding-top: 20px; /* Adjust this value as needed */
        }

        table {
            border-collapse: collapse;
            width: 100mm;
            height: 50mm;
        }

        td {
            border: 1px solid #000;
            padding: 2px;
            font-size: 10px; /* Adjusted font size */
        }

        img {
            max-width: 100%;
            max-height: 100%;
            vertical-align: middle;
        }

        @media print {
            .print-background {
                background-color: black;
                color: white;
                display:none;
            }
        }
    </style>
    <title>Print Resi {{$pesananmbs->resi}}</title>
</head>
<body>

<button class="btn btn-success print-background" onclick="window.print()">Print</button>
<table>
    <tbody>
        <tr>
            <td colspan="6">
                <div style="display: flex; align-items: center;">
                    <img src="{{ asset('/dashboard-assets/img/icons/mbs-icon.jpg') }}" style="max-height: 40px; max-width: 100%; vertical-align: middle;">
                    <div style="font-size: 8px; margin-left: 10px;">
                        Jl. Cendrawasih No.1, RT.001/RW.001, Batu IX, Kec. Tanjungpinang Tim., Kota Tanjung Pinang, Kepulauan Riau 29125<br>
                        Hotline:  0813-7831-8308 | Website: <a href="https://www.mbscargo.id" target="_blank">https://www.mbscargo.id</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div style="text-align: center;">
                    @php
                        echo DNS1D::getBarcodeSVG($pesananmbs->resi, 'c128', 1, 33)
                    @endphp
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6" rowspan="2">
                <b><span style="font-size: 8px;">Pengirim: {{ $pesananmbs->customer->nama }}, {{ $pesananmbs->customer->no_telp }}</span></b><br>
                <b><span style="font-size: 8px;">Alamat Pengirim: {{ $pesananmbs->customer->alamat ?? '-' }} </span></b><br>
                <b><span style="font-size: 8px;"></span></b><br>
                <b><span style="font-size: 8px;">Penerima: {{ $pesananmbs->diterima_oleh }},{{ $pesananmbs->notelp_penerima }}</span></b><br>
                <span style="font-size: 8px;"><b>Alamat Penerima: {{ $pesananmbs->alamat_detail_tujuan }}</b></span>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td colspan="3" rowspan="2">
                <p style="text-align:center; font-weight:bold; font-size: 8px;">Total Biaya</p>
                <p style="text-align:center; font-weight:bold; font-size: 10px;">Rp.{{ number_format($pesananmbs->total_biaya, 2) ?? 0 }}</p>
            </td>
            <td colspan="3">
                <span style="font-size:8px">QTY: {{ $pesananmbs->jumlah_koli_packing + $pesananmbs->unit }}  </span>
                <span style="margin-left:5px; font-size:8px"> Description: {{ $pesananmbs->catatan_barang }}</span>
                <div style="margin-top:1px; font-size:8px; font-style:bold"><span><b>Syarat Dan Ketentuan Pengirim Dapat Dilihat Pada Website Mencargo</b></span></div>
                <div style="margin-top:1px; font-size:8px;">
                    <br>
                    <span>BCA: 8890729500 a/n Harrys Oberlin</span>
                    <br>
                    <span>BRI: 17401003219308 a/n Bintan bersaudara</span>
                    <br>
                    <br>
                    <span><b>Komplain 1x24 Jam dengan disertai video unboxing dan foto</b></span>
                    <br>
                     <span><b>cek tracking resi di web www.mbscargo.id / Hotline 62822-8315-8828</b></span>
                     </div>
            </td>
        </tr>
    </tbody>
</table>

</body>
</html>
