 
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
$students[] = ["name" => "Joe", "email" => "joe@example.com"];

echo "<table>" ;
echo "<tr><th>Name</th><th>Email</th></tr>";
foreach($students as $student){
  echo "<tr> <td>" .$student["name"]. "</td>" . " <td>" . $student["email"]. "</td> </tr>";
  
}
echo "</table>";
$result  = count($students);
echo $result;
$courses = [
  "Computer Science","Mathematics","Physics","law","Medicine"];
  var_dump(in_array("law", $courses));
  var_dump(in_array("Medicine", $courses));

 echo array_key_exists("email", $students[0]);
 echo array_key_exists("phone", $students[0]);

 $result1 = implode(", ", $courses);
 $result2 = implode(" | ", $students);
  echo $result1;
  echo "<br>";
  echo $result2;
 ?>


