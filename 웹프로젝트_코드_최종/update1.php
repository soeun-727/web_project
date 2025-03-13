<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '1',
  'review');

$sql = "SELECT * FROM one";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
  $list = $list."{$row['num']})  {$row['id']} - {$row['created']}&emsp;<br>
  &emsp;: {$row['review']} <br>"  ;
}

$num=$_POST['num']; 
$id=''; $review=''; $message = '';

if ($num) {
    $sql = "SELECT id, review FROM one WHERE num = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $num); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $review = $row['review'];
    } else {
      $message = "{$num}번 리뷰는 없습니다.";
    }

    $stmt->close();
  }

?>

<!doctype html>
<html>
<head>
  <title>식당 - 네코노스시</title>
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
  <h2>네코노스시</h2>
  <p>
    <a href="https://naver.me/xOxHfCMH" target="_blank" title="restaurant1">네코노스시</a>는 <strong>신선한 <u>초밥</u></strong>과 <strong>맛있는 <u>우동</u></strong>을 즐길 수 있는 숙대 앞 <strong><u>가성비 초밥 맛집</u></strong>이다.
  </p>
  <?php
  if ($message) {
      echo "<script>
      alert('{$message}');
      window.location.href = '1.php';
      </script>";
  } else {
  ?>
      <form action="/review/update1_process.php" method="post">
          <input type="hidden" name="old_id" value="<?=htmlspecialchars($id)?>">
          <p><input type="text" name="id" placeholder="사용자 ID" value="<?= htmlspecialchars($id) ?>" ></p>
          <p><textarea name="review" placeholder="상세한 리뷰를 작성해주세요 (최대 500자)"><?= htmlspecialchars($review) ?></textarea></p>
          <p><input type="submit" value="수정"></p>
      </form>
      <?php
  }
  ?>

    <br>
    <p><strong>리뷰</strong></p>
    <?=$list?>
</body>
</html>