// $(document).ready(function(){
//
//     var form = '#add-user-form';
//
//     $(form).on('submit', function(event){
//         event.preventDefault();
//
//         var url = $(this).attr('data-action');
//
//         $.ajax({
//             url: "/students",
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             method: 'POST',
//             data: new FormData(this),
//             dataType: 'JSON',
//             contentType: false,
//             cache: false,
//             processData: false,
//             success:function(response)
//             {
//                 $(form).trigger("reset");
//                 alert(response.success)
//             },
//             error: function(response) {
//                 // $(form).trigger("reset");
//                 // alert(response.error)
//             }
//         });
//     });
//
// });
