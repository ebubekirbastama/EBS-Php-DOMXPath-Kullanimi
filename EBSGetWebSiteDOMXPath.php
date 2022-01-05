<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>EBS Time</title>
</head>
<body>
    <?php


    function EBSgetir($kod = "Barkod") {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.ebubekirbastama.com/&search=' . $kod);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Authority: Çekilecek Web Sitesi';
        $headers[] = 'Pragma: no-cache';
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"96\", \"Google Chrome\";v=\"96\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
        $headers[] = 'Upgrade-Insecure-Requests: 1';
        $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36';
        $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
        $headers[] = 'Sec-Fetch-Site: none';
        $headers[] = 'Sec-Fetch-Mode: navigate';
        $headers[] = 'Sec-Fetch-User: ?1';
        $headers[] = 'Sec-Fetch-Dest: document';
        $headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
        $headers[] = 'Cookie: ';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($result);

        $xpath = new DOMXPath($doc);

        echo $xpath->query("//*[@class='Class ismi']")[0]->childNodes[0]->nodeValue . "<br/>";
        echo $xpath->query("//*[@class='Class ismi']")[0]->childNodes[0]->nodeValue . "<br/>";
        @$stok = $xpath->query("//*[@class='Class ismi']")[0]->nodeName;

        if ($stok != "") {
            echo "Stok Yok";
        } else {
            echo "Stok var";
        }
    }

    EBSgetir("");
    ?>

</body>
</html>
