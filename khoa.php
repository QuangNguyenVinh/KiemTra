<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách lớp theo tên Khoa</title>
    <style>
		table
        {
            background-color: #ccd9cf;

        }
        #headerTable
        {
            background-color: #2d9498;
            text-align: center;
        }
        th
        {
            background-color: #2d9498;
            text-align: center;
        } 
        #searchBtn
        {
                background-color: #f9f895;
        }   
	</style>
</head>
<body>
    <?php
        require('connect.php');
    ?>
    <form action="" method="POST">
        <table align="center">
            <tr>
            <th>
                <h3 align="center">DANH SÁCH LỚP</h3>
            </th>
            </tr>
            <tr>
                <td align="center">Khoa: <select name="ds_khoa" id="khoa">
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
                    <input type="submit" value="Tìm kiếm" name="searchBtn" id="searchBtn"> 
            </tr>
            
        </table>
        <br>
        <?php
            if(isset($_POST["searchBtn"]))
            {
                $ma_khoa = $_REQUEST["ds_khoa"];
                $sql_search = "SELECT ma_lop, ten_lop, si_so, k.ten_khoa, gv.ho_gv , gv.ten_gv 
                            FROM lop AS l JOIN khoa AS k ON l.ma_khoa = k.ma_khoa
                            JOIN giangvien AS gv ON l.ma_gvcv = gv.ma_gv
                            WHERE l.ma_khoa = '".$ma_khoa."' ";
                            ;
                 $res_search = mysqli_query($conn, $sql_search);
                 if(mysqli_num_rows($res_search) > 0)
                 {
                    echo '<table border="1" align="center">';
                    echo '<tr>';
                    echo '<th> Mã lớp </th>';
                    echo '<th> Tên lớp </th>';
                    echo '<th> Sĩ số </th>';
                    echo '<th> Tên khoa </th>';
                    echo '<th> Họ GVCV </th>';
                    echo '<th> Tên GVCV </th>';
                    echo '</tr>';
                     while($row = mysqli_fetch_object($res_search))
                     {
                         echo '<tr>';
                         echo '<td><a href="capnhat.php?ma_lop='.$row->ma_lop.'">'.$row->ma_lop.'</a></td>';
                         echo '<td>'.$row->ten_lop.'</td>';
                         echo '<td>'.$row->si_so.'</td>';
                         echo '<td>'.$row->ten_khoa.'</td>';
                         echo '<td>'.$row->ho_gv.'</td>';
                         echo '<td>'.$row->ten_gv.'</td>';
                         echo '</tr>';

                     }
                     echo '</table>';
                 }
            }
        ?>
    </form>
</body>
</html>