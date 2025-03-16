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
  $list = $list."<br>{$row['num']})  {$row['id']} - {$row['created']}&emsp;<br>
  &emsp;: {$row['review']} "  ;
}

$num=$_POST['num']; 
$id=''; $review=''; $message = '';

if ($num) {
    $sql = "SELECT id, review FROM three WHERE num = ?";
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
<link rel="stylesheet" href="style.css">
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

  <h2>뜸들이다</h2>
  <p>
    <a href="https://naver.me/F9NRN0QF" target="_blank" title="restaurant1">뜸들이다</a>는 <strong> 명란마요덮밥 <u>도란도란</u></strong>이 맛있고 <strong><u>간단한 식사</u></strong>를 하기 좋은 식당이다.
  </p>
  <img src="./imgs/3.jpg" width="500">
  <h3><strong>리뷰</strong></h3>
  <?php
  if ($message) {
      echo "<script>
      alert('{$message}');
      window.location.href = '3.php';
      </script>";
  } else {
  ?>
      <form action="/review/update3_process.php" method="post">
          <input type="hidden" name="old_id" value="<?=htmlspecialchars($id)?>">
          <p><input type="text" name="id" placeholder="사용자 ID" value="<?= htmlspecialchars($id) ?>" ></p>
          <p><textarea name="review" placeholder="상세한 리뷰를 작성해주세요 (최대 500자)"><?= htmlspecialchars($review) ?></textarea></p>
          <p><input type="submit" value="수정"></p>
      </form>
      <?php
  }
  ?>

    <?=$list?>
</body>
</html>