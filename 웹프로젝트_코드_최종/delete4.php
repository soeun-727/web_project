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
  $list = $list."{$row['num']})  {$row['id']} - {$row['created']}&emsp;<br>
  &emsp;: {$row['review']} <br>"  ;
}

$num = $_POST['num']; 
$message = '';

if ($num) {
    $sql = "SELECT id, review FROM four WHERE num = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $num); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $delete_sql = "DELETE FROM four WHERE num = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $num);
        
        if ($delete_stmt->execute()) {
            $message = "리뷰가 성공적으로 삭제되었습니다.";
        } else {
            $message = "리뷰 삭제에 실패했습니다.";
        }
        $delete_stmt->close();
    } else {
        $message = "{$num}번 리뷰는 존재하지 않습니다.";
    }

    $stmt->close();
}

?>

<!doctype html>
<html>
<head>
  <title>리뷰 삭제</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>리뷰 삭제</h1>
  <?php
  if ($message) {
      echo "<script>
      alert('{$message}');
      window.location.href = '4.php';  
      </script>";
  }
  ?>
  
  <p><strong>리뷰 목록</strong></p>
  <?=$list?>
</body>
</html>
