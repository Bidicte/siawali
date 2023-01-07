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
    <!-- custom css -->
    <script src="js/script.js"></script>
</body>

</html>