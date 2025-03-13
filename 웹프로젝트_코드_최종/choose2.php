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
  $list = $list."{$row['num']})  {$row['id']} - {$row['created']}&emsp;<br>
  &emsp;: {$row['review']} <br>"  ;
}
?>

<!doctype html>
<html>
<head>
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
  <br>
  <h2>돈카춘</h2>
  <p>
    <a href="https://naver.me/x7nQMUp6" target="_blank" title="restaurant1">돈카춘</a>은 <strong>맛있는 <u>돈까스</u></strong>와 <strong><u>카레</u></strong>를 즐길 수 있는 <strong><u>일식 맛집</u></strong>이다.
  </p>
  <p style="margin-top:45px;">    </p>
  <p>몇 번째 리뷰를 수정하시겠습니까?</p>
  <form action="update2.php" method="POST">
      <p><input type="text" name="num" placeholder="리뷰 번호" ></p>
      <p><input type="submit"></p>
    </form>
    <br>
    <p><strong>리뷰</strong></p>
    <?=$list?>
</body>
</html>