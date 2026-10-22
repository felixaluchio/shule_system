 
 <?php
 function showCourse($course){
   echo "Course: " . $course;
   echo "<br>";
 }

 showCourse("Computer Science");
 showCourse("Mathematics");
 echo "<br>";


 function printIfLong($word){
  if(strlen(trim($word)) >= 3){
    echo $word;
    echo "<br>";
    return;
  }
 }

 printIfLong("Computer");
 printIfLong("Math");
 echo "<br>";

  function doubleValue($value){
    $dValue = $value * 2;
    echo $dValue;
    return $dValue;
  }

  $result = doubleValue(5);
  echo $result;

$students = [
  ["name" => "John", "email" => "john@example.com"],
  ["name" => "felix", "email" => "felix@example.com"]
];
foreach($students as $student){
  echo $student["name"];
  echo "<br>";
}
 ?>


