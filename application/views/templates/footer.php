</div>



<script>
    function openSlideMenu() {
        document.getElementById('side-menucss').style.left = '0';
        document.querySelector('#lapisan2').classList.add('lapisan2');

    }

    const lapisan2 = document.querySelector('#lapisan2');

    function closeSlideMenu() {
        document.getElementById('side-menucss').style.left = '-250px';
        lapisan2.classList.remove('lapisan2');
    }

    lapisan2.addEventListener('click', function() {
        document.getElementById('side-menucss').style.left = '-250px';
        lapisan2.classList.remove('lapisan2');
    })
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>


</html>