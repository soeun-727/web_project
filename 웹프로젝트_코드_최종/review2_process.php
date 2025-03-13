<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '1',
  'review');
$sql = "
  INSERT INTO two
    (id, review, created)
    VALUES(
        '{$_POST['id']}',
        '{$_POST['review']}',
        NOW()
    )
";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo "<script>
  alert('리뷰를 등록하지 못했습니다. 관리자에게 문의해주세요');
  window.location.href = '2.php'; 
  </script>";
} else {
  echo "<script>
  alert('성공적으로 리뷰를 등록했습니다.'); 
  window.location.href = '2.php';  
  </script>";
}
?>
