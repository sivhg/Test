<body>
<table border="2" align="center">
<?php
    $doc = new DOMDocument();
    $doc->load('sinhvien.xml');
    $dssinhvien = $doc->getElementsByTagName("sinhvien");
    $i = 1;
    $students = [];
    foreach( $dssinhvien as $sinhvien ) {
        $masv = $sinhvien->getElementsByTagName( "masv" )->item(0)->nodeValue;
        $tensv = $sinhvien->getElementsByTagName( "tensv" )->item(0)->nodeValue;
        $gioitinh = $sinhvien->getElementsByTagName( "gioitinh" )->item(0)->nodeValue;
        $malop = $sinhvien->getElementsByTagName( "malop" )->item(0)->nodeValue;
        $diem = $sinhvien->getElementsByTagName( "diem" )->item(0)->nodeValue;

        if ($diem > 8) {
            $students[] = [
                'masv' => $masv,
                'tensv' => $tensv,
                'gioitinh' => $gioitinh,
                'malop' => $malop,
                'diem' => $diem
            ];
        }
    }

    // Sort students by score in descending order
    usort($students, function($a, $b) {
        return $b['diem'] - $a['diem'];
    });

    echo "<tr><th>STT</th><th>Mã sinh viên</th><th>Họ tên</th><th>Giới tính</th><th>Mã lớp</th><th>Điểm</th></tr>";
    foreach ($students as $student) {
        echo "<tr><td>$i</td><td>{$student['masv']}</td><td>{$student['tensv']}</td><td>{$student['gioitinh']}</td><td>{$student['malop']}</td><td>{$student['diem']}</td></tr>";
        $i++;
    }

?>
</table>
</body>
