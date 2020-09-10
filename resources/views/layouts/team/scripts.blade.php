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
      $("#phone_no").select2({
      tags: true,
      tokenSeparators: [',', ' ']
      })
       // Dynamic Social Media Add
  
         let count = 0;
         let count_val = $('#count').val();
         count = count_val != '' && count_val != null ? parseInt(count_val) + 1 : 0;
       $('#add_social_media').on('click',function(){
         var html = '';
         html += '<div class="row social_media">';
         html += '<div class="col-lg-2">';
         html += '<input type="text" name="social_media['+ count +'][icon]" class="form-control" placeholder="Icon">';
         html += '</div>';
         html += '<div class="col-lg-4">';
         html += '<input type="text" name="social_media['+ count +'][name]" class="form-control" placeholder="Social Media Name">';
         html += '</div>';
         html += '<div class="col-lg-5">';
         html += '<input type="text" name="social_media['+ count +'][url]" class="form-control" placeholder="Social Media Link">';
         html += '</div>';
         html += '<div class="col-lg-1">';
         html += '<button type="button" class="btn btn-danger" id="delete_social"> <i class="fa fa-trash"></i> </button>';
         html += '</div>';
         html += '</div>';
         html += '<br>';
         html += '<input type="hidden" value='+ count +' name="social_media['+ count +'][id]">';
         $('#social_media').append(html);
         count++;
       });

   // remove row
                $(document).on('click', '#delete_social', function () {
                  count--;
                $(this).closest('.social_media').remove();
                });
  });
</script>