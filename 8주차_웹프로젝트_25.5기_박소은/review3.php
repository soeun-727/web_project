<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '1',
  'review');

$sql = "SELECT * FROM three";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
  $list = $list."{$row['num']})  {$row['id']}: {$row['review']} <br>
  &emsp; - {$row['created']}&emsp; <a href='update3.php'>수정</a>";
}
?>

<!doctype html>
<html>
<head>
  <title>식당 - 뜸들이다</title>
  <meta charset="utf-8">
</head>
<body>
  <h1><a href="index.html">숙대 앞 맛집</a></h1>
  <ol>
    <li><a href="1.php">네코노스시</a></li>
    <li><a href="2.php">돈카춘</a></li>
    <li><a href="3.php">뜸들이다</a></li>
    <li><a href="4.php">마시앤바시</a></li>
    <li><a href="5.php">보미해장국</a></li>
  </ol>
  <br>
  <h2>뜸들이다</h2>
  <p>
    <a href="https://naver.me/F9NRN0QF" target="_blank" title="restaurant1">뜸들이다</a>는 <strong> 명란마요덮밥 <u>도란도란</u></strong>이 맛있고 <strong><u>간단한 식사</u></strong>를 하기 좋은 식당이다.
  </p>
    <form action="review3_process.php" method="POST">
      <p><input type="text" name="id" placeholder="사용자 ID"></p>
      <p><textarea name="review" placeholder="상세한 리뷰를 작성해주세요 (최대 500자)"></textarea></p>
      <p><input type="submit"></p>
    </form>
    <br>
    <p><strong>리뷰</strong></p>
    <?=$list?>
</body>
</html>