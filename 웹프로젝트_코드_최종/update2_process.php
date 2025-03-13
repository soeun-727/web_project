<?php
$conn = mysqli_connect('localhost', 'root', '1', 'review');

$old_id = $_POST['old_id'];
$id = $_POST['id'];
$review = $_POST['review'];

if ($id && $review) {
    $sql = "UPDATE two SET id = ?, review = ? WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $id, $review, $old_id);
    
    if ($stmt->execute()) {
        echo "<script>
        alert('리뷰가 성공적으로 수정되었습니다.');
        window.location.href = '2.php'; 
        </script>";
    } else {
        echo "<script>
        alert('리뷰 수정에 실패했습니다.');
        window.location.href = '2.php';  
        </script>";
    }
    
    $stmt->close();
} else {
    echo "<script>
    alert('모든 필드를 입력해주세요.');
    window.location.href = '2.php';  
    </script>";
}

$conn->close();
?>
