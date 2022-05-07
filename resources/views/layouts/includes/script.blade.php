<script src="{{ url('adminkit-3-0-2/static/js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
        $('.js-example-basic-single').select2();
        $('.select2-selection').css({
            height: '34px',
            border: '1px solid #ced4da'
        })

        const sidebarLinks = document.querySelectorAll(".sidebar-link");
        sidebarLinks.forEach(el => {
            if (el.getAttribute("href") == window.location.href) {
                console.log(el)
                el.parentElement.classList.add('active')
            }
        });
    });
</script>
