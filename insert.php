<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entry = $_POST['entry'];
    $date = date('Y-m-d');

    foreach ($entry as $dayIndex => $prayers) {
        foreach ($prayers as $prayerIndex => $status) {
            $day = ["السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة"][$dayIndex];
            $prayer = [
                "الصلاة في وقتها",
                "السنن",
                "صلاة الفجر",
                "ختم الصلاة",
                "أذكار الصباح والمساء",
                "صلاة الضحى",
                "قيام الليل",
                "الإستغفار",
                "الذكر",
                "قراءة القرآن الكريم",
                "الدعاء",
                "أذكار النوم",
                "سورة تبارك",
                "سورة الكهف"
            ][$prayerIndex];

            $sql = "INSERT INTO entries (entry_date, day, prayer, status) VALUES ('$date', '$day', '$prayer', '$status')";

            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    echo "New records created successfully";
    $conn->close();
}
?>
