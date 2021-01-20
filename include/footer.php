
</div>
</div>
<div class="overlay"></div>

<script src="../static/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="../static/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../static/js/cdnjs.js" type="text/javascript"></script>
<script src="../static/js/popper.min.js="type="/javascript"></script>
<script src="../static/js/fontawesome.js" type="/javascript"></script>
<script src="../static/js/myjs.js" type="text/javascript"></script>

            
        
    
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

</html>