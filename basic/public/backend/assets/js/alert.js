$(function(){
$(document).on('click','#delete',function(e){
  e.preventDefault();
  var link=$(this).attr("href");
  // window.alert(link);
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this  record!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    timer: 7000 
 
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location.href=link;
      swal("Poof! Your record has been deleted!", {
        icon: "success",
      });
    } else {
      swal("Your record is safe!");
    }
  });
})


})


$(function(){
  $(document).on('click','#approve',function(e){
    e.preventDefault();
    var link=$(this).attr("href");
    // window.alert(link);
    swal({
      title: "Are you sure?",
      text: "Approve this data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      timer: 7000 
   
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href=link;
        swal("Poof! Your record has been approved!", {
          icon: "success",
        });
      } else {
        swal("Your record is safe!");
      }
    });
  })
  
  
  })
  