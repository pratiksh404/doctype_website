<script>
  $(function () {
      // Datatable Initialization
    $("#datatable").DataTable({
      "responsive": true,
      "autoWidth": true,
      "ordering": true,
      "info": true,
    });

    //Intialize Summernote Text Editor
    $('.textarea').summernote()

  });
</script>