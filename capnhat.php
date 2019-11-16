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
        
        $ten_lop = "";
        $si_so = 0;

        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_object($result))
            {
                $ten_lop = $row->ten_lop;
                $si_so = $row->si_so;
            }
        }
        mysqli_free_result($result);

    ?>
    <form action="" method="POST">
    <table align="center">
        <tr>
            <th align="center" colspan="2">CẬP NHẬT THÔNG TIN LỚP</th>
        </tr>
        <tr>
            <td>Mã lớp</td>
            <td>
                <input type="text" name="ma_lop_txt" value="<?php echo $ma_lop; ?>" disabled="disabled">
            </td>
        </tr>
        <tr>
            <td>Tên lớp</td>
            <td>
                <input type="text" name="ten_lop_txt" value="<?php echo $ten_lop; ?>" required>
            </td>
        </tr>
        <tr>
            <td>Sĩ số</td>
            <td>
            <input type="number" name="si_so_txt" value="<?php echo $si_so; ?>" min="1" required>
            </td>
        </tr>
        <tr>
        <td>Khoa: </td>
            <td align="center"><select name="ds_khoa" id="khoa">
                    <?php
                        $sql = "SELECT * FROM khoa ";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                           while($row = mysqli_fetch_array($result))
                           {
                               $ma_khoa = $row['ma_khoa'];
                               $ten_khoa = $row['ten_khoa'];
                               echo '<option value="'.$ma_khoa.'"';
                               if(isset($_REQUEST['ds_khoa']) && ($_REQUEST['ds_khoa']==$ma_khoa))
                               {
                                    echo 'selected="selected"';
                               } 
                               echo ">".$ten_khoa."</option>";
                           } 
                        }
                        mysqli_free_result($result);
                    ?>
                    </select>
        </tr>
        <tr>
            <td>Giảng viên: </td>
        <td align="center"><select name="ds_gv" id="gv">
                    <?php
                        $sql = "SELECT * FROM giangvien ";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                           while($row = mysqli_fetch_array($result))
                           {
                               $ma_gv = $row['ma_gv'];
                               $ho_gv = $row['ho_gv'];
                               $ten_gv = $row['ten_gv'];
                               echo '<option value="'.$ma_gv.'"';
                               if(isset($_REQUEST['ds_gv']) && ($_REQUEST['ds_gv']==$ma_gv))
                               {
                                    echo 'selected="selected"';
                               } 
                               echo ">".$ho_gv.' '.$ten_gv."</option>";
                           } 
                        }
                        mysqli_free_result($result);
                    ?>
                    </select>
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
            $ten_lop= $_REQUEST["ten_lop_txt"];
            $si_so = $_REQUEST["si_so_txt"];
            $gv = $_REQUEST["ds_gv"];
            $khoa = $_REQUEST["ds_khoa"];
            $sql_update = "UPDATE lop 
                            SET ten_lop = '".$ten_lop."',
                                si_so = ".$si_so.",
                                ma_khoa = '".$khoa."',
                                ma_gvcv = '".$gv."'
                            WHERE ma_lop = '".$ma_lop."'";
            if(mysqli_query($conn, $sql_update))
            {
                echo '<p align="center">CẬP NHẬT THÔNG TIN THÀNH CÔNG!!</p>';
                echo '<p align="center"><a href="khoa.php">Quay về</a></p>';
            }
            else
                echo '<p align="center">KHÔNG CẬP NHẬT ĐƯỢC!</p>';


        } 
    ?>
</body>
</html>