<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '1',
  'review');
$sql = "
  INSERT INTO five
    (id, review, created)
    VALUES(
        '{$_POST['id']}',
        '{$_POST['review']}',
        NOW()
    )
";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo '리뷰를 등록하지 못했습니다. 관리자에게 문의해주세요';
  error_log(mysqli_error($conn));
} else {
  echo '성공적으로 리뷰를 등록했습니다. <a href="review5.php">돌아가기</a>';
}
?>