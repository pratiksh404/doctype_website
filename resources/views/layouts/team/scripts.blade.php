<script>
  $(function () {
      // Datatable Initialization
    $("#datatable").DataTable({
      "responsive": true,
      "autoWidth": true,
      "ordering": true,
      "info": true,
    });
      // Phone No Multi Select
      $("#phone_no").select2({
      tags: true,
      tokenSeparators: [',', ' ']
      })
       // Dynamic Social Media Add
       var count = 0;
       $('#add_social_media').on('click',function(){
         var html = '';
         html += '<div class="row">';
         html += '<div class="col-lg-2">';
         html += '<input type="text" name="social_media['+ count +'][icon]" class="form-control" placeholder="Icon">';
         html += '</div>';
         html += '<div class="col-lg-4">';
         html += '<input type="text" name="social_media['+ count +'][name]" class="form-control" placeholder="Social Media Name">';
         html += '</div>';
         html += '<div class="col-lg-6">';
         html += '<input type="text" name="social_media['+ count +'][url]" class="form-control" placeholder="Social Media Link">';
         html += '</div>';
         html += '</div>';
        html += '<br>';
         $('#social_media').append(html);
         count++
       });
  });
</script>