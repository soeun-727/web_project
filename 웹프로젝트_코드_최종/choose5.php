<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '1',
  'review');

$sql = "SELECT * FROM five";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
  $list = $list."{$row['num']})  {$row['id']} - {$row['created']}&emsp;<br>
  &emsp;: {$row['review']} <br>"  ;
}
?>

<!doctype html>
<html>
<head>
  <title>식당 - 보미해장국</title>
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
  <h2>보미해장국</h2>
  <p>
    <a href="https://naver.me/FK5vV0Ld" target="_blank" title="restaurant1">보미해장국</a>은 추운날 <strong>따뜻한</strong> 식사를 할 수 있는 숙대 앞 <strong><u>뼈해장국 </u>맛집</strong>이다.
  </p>
  <p style="margin-top:45px;"></p>
  <p>몇 번째 리뷰를 수정하시겠습니까?</p>
  <form action="update5.php" method="POST">
      <p><input type="text" name="num" placeholder="리뷰 번호" ></p>
      <p><input type="submit"></p>
    </form>
    <br>
    <p><strong>리뷰</strong></p>
    <?=$list?>
</body>
</html>