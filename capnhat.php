<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cập nhật thông tin lớp</title>
</head>
<body>
    <?php
        require('connect.php');
        if(isset($_GET["ma_lop"]))
        {
            $ma_lop=$_GET['ma_lop']; 
        }
        else
            $ma_lop = "";

        $query = "SELECT * from lop WHERE ma_lop='".$ma_lop."'"; 
        
        $ten_khach_hang = "";
        $phai = 0;
        $sdt = "";
        $dia_chi = "";
        $email = "";

        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_object($result))
            {
                $ten_khach_hang = $row->Ten_khach_hang;
                $phai = $row->Phai;
                $sdt = $row->Dien_thoai;
                $dia_chi = $row->Dia_chi;
                $email = $row->Email;
            }
        }
        mysqli_free_result($result);

    ?>
    <form action="" method="POST">
    <table align="center">
        <tr>
            <th align="center" colspan="2">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</th>
        </tr>
        <tr>
            <td>Mã khách hàng</td>
            <td>
                <input type="text" name="ma_khach_hang_txt" value="<?php echo $ma_kh; ?>" disabled="disabled">
            </td>
        </tr>
        <tr>
            <td>Tên khách hàng</td>
            <td>
                <input type="text" name="ten_khach_hang_txt" value="<?php echo $ten_khach_hang; ?>" required>
            </td>
        </tr>
        <tr>
            <td>Phái</td>
            <td>
                <input type="radio" name="phai" value="0" <?php if($phai==0) echo 'checked' ?>>Nam
                <input type="radio" name="phai" value="1" <?php if($phai==1) echo 'checked' ?>>Nữ
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <input type="text" name="dia_chi_txt" value="<?php echo $dia_chi; ?>" required>
            </td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td>
                <input type="text" name="dien_thoai_txt" value="<?php echo $sdt; ?>" required>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
             <input type="text" name="email_txt" value="<?php echo $email; ?>" required>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" name="updateBtn" value="Cập nhật" id="updateBtn">
            </td>
        </tr>
    </table>
    </form>
    <?php
        if(isset($_POST["updateBtn"]))
        {
            $ten_khach_hang = $_REQUEST["ten_khach_hang_txt"];
            $phai = $_REQUEST["phai"];
            $sdt = $_REQUEST["dien_thoai_txt"];
            $dia_chi = $_REQUEST["dia_chi_txt"];
            $email = $_REQUEST["email_txt"];
            $sql_update = "UPDATE khach_hang 
                            SET Ten_khach_hang = '".$ten_khach_hang."',
                                Phai = ".$phai.",
                                Dien_thoai = '".$sdt."',
                                Dia_chi = '".$dia_chi."',
                                Email = '".$email."'
                            WHERE Ma_khach_hang = '".$ma_kh."'";
            if(mysqli_query($conn, $sql_update))
            {
                echo '<p align="center">CẬP NHẬT THÔNG TIN THÀNH CÔNG!!</p>';
                echo '<p align="center"><a href="ex2_12_mysql.php">Quay về</a></p>';
            }
            else
                echo '<p align="center">KHÔNG CẬP NHẬT ĐƯỢC!</p>';


        } 
    ?>
</body>
</html>