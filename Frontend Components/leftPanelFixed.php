<style>
    .leftPanelFixed {
        border-right: 2px solid #212121;
        height: 100vh;
    }

    .leftPanelFixed .containerLeft {
        margin-top: 0.5rem;
        margin-bottom: 2rem;
        font-weight: 700;
        font-size: 0.8rem;
        letter-spacing: 1px;
        color: #ef233c;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        padding: 0.8rem;
        border-radius: 10px;
    }

    .leftPanelFixed .containerLeft .header {
        font-weight: 800;
        font-size: 0.96rem;
        color: #403d39;
    }

    .leftPanelFixed .containerLeft i {
        margin-right: 0.3rem;
    }

    @media (min-width:991.5px) {
        .leftPanelFixed {
            position: fixed;
        }
    }
</style>







<?php
// the path to be included in resepect of where it is used

require './SQL/leftFixedPanelSql.php';

?>


<div class="containerLeft">
    <div class="header">Total Questions :</div>
    <i class="fa-solid fa-angles-right"></i>
    <?php echo $totalQuestions ?>
</div>




<div class="containerLeft">
    <div class="header">Total Topics :</div>
    <i class="fa-solid fa-angles-right"></i>
    <?php echo $topicCount ?>

    <div class="subContainerLeft ms-3">

        <?php

        while ($topicsData = mysqli_fetch_assoc($QueryExec2)) {
            $topicName = $topicsData['topic name'];

            echo '
        <div class="my-1">
          <i class="fa-solid fa-caret-right"></i>
           ' . $topicName . '
        </div>  
        ';
        }


        ?>


    </div>
</div>




<div class="containerLeft">
    <div class="header">Total Users :</div>
    <i class="fa-solid fa-angles-right"></i>
    <?php echo $totalUsers ?>
</div>





<div class="containerLeft">
    <div class="header">Most Topics Questions :</div>
    <div class="subContainerLeft ms-3">
        <table>
            <?php
            while ($mostQuest = mysqli_fetch_assoc($QueryExec7)) {
                // var_dump($mostQuest);
                $topicName = $mostQuest['topic name'];
                $questCount = $mostQuest['questCount'];

                echo '
                    <tr>
                        <td><i class="fa-solid fa-caret-right"></i></td>
                        <td>' . $topicName . '</td>
                        <td> : </td>
                        <td>' . $questCount . ' Questions</td>
                    </tr>
            ';
            }
            ?>
        </table>
    </div>
</div>