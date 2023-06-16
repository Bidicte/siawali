<!-- swiper link -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,

            pagination: {
                el: '.swiper-pagination',
            },


        });

        function passValue() {
            var name = document.getElementById("test").value;
            localStorage.setItem('textvalue', name);
            return false;
        }

    </script>
    <!-- Jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- custom css -->
    <script src="js/script.js"></script>
     <!-- Alertify js -->
     <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        alertify.set('notifier','position', 'top-right');
        <?php if(isset($_SESSION["message"]))
        {
            ?>
            alertify.success('<?= $_SESSION["message"] ?>');
        <?php 
            unset($_SESSION["message"]);
        }
        ?>
    </script>
</body>

</html>