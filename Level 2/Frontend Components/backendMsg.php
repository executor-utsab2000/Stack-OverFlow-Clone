<style>
    #backendMsg {
        width: 30vw;
        font-weight: 700;
        font-size: 0.7rem;
        position: fixed;
        margin: 0.5rem;
        right: 0;
        top: 9rem;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        z-index: 1;
        min-width: 360px;
    }

    #backendMsg i {
        font-size: 1rem;
        margin-right: 0.5rem;
    }
</style>




<?php
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    $icon = $_GET['icon'];
    $colorClass = $_GET['colorClass'];

    ?>

    <div class="alert alert-<?php echo $colorClass ?> alert-dismissible fade show animate__animated animate__fadeIn"
        role="alert" id="backendMsg">
        <strong> <?php echo $icon ?> </strong>
        <?php echo $message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="closeBtn"></button>
    </div>

<?php } ?>





<script>

    const closeBtn = document.getElementById('closeBtn');

    closeBtn.addEventListener('click', () => {
        const newUrl = location.href.split('?')[0]
        location.href = newUrl
    })



</script>