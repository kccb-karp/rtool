<?php
$connect=  mysqli_connect("localhost", "root", "karp@2018", "rtool");
$output='';$output2='';

    $sql="SELECT FacilityName,CCCNumber,gender FROM txcurrDecFinal ";
    $result=  mysqli_query($connect, $sql);
    if(mysqli_num_rows($result)>0)
    {
        $output.=' 
                <table class="table" border="1">
                <tr>
                    <th>FacilityName</th>
                    <th>CCCNumber</th>
                    <th>gender</th>
                    </tr>';
        while($row= mysqli_fetch_array($result))
        {
            $output.=' 

                <tr>
                    <td>'.$row['FacilityName'].'</td>
                    <td>'.$row['CCCNumber'].'</td>
                    <td>'.$row['gender'].'</td>
                    </tr>';

        }
        $output.='</table>';
        //print_r(mysqli_num_rows($result));
        //echo "Database Result <br>";
        //print_r($result);
       // echo "Table Output <br>";
        
        header ("Content-Type: application/vnd.ms-excel");
		header ("Content-Disposition: inline; filename=download.xls");
        
        echo $output;


    }
    //echo "Table Setup <br>";
    //print_r($output);
    //echo $output;
    ?> 