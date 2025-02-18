$(function() {
    // Add task
    $('footer').on('click', '#add', function(){
        if($('#input-task').val().length > 0) {

            $task =  '<article> \
                <input type="checkbox"> \
                <p>'+$('#input-task').val()+'</p> \
                <button>&times;</button>  \
            </article>'
            $('section.list').append($task)
            $('#input-task').val('')
        }
        else {
            alert('please! Enter a Task')
        }
    })
    // Toggle task (Remain/Done)
    $('article').on('click', 'input[type=checkbox]', function() {
        // If checked
        if ($(this).prop('checked')){
            alert('Yes, Checked')
        } else {
            alert('No, No checked')
        };
    })
})