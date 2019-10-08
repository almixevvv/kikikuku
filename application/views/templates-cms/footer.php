<script type="text/javascript">

  $(document).ready(function() {

    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false,
    });

    $('#buttonLogOut').on('click', function() {
      swal.fire({
        title:"Logout",
        text:"Are you sure you want to logout?",
        type: "warning",
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: "Confirm",
        confirmButtonColor: '#3085d6'
      }).then((result) => {
          
          if (result.value) {
            window.location.replace("<?php echo base_url('CMS/logout'); ?>");
            // swalWithBootstrapButtons.fire(
            //   'Deleted!',
            //   'Selected product has been removed.',
            //   'success'
            // );
            
        }
      });
    });

  });

</script>
</body>
</html>
