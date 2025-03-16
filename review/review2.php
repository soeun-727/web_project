<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '1',
  'review');

$sql = "SELECT * FROM two";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
  $list = $list."<br> {$row['num']})  {$row['id']} - {$row['created']}&emsp;<br>
  &emsp;: {$row['review']}"  ;
}
?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" href="style.css">
  <title>식당 - 돈카춘</title>
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

  <h2>돈카춘</h2>
  <p>
    <a href="https://naver.me/x7nQMUp6" target="_blank" title="restaurant1">돈카춘</a>은 <strong>맛있는 <u>돈까스</u></strong>와 <strong><u>카레</u></strong>를 즐길 수 있는 <strong><u>일식 맛집</u></strong>이다.
  </p>
  <img src="./imgs/2.jpg" width="500">
  <h3><strong>리뷰</strong></h3>
  <form action="review2_process.php" method="POST">
      <p><input type="text" name="id" placeholder="사용자 ID" ></p>
      <p><textarea name="review" placeholder="상세한 리뷰를 작성해주세요 (최대 500자)"></textarea></p>
      <p><input type="submit" value = "리뷰 등록"></p>
    </form>

    <?=$list?>
</body>
</html>