<style>
    .profileTab label {
        font-weight: 700;
        font-size: 0.9rem;
    }

    .profileTab .inputs {
        width: 100%;
        border: 0;
        outline: 0;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
        border-radius: 10px;
        padding: 0.5rem 1rem;
        font-weight: 600;
        font-size: 0.7rem;
    }

    .profileTab .submitBtn {
        background-color: #6a994e;
        font-weight: 800;
        font-size: 1rem;
        padding: 1rem;
        letter-spacing: 1px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }
</style>








<div class="profileTab">
    <form action="" method="post">
        <div class="row">

            <div class="col-12 my-2">
                <label for="">Your User Id :</label>
                <input type="text" class="inputs" id="" value="<?php echo $userId ?>" readonly>
            </div>

            <div class="col-12 my-2">
                <label for="">Your Name :</label>
                <input type="text" name="name" class="inputs editable" id="" value="<?php echo $userName ?>" readonly>
            </div>

            <div class="col-12 my-2">
                <label for="">Your Email :</label>
                <input type="text" name="email" class="inputs editable" id="" value="<?php echo $userEmail ?>" readonly>
            </div>

            <div class="col-12 my-2">
                <label for="">Your Date of Birth :</label>
                <input type="date" name="dob" class="inputs editable" id="" value="<?php echo $userDob ?>" readonly>
            </div>

            <div class="col-12 my-2">
                <label for="">Your Avtar :</label>
                <input type="file" name="avtar" class="inputs editable" id="" value="<?php echo $userAvtar ?>" readonly>
            </div>

            <div class="col-12 my-4">
                <input type="submit" name="name" class="inputs submitBtn" id="">
            </div>

        </div>
    </form>
</div>