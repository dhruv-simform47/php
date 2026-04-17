<?php

$student_arr = [
    [
        "roll_no" => "24MCA001",
        "name" => "Dhruv Rana",
        "attendance_pct" => 95
    ],
    [
        "roll_no" => "24MCA002",
        "name" => "Arjun Patel",
        "attendance_pct" => 88
    ],
    [
        "roll_no" => "24MCA002",
        "name" => "Dev Raval",
        "attendance_pct" => 80
    ],
    [
        "roll_no" => "24MCA003",
        "name" => "ved parekh",
        "attendance_pct" => 88
    ],
    [
        "roll_no" => "24MCA004",
        "name" => "ankush",
        "attendance_pct" => 67
    ]
];



$dom = new DOMDocument("1.0", "UTF-8");
$root = $dom->createElement('studentdata');
$dom->appendChild($root);

$dept = $dom->createElement('departmemt', 'MCA');
$root->appendChild($dept);

$batch = $dom->createElement('batch', '2024-2026');
$root->appendChild($batch);

$students = $dom->createElement('students');
$root->appendChild($students);



foreach ($student_arr as $student) {
    $stu1 = $dom->createElement('student');
    $rollno = $dom->createElement('rollno', $student["roll_no"]);
    $name = $dom->createElement('name', $student["name"]);
    $attendence = $dom->createElement('attendence', $student["attendance_pct"]);
    $stu1->appendChild($rollno);
    $stu1->appendChild($name);
    $stu1->appendChild($attendence);
    $students->appendChild($stu1);
}

$dom->formatOutput=true;
$dom->save('attendance.xml');




?>












<!-- $data = [
    "department" => "MCA",
    "batch" => "2024-2026",
    "students" => [
        [
            "roll_no" => "24MCA046",
            "name" => "Dhruv Rana",
            "attendance_pct" => 95
        ],
        [
            "roll_no" => "24MCA001",
            "name" => "Arjun Patel",
            "attendance_pct" => 88
        ]
    ]
]; -->