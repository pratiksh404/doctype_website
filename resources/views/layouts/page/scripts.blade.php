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
      
      // Phone No Multi Select
      $("#meta_keywords").select2({
      tags: true,
      tokenSeparators: [',', ' ']
      })
       // Dynamic Meta Title Populate
       $('#title').on('keyup',function(){
         let title = $(this).val();
         $('#meta_title').val(title);
       })
  });
</script>