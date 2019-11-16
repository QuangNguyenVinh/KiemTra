<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách lớp theo tên Khoa</title>
</head>
<body>
    <?php
        require('connect.php');
    ?>
    <form action="" method="POST">
        <table>
            <tr>
                <td align="center">Khoa: <select name="khoa" id="khoa">
                    <?php
                        $sql = "SELECT * FROM khoa";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                           while($row = mysqli_fetch_array($result))
                           {
                               $ma_khoa = $row['ma_khoa'];
                               $ten_khoa = $row['ten_khoa'];
                               echo '<option value="'.$ma_khoa.'"';
                               if(isset($_REQUEST['khoa']) && ($_REQUEST['khoa']==$ma_khoa))
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
        </table>
    </form>
</body>
</html>