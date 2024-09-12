$(document).on('click','.add-task',function(){
    sendRequest('add',{'task':$('#task').val()});
    $('#task').val('');

});

$(document).on('click','.delete',function(){
    swal({
        title: "Are you sure?",
      text: "Are u sure to delete this task ?",
      icon: "warning",
      buttons: [
        'No',
        'Yes'
      ],
    }).then((isConfirm)=>{
        if(isConfirm){

            sendRequest('delete',{'id':$(this).data('id')});
            $(this).parents('.task-section').remove();
        }
    });
});

$(document).on('click','.edit',function(){
    sendRequest('edit',{'id':$(this).data('id')});
    $(this).parents('.task-section').find('.staus').html('Done');
    $(this).remove();
});

$(document).on('keypress','#task',function(e){
    if(e.which == 13) {
        sendRequest('add',{'task':$('#task').val()});
        $(this).val('');
    }
});

function sendRequest(url,postData){    
    $.ajax({
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url :"/"+url,
        data :postData,        
        beforeSend: function() {            
        },  
        success : function(result){                            
            var responseData = $.parseJSON(result);
            if(typeof(responseData.type) != 'undefined' && responseData.type == 'add'){
                let task = postData.task;
                let id = responseData.id;
                var html ='<div class="task-section"><div class="task-header"><div class="tasks"><div><span class="sequence">'+id+'</span></div><div><span class="task-name">'+task+'</span></div></div><div class="task-status"><div><span class="staus"></span></div><div><button class="edit btn btn-success" data-id="'+id+'" ><i class=" fa  fa-check"> </i></button><button class="delete btn btn-danger" data-id="'+id+'"> <i class="fa fa-trash"> </i></button></div></div></div></div>';
                $('.main-div').append(html);
            }
        },
        error: function(xhr) {            
            $(document).find('.mainloder').slideUp();
            result = $.parseJSON(xhr.responseText);
            if(result.errors != ""){
                $.each(result.errors, function (k, value) {                    
                    $("#" + k)
                    .siblings(".invalid-feedback")
                    .html(value)
                    .slideDown();
                });
                var firstKey = Object.keys(result.errors)[0];    
                $('#'+firstKey).focus();
            }            
        },
    });
}

