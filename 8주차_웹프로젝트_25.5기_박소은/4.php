<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '1',
  'review');

$sql = "SELECT * FROM four";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
  $list = $list."{$row['num']})  {$row['id']}: {$row['review']} <br>
  &emsp; - {$row['created']}&emsp; <a href='update4.php'>수정</a>";
}
?>

<!doctype html>
<html>
<head>
  <title>식당 - 마시앤바시</title>
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
  <h2>마시앤바시</h2>
  <p>
    <a href="https://naver.me/FUhCWpMn" target="_blank" title="restaurant1">마시앤바시</a>는 <strong>시금치 크림 파스타</strong>와 <strong>차이나치킨</strong>이 맛있는 숙대 앞 <strong><u>파스타 맛집</u></strong>이다.
  </p>
  <p style="margin-top:45px;">    </p>
    <a href="review4.php">작성</a>
    <br>
    <br>
    <p><strong>리뷰</strong></p>
    <?=$list?>
</body>
</html>