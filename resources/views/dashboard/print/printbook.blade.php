<style type="text/css" media="print">
    @media print {
      body {-webkit-print-color-adjust: exact;}
      a:link:after, a:visited:after {
        content: "";
    }
    }
    @page {
        size:A4 potrait;
           margin:0mm 0mm 0mm 0mm;  
      
    }
    
    
    </style>
    <html>
    <head><title>Print Barcode Buku</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="Pragma" content="no-cache"><meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0"><meta http-equiv="Expires" content="Sat, 26 Jul 1997 05:00:00 GMT"><style type="text/css">
    body { padding: 0; margin: 0cm; font-family: Arial, Verdana, Helvetica, 'Trebuchet MS'; font-size: 12pt; background: #fff; }
    
    .box{  width: 7cm;  height: 4.9cm;  border: solid 1px grey;}
    .header{  border-bottom: solid 1px grey;  text-align: center;  height: auto;  position: relative;  padding: 10px 0px 10px 0px;  top: -5cm;}
    .barcode{  width: 2cm;  height: 5cm;  text-align: center;}
    .callNum{  text-align: center;  position: relative;  top: -5cm;  padding-top: 10px;}
    .cc{  height: 2cm;  width:  6cm;  -ms-transform: rotate(90deg);  -webkit-transform: rotate(90deg);transform: rotate(90deg); position: absolute; margin-top: 1.5cm;margin-left: -1.5cm;}
    .cw{  width:  5cm;  height:  2cm;  -ms-transform: rotate(-90deg);  -webkit-transform: rotate(-90deg); transform: rotate(-90deg); position: absolute; margin-top: 1.5cm; margin-left: -1.5cm;}
    
    .r > .barcode{  margin-left: 5cm;  border-left: solid 1px grey;}
    .r > .header{  margin-left: 0px;  width: 5cm;}
    .r > .callNum{  margin-left: 0px;  width:  5cm;}
    .l > .barcode{  margin-left: 0px;  border-right: solid 1px grey;}
    .l > .header{  margin-left: 2cm;  width: 5cm;}
    .l > .callNum{  margin-left: 2cm;  width: 5cm;}
    .img_code{ width: auto; height:auto; padding:30px; border:0px }
    .title{  font-size:8pt;}
    </style>
    </head>
    <body>
    <table cellspacing="0.1" cellpadding="2">
    <tbody>
    @foreach($total->chunk(3) as $op)
    <tr>
    @foreach ($op as $value)
        <td>
            <div class="box l">
            <div class="barcode">
                <div class="cc">
                <div class="img_code">{!! DNS1D::getBarcodeSVG(strval($book->isbn), 'PHARMA', 0.8, 50, 'black', false) !!}</div></div>
            </div>
            <div class="header" style="background-color:#FF3030;z-index:-3;">{{ env('APP_ALIASES_NAME') }}</div>
            <div class="callNum">
                <b>{{ $book->category->category }}</b>
                <br>
                <b>Rak {{ $book->rack }}</b>
                <br>
                {{ $book->isbn }}
                <br>
                <p style="font-size: 10">{{ $book->title }}</p>
                <br>
                </div>
            </div>
        </td>
        @endforeach
    </tr>
    @endforeach
    </tbody>
    </table>
    
    </body>
    <script type="text/javascript">self.print();</script>
    </html>    